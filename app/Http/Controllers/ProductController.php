<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// validate
use App\Http\Requests\UserAddProductRequest;
use App\Http\Requests\UserEditProductRequest;
class ProductController extends Controller
{
    public function index()
    {
        $title = 'Danh sách sản phẩm';
        $listProducts = Product::with('category:id,name')->orderBy('created_at', 'desc')->paginate(7);

        return view('admin.products.index', compact('title', 'listProducts'));
    }

    public function addProduct()
    {
        $title = 'Thêm sản phẩm';
        $categories = Category::all();
        return view('admin.products.add-product', compact('title', 'categories'));
    }

    public function addPostProduct(UserAddProductRequest $req)
    {
        $product = new Product();
        $product->category_id = $req->category_id;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;

        if ($req->hasFile('image')) {
            // Lưu vào storage/app/public/products
            $imagePath = $req->file('image')->store('products', 'public');
            $product->image = $imagePath; // Chỉ lưu đường dẫn
        }

        $product->save();

        return redirect()->route('admin.products.index')->with([
            'message' => 'Thêm sản phẩm thành công!'
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);

        // Xóa ảnh khỏi storage nếu có
        if (!empty($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with([
            'message' => 'Xóa sản phẩm thành công!'
        ]);
    }

    public function detailProduct($id)
    {
        $title = 'Chi tiết sản phẩm';
        $product = Product::findOrFail($id);
        return view('admin.products.detail-product', compact('title', 'product'));
    }

    public function updateProduct($id)
    {
        $title = 'Cập nhật sản phẩm';
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.update-product', compact('title', 'product', 'categories'));
    }

    public function updatePatchProduct(UserEditProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ khỏi storage nếu có
            if (!empty($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with([
            'message' => 'Sửa sản phẩm thành công!'
        ]);
    }
}
