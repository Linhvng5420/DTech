@extends('dashboard')

@section('content')
    <h1>Thêm Sản Phẩm EarPhone</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('earphones.store') }}" method="POST">
        @csrf
        Tên Sản Phẩm: <input type="text" name="TenSP" required><br>
        Hình Ảnh: <input type="text" name="HinhAnh"><br>
        Màu Sắc: <input type="text" name="MauSac" required><br>
        Giá: <input type="number" name="Gia" required><br>
        Miêu Tả: <textarea name="MieuTa"></textarea><br>
        Hãng: <input type="text" name="Hang" required><br>

        <button type="submit">Thêm Sản Phẩm</button>
    </form>
@endsection
