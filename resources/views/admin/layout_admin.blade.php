<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Đảm bảo body chiếm toàn bộ màn hình */
            margin: 0;
        }

        .container-fluid {
            flex: 1;
            /* Đẩy nội dung lên trên, giúp footer nằm dưới */
        }

        footer {
            width: 100%;
            background-color: #343a40;
            /* Màu nền */
            
            /* padding: 10px 0; */
         
        }

        /* Điều chỉnh sidebar và nội dung chính */
        .sidebar {
            width: 25%;
            height: calc(100vh - 60px);
            /* Trừ đi chiều cao footer */
            position: fixed;
            overflow-y: auto;
        }

        main {
            margin-left: 25%;
            min-height: calc(100vh - 120px);
            /* Đảm bảo nội dung đủ dài */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            main {
                margin-left: 0;
            }
        }
    </style>


</head>

<body>
    <div class="container-fluid flex-grow-3">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                @include('admin.layouts.sidebar')
            </div>

            <!-- Content -->
            <div class="col-md-9">
                @yield('admin.content')
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')
</body>

</html>
