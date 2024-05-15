<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: center;
            margin: 0 5%;
            border: 1px solid black;
            align-items: center;
        }

        .navbar a, p {
            color: black;
            text-decoration: none;
            padding: 20px 20px;
            font-weight: bold;
        }

        .navbar p {
            font-size: 30px;
            position: absolute;
            left: 100px;
            color: red;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 5px;
        }

        footer {
            display: grid;
            margin: 1% 5%;
            padding: 1%;
            border: 1px solid black;
            justify-items: center;
        }

        .content-yield {
            display: grid;
            justify-content: center;
        }

        /* Phần tổng của dropdown */
        .dropdown {
            position: relative;
            display: inline-block; /* Cho phép các mục khác trong navbar được hiển thị cùng một hàng */
        }

        /* Nội dung của dropdown */
        .dropdown-content {
            display: none; /* Ẩn dropdown menu */
            position: absolute; /* Đảm bảo dropdown hiển thị với vị trí tuyệt đối */
            background-color: #f9f9f9; /* Màu nền cho dropdown */
            min-width: 160px; /* Rộng tối thiểu */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); /* Thêm shadow */
            z-index: 1; /* Đảm bảo dropdown ở trên các phần tử khác */
        }

        /* Hiển thị khi được hover */
        .dropdown:hover .dropdown-content {
            display: block; /* Hiển thị dropdown menu */
        }

        /* Style lại links */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none; /* Bỏ gạch dưới */
            display: block; /* Hiển thị đầy đủ chiều rộng */
        }

        /* Thay đổi màu sắc khi được hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <p>D-Tech</p>

    {{--  L-S  --}}
    <a href="#">Đăng Nhập</a>
    <a href="#">Đăng Ký</a>
    <a href="#">Đăng Xuất</a>

    {{--  Home  --}}
    <a href="#">Home</a>

    {{--  User  --}}
    <a href="#">Trang Cá Nhân</a>

    {{--  Cart  --}}
    <a href="#">Giỏ Hàng</a>

    {{-- CRUD --}}
    <div class="dropdown">
        <a href="#">Quản Trị</a>
        <div class="dropdown-content">
            <a href="#">Sản Phẩm</a>
            <a href="#">User</a>
        </div>
    </div>
</nav>

<div class="content-yield">
    @yield('content')
    @yield('content_update')
</div>

<footer><strong>Team D</strong></footer>
</body>
</html>
