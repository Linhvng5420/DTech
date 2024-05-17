<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Tech</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.46/dist/vue.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    @stack('styles')
</head>

<body>

<nav class="navbar">
    <!-- Title -->
    <p>D-Tech</p>

    <!-- Home -->
    <a href="{{ route('home') }}">Home</a>

    <!-- Cart -->
    <a href="#">Giỏ Hàng</a>

    @guest
        <!-- Users -->
        <a href="{{ route('login') }}">Đăng Nhập</a>
        <a href="{{ route('signup') }}">Đăng Ký</a>
    @else
        <!-- Trang Cá Nhân -->
        <a href="{{ route('users.view', ['id' => Auth::user()->id]) }}">Trang Cá Nhân</a>

        <!-- CRUD -->
        @if(Auth::user()->role == 'admin')
            <div class="dropdown">
                <a href="#">Quản Trị</a>
                <div class="dropdown-content">
                    <div class="dropdown-submenu">
                        <a>Sản Phẩm</a>
                        <div class="dropdown-submenu-content">
                            <a href="{{route('desktop.all')}}">Desktop</a>
                            <a href="{{route('admin.earphone.index')}}">EarPhone</a>
                            <a href="{{route('laptop.all')}}">Laptop</a>
                            <a href="{{ route('admin.phone.index') }}">Phone</a>
                            <a href="{{route('admin.mouse.index')}}">Mouse</a>
                            <a href="{{route('admin.screen.index')}}">Screen</a>
                        </div>
                    </div>
                    <a href="{{ route('users.list') }}">User</a>
                </div>
            </div>
        @endif

        <!-- Đăng Xuất -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng Xuất</a>
    @endguest
</nav>

<!-- Chỉ hiển thụi subnav khi ở trang sp-->
@if(request()->is('products') || request()->is('products/*') || request()->is('/') || request()->is('search') || request()->is('search/*'))
    @include('navsub')
@endif

<div class="content-yield">
    @yield('content')
    @yield('content_update')
</div>

{{--product-card với vuejs--}}
@if(request()->is('products') || request()->is('products/*') || request()->is('/') || request()->is('search') || request()->is('search/*'))
    <section id="app">
        <div class="container">
            <div class="row">
                <product-card v-for="product in products" :key="product.id" :product="product"></product-card>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

    <script>
        const app = Vue.createApp({});
        app.component('product-card', require('./components/product-card.vue').default);
        app.mount('#app');
    </script>
@endif

<footer style="background-color: #333; color: white; padding: 20px 0;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; text-align: center;">
        <h2><strong>Team D</strong></h2>
        <div class="footer-links" style="margin-top: 10px;">
            <a href="{{ url('/about') }}" style="color: #ccc; text-decoration: none; margin: 0 15px;">About Us</a>
            <a href="" style="color: #ccc; text-decoration: none; margin: 0 15px;">Contact</a>
            <a href="" style="color: #ccc; text-decoration: none; margin: 0 15px;">Privacy Policy</a>
            <a href="" style="color: #ccc; text-decoration: none; margin: 0 15px;">Terms of Service</a>
        </div>
        <div class="social-media" style="margin-top: 15px;">
            <a href="https://facebook.com" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">
                Facebook
            </a>
            <a href="https://twitter.com" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">
                Twitter
            </a>
            <a href="https://instagram.com" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">
                Instagram
            </a>
            <a href="https://linkedin.com" target="_blank" style="color: #ccc; text-decoration: none; margin: 0 10px;">
                LinkedIn
            </a>
        </div>
        <div class="copyright" style="margin-top: 20px;">
            <p>&copy; 2024 D-Tech. All Rights Reserved.</p>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #f0f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5px;
        position: relative;
    }

    .navbar p {
        margin: 0;
        padding: 5px;
        font-size: 30px;
        font-weight: bold;
        color: #5cb85c;
        position: absolute;
        left: 10px;
    }

    .navbar a {
        color: #5f6368;
        text-decoration: none;
        padding: 10px 20px;
        font-weight: bold;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
        border-radius: 5px;
    }

    footer {
        display: grid;
        padding: 1%;
        margin-top: 15px;
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

    /*Login - SignUp*/
    label {
        font-weight: bold;
    }
</style>
</body>
</html>

