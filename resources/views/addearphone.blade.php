@extends('dashboard')

@section('content')
    <div style="display: grid; justify-content: center;">
        <h1>Thêm Sản Phẩm EarPhone</h1>

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <form action="{{ route('earphones.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            Tên Sản Phẩm: <input type="text" name="TenSP" required><br>
            Màu Sắc: <input type="text" name="MauSac" required><br>
            Giá: <input type="number" name="Gia" required><br>
            Miêu Tả: <textarea name="MieuTa"></textarea><br>
            Hãng: <input type="text" name="Hang" required><br>

            <div class="form-group">
                <label for="HinhAnh">Hình Ảnh:</label>
                <input type="file" id="HinhAnh" name="HinhAnh">
            </div>

            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>
@endsection
