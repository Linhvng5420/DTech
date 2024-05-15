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
            align-items: center;
            margin: 1% 5%;
            border: 1px solid black;
            position: relative;
        }

        .navbar p {
            margin: 0;
            padding: 5px;
            font-size: 30px;
            font-weight: bold;
            color: red;
            position: absolute;
            left: 10px;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 10px;
            font-weight: bold;
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

        /* dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu-content {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-submenu:hover .dropdown-submenu-content {
            display: block;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <p>D-Tech</p>

    <!-- Users -->
    <a href="{{ route('login') }}">Đăng Nhập</a>
    <a href="{{ route('signup') }}">Đăng Ký</a>

    <!-- Home -->
    <a href="{{ route('home') }}">Home</a>

    <!-- User -->
    <a href="#">Trang Cá Nhân</a>

    <!-- Cart -->
    <a href="#">Giỏ Hàng</a>

    <!-- CRUD -->
    <div class="dropdown">
        <a href="#">Quản Trị</a>
        <div class="dropdown-content">
            <div class="dropdown-submenu">
                <a href="#">Sản Phẩm</a>
                <div class="dropdown-submenu-content">
                    <a href="">Desktop</a>
                    <a href="">EarPhone</a>
                    <a href="">Laptop</a>
                    <a href="">Phone</a>
                    <a href="">Mouse</a>
                    <a href="">Screen</a>
                </div>
            </div>
            <a href="#">User</a>
        </div>
    </div>
</nav>

@include('navsub')

<div class="content-yield">
    @yield('content')
    @yield('content_update')
</div>

<footer><strong>Team D</strong></footer>
</body>
</html>
