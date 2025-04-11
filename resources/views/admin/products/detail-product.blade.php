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

    .btn-sm {
        padding: 6px 18px;
    }

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
        <p>Danh mục:
            <span class="font-weight-bold">{{ $product->category->name }}</span>
        </p>
        <p>Tên sản phẩm:
            <span class="font-weight-bold">{{ $product->name }}</span>
        </p>
        <p>Giá sản phẩm:
            <span class="font-weight-bold">{{ $product->price }}</span>
        </p>
        <p>Ảnh sản phẩm:
            <img src="{{ asset('storage/' . $product->image) }}" width="50">
        </p>
        <p> Mô tả:
            <span class="font-weight-bold">{{ $product->description }}</span>
        </p>
        <a href="{{ route('admin.products.index') }}" class="btn btn-info mt-3">Quay lại</a>
    </div>
@endsection
