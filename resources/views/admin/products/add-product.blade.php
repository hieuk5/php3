@extends('admin.layout_admin')
@section('title', $title)

@section('admin.content')
    {{-- @if (session('message'))
        <p class="text-success">{{ session('message') }}</p>
    @endif --}}
    <h1>{{ $title }}</h1>

    <div class="p-4" style="min-height: 800px">
        <form action="{{ route('admin.products.addPostProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Mô tả sản phẩm</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="price">Giá sản phẩm</label>
                <input type="number" name="price" id="price" class="form-control">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">Ảnh sản phẩm</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-info">Quay lại</a>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>


    </div>
@endsection
