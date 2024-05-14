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
        <div class="product-list">
            <!-- Laptop -->
            <div id="laptop">
                <h1>LAPTOP</h1>
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
            min-height: 100vh;
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
    </style>

@endpush
