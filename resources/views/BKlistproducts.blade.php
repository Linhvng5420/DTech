@extends('dashboard')

@section('content')

    <div class="container">
        <div class="sidebar">
            <h3 style="text-align: center; color: greenyellow">Sản Phẩm</h3>
            <ul>
                <li><a href="#phone">Phone</a></li>
                <li><a href="#laptop">Laptop</a></li>
                <li><a href="#desktop">Desktop</a></li>
                <li><a href="#mouse">Mouse</a></li>
                <li><a href="#earphone">EarPhone</a></li>
                <li><a href="#screen">Screen</a></li>
            </ul>
        </div>

        <!-- Table -->
        <div class="product-list">
            <!-- Phone -->
            @if($type == 'phone')
            <div id="phone">
                <div class="title-with-button">
                    <h1>PHONE</h1>
                    <button class="add-button">Thêm +</button>
                </div>
                <table>
                    <tr>
                        <th>MaSP</th>
                        <th>TenSP</th>
                        <th>HinhAnh</th>
                        <th>MauSac</th>
                        <th>Gia</th>
                        <th>Ram</th>
                        <th>Rom</th>
                        <th>MieuTa</th>
                        <th>Hang</th>
                    </tr>

                    <!--Load danh sach san pham-->
                    @foreach ($phones as $phone)
                        <tr>
                            <td>{{ $phone->id }}</td>
                            <td>{{ $phone->TenSP }}</td>
                            <td>{{ $phone->HinhAnh }}</td>
                            <td>{{ $phone->MauSac }}</td>
                            <td>{{ $phone->Gia }}</td>
                            <td>{{ $phone->Ram }}</td>
                            <td>{{ $phone->Rom }}</td>
                            <td>{{ $phone->MieuTa }}</td>
                            <td>{{ $phone->Hang }}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="container">
                    <div class="pagination-container">
                        {!! $phones->links() !!}
                    </div>
                </div>
            </div>
            @endif

            <!-- Laptop -->
            @if($type == 'laptop')
            <div id="laptop">
                <div class="title-with-button">
                    <h1>LAPTOP</h1>
                    <button class="add-button">Thêm +</button>
                </div>
                <table>
                    <tr>
                        <th>MaSP</th>
                        <th>TenSP</th>
                        <th>HinhAnh</th>
                        <th>MauSac</th>
                        <th>Gia</th>
                        <th>Ram</th>
                        <th>Rom</th>
                        <th>MieuTa</th>
                        <th>Hang</th>
                    </tr>

                    <!--Load danh sach san pham-->
                    @foreach ($laptops as $laptop)
                        <tr>
                            <td>{{ $laptop->id }}</td>
                            <td>{{ $laptop->TenSP }}</td>
                            <td>{{ $laptop->HinhAnh }}</td>
                            <td>{{ $laptop->MauSac }}</td>
                            <td>{{ $laptop->Gia }}</td>
                            <td>{{ $laptop->Ram }}</td>
                            <td>{{ $laptop->Rom }}</td>
                            <td>{{ $laptop->MieuTa }}</td>
                            <td>{{ $laptop->Hang }}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="container">
                    <div class="pagination-container">
                        {!! $laptops->links() !!}
                    </div>
                </div>

            </div>
            @endif

            <!-- Destop -->
            @if($type == 'desktop')
            <div id="desktop">
                <div class="title-with-button">
                    <h1>DESKTOP</h1>
                    <button class="add-button">Thêm +</button>
                </div>
                <table>
                    <tr>
                        <th>MaSP</th>
                        <th>TenSP</th>
                        <th>HinhAnh</th>
                        <th>MauSac</th>
                        <th>Gia</th>
                        <th>Ram</th>
                        <th>Rom</th>
                        <th>MieuTa</th>
                        <th>Hang</th>
                    </tr>

                    <!--Load danh sach san pham-->
                    @foreach ($desktops as $desktop)
                        <tr>
                            <td>{{ $desktop->id }}</td>
                            <td>{{ $desktop->TenSP }}</td>
                            <td>{{ $desktop->HinhAnh }}</td>
                            <td>{{ $desktop->MauSac }}</td>
                            <td>{{ $desktop->Gia }}</td>
                            <td>{{ $desktop->Ram }}</td>
                            <td>{{ $desktop->Rom }}</td>
                            <td>{{ $desktop->MieuTa }}</td>
                            <td>{{ $desktop->Hang }}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="container">
                    <div class="pagination-container">
                        {!! $desktops->links() !!}
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>

@endsection

@push('styles')

    <style>
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
            height: 520px;
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
