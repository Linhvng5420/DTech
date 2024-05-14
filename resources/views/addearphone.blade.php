@extends('dashboard')

@section('content')
    <form method="POST" action="/earphone">
        @csrf
        <label for="MaSP">Mã sản phẩm:</label>
        <input type="text" id="MaSP" name="MaSP" required>

        <label for="TenSP">Tên sản phẩm:</label>
        <input type="text" id="TenSP" name="TenSP" required>

        <button type="submit">Submit</button>
    </form>
@endsection
