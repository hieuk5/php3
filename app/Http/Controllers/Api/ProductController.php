<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getListProducts()
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'categories.name as category_name', 'products.name', 'products.description', 'products.price', 'products.image')
            ->get();

        return response()->json([
            'data' => $product,
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }

    public function getProduct($idProduct)
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'categories.name as category_name', 'products.name', 'products.description', 'products.price', 'products.image')
            ->find($idProduct);

        return response()->json([
            'data' => $product,
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }

    public function addProduct(Request $req)
    {
        $req->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $req->only(['category_id', 'name', 'description', 'price']);

        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $newProduct = Product::create($data);

        if ($newProduct->image) {
            $newProduct->image = asset('storage/' . $newProduct->image);
        }

        return response()->json([
            'data' => $newProduct,
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }

    public function updateProduct(Request $req)
    {
        $req->validate([
            'idProduct' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($req->idProduct);

        $data = $req->only(['category_id', 'name', 'description', 'price']);

        if ($req->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $req->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        if ($product->image) {
            $product->image = asset('storage/' . $product->image);
        }

        return response()->json([
            'data' => $product,
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }

    public function deleteProduct(Request $req)
    {
        $req->validate([
            'idProduct' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($req->idProduct);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }
}
