<!-- resources/views/layouts/index.blade.php -->

@extends('admin.layout_admin')
@section('title', $title)

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        color: #495057;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 36px;
        font-weight: 700;
        color: #007bff;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
        padding: 12px 18px;
    }

    .table th {
        background-color: #007bff;
        color: black;
        font-weight: bold;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-success,
    .btn-primary,
    .btn-danger {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 30px;
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
        box-shadow: 0 4px 10px rgba(0, 255, 0, 0.3);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
        box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
    }

    /* .btn-sm {
            padding: 8px 28px;
        } */

    .text-muted {
        color: #6c757d;
    }

    .thead-light {
        background-color: #f8f9fa;
    }

    .text-center {
        text-align: center;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }
</style>


@section('admin.content')
    <div class="p-4" style="min-height: 800px;">

        <h1>{{ $title }}</h1>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('admin.products.addProduct') }}" class="btn btn-success">Thêm mới</a>

        <table class="table table-striped">
            <tr class="bg-primary text-white">
                <th scope="col">STT</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Ngày sản xuất</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Thao tác</th>
            </tr>
            @foreach ($listProducts as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->category->name ?? 'Chưa có danh mục' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" width="50">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at->format('H:i:s d/m/Y') }}</td>
                    <td>{{ $product->updated_at->format('H:i:s d/m/Y') }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.products.detailProduct', $product->id) }}">Xem</a>
                        <a class="btn btn-warning" href="{{ route('admin.products.updateProduct', $product->id) }}">Sửa</i></a>
                        <form action="{{ route('admin.products.deleteProduct', $product->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $listProducts->links('pagination::bootstrap-5') }}
    </div>
@endsection
