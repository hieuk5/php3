<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .menu-container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }
        .menu-card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .menu-card:hover {
            transform: scale(1.05);
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="menu-container">
        <h2 class="mb-4">🔧 Hệ Thống Quản Lý</h2>

        <div class="card menu-card">
            <div class="card-body">
                {{-- <a href="{{ route('categories.index') }}" class="btn btn-primary btn-custom">📂 Quản Lý Danh Mục</a>
                <a href="{{ route('products.index') }}" class="btn btn-success btn-custom">🛒 Quản Lý Sản Phẩm</a>
                <a href="{{ route('user.show', ['name' => 'Admin']) }}" class="btn btn-info btn-custom">👤 Thông Tin Người Dùng</a>
                <a href="{{ route('form.show') }}" class="btn btn-warning btn-custom">📝 Form Nhập Liệu</a>
                <a href="{{ route('calculator.show') }}" class="btn btn-danger btn-custom">🧮 Máy Tính</a>
                <a href="{{ route('students.index') }}" class="btn btn-secondary btn-custom">🎓 Danh Sách Sinh Viên</a> --}}
                <a href="{{ route('admin.login') }}" class="btn btn-dark btn-custom">🎓 Bài ASM</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
