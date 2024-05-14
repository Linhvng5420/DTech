@extends('dashboard')

@section('content')
    <div class="form-card">
        <h1>Thêm Sản Phẩm Desktop</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('desktop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="TenSP">Tên Sản Phẩm:</label>
                <input type="text" id="TenSP" name="TenSP" required>
            </div>
            <div class="form-group">
                <label for="HinhAnh">Hình Ảnh:</label>
                <input type="file" id="HinhAnh" name="HinhAnh">
            </div>
            <div class="form-group">
                <label for="MauSac">Màu Sắc:</label>
                <input type="text" id="MauSac" name="MauSac" required>
            </div>
            <div class="form-group">
                <label for="Gia">Giá:</label>
                <input type="number" id="Gia" name="Gia" required>
            </div>
            <div class="form-group">
                <label for="Ram">Ram:</label>
                <input type="number" id="Ram" name="Ram" required>
            </div>
            <div class="form-group">
                <label for="Rom">Rom:</label>
                <input type="number" id="Rom" name="Rom" required>
            </div>
            <div class="form-group">
                <label for="MieuTa">Miêu Tả:</label>
                <textarea id="MieuTa" name="MieuTa"></textarea>
            </div>
            <div class="form-group">
                <label for="Hang">Hãng:</label>
                <input type="text" id="Hang" name="Hang" required>
            </div>
            <div class="form-group">
                <button type="submit">Thêm Sản Phẩm</button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .form-card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;

            display: grid;
            align-items: center;
        }
        .form-card h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #5cb85c;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #4cae4c;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }
    </style>
@endpush
