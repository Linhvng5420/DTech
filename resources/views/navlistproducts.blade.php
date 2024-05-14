@extends('dashboard')

@section('content')

    <div class="container">
        <div class="sidebar">
            <h3 style="text-align: center; color: greenyellow">Sản Phẩm</h3>
            <ul>
                <li><a href="{{ route('products.phone') }}">Phone</a></li>
                <li><a href="#laptop">Laptop</a></li>
                <li><a href="#desktop">Desktop</a></li>
                <li><a href="#mouse">Mouse</a></li>
                <li><a href="#earphone">EarPhone</a></li>
                <li><a href="#screen">Screen</a></li>
            </ul>
        </div>

        <!-- Table -->
        <div class="product-list">
            <div class="content-yield">
                @yield('content')
                @yield('content_update')
            </div>
        </div>
    </div>

@endsection

@push('styles')

    <style>
        .content-yield {
            display: grid;
            justify-content: center;
        }

        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            min-height: 10px;
            flex-direction: row-reverse;
        }
        .sidebar {
            width: 140px;
            height: 150px;
            background-color: #343a40;
            padding: 10px;
            color: white;
            position: fixed;
            top: 70px;
            left: 10px;
            overflow-y: auto;
        }
        .product-list {
            flex-grow: 1;
            padding: 20px;
            overflow-x: auto;
            background-color: white;
            margin-left: 10%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 12px;
            text-align: left;
            word-wrap: break-word;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .sidebar h2 {
            margin-bottom: 10px;
        }
        ul {
            padding-left: 0;
        }
        li {
            list-style-type: none;
            padding: 8px 0;
            cursor: pointer;
        }
        li:hover {
            background-color: #007bff;
            color: white;
        }
        ul li a {
            text-decoration: none; color: black;
            color: white;
            font-weight: bold;
        }

        /* Phan Trang */
        nav {
            font-size: 12px;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 5px;
        }

        .pagination {
            display: inline-block;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            display: flex;
            margin: 0;
        }

        svg {
            height: 0px;
        }

        /* Button */
        .title-with-button {
            display: flex;
            justify-content: space-between; /* Căn chỉnh tiêu đề và nút ở hai đầu */
            align-items: center; /* Căn giữa theo chiều dọc */
        }

        .add-button {
            width: 150px;
            height: 40px;
            font-size: 25px;
            font-weight: bold;
            padding: 5px 10px; /* Padding xung quanh nội dung của nút */
            background-color: limegreen; /* Màu nền */
            color: white; /* Màu chữ */
            border: none; /* Xóa viền */
            border-radius: 5px; /* Làm tròn góc */
            cursor: pointer; /* Hiển thị con trỏ như nút bấm */
            text-align: center; /* Căn giữa chữ trong nút */
            outline: none; /* Xóa đường viền focus mặc định */
        }

        .add-button:hover {
            background-color: seagreen; /* Màu nền khi hover */
        }
    </style>

@endpush
