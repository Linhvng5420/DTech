@extends('dashboard')

@section('content')
    <div class="container">
        <div class="product-details" style="border: inset; padding: 10px; margin-bottom: 10px; width: 500px;">

            <h2 style="color: #007bff; font-weight: bold; text-align: center;">{{ mb_strtoupper(($productType).' '.($product->TenSP))}}</h2>

            <div class="product-image">
                <img src="{{ asset('uploads/'. $productType .'/' . $product->HinhAnh) }}"
                     alt="{{ $product->TenSP }}"
                     class="card-img-top"
                     style="max-height: 300px; object-fit: contain; margin-bottom: 10px">

                <div class="product-info">
                    <p><strong>Màu Sắc:</strong> {{ $product->MauSac }}</p>

                    <div style="display: flex; justify-content: space-around; align-items: center; margin: 10px;
                    padding: 15px; background-color: #cbd5e0;">
                        <button class="btn btn-m rounded-circle" style="background-color: red;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: yellow;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: green;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: blue;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: orange;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: white;"></button>

                        <button class="btn btn-m rounded-circle" style="background-color: black;"></button>
                    </div>

                    <p><i style="font-style: italic;">{{ $product->MieuTa }}</i></p>
                    <p style="color: #4cae4c; font-weight: bold; text-align: end;">
                        Giá: {{ number_format($product->Gia) }} VND</p>
                </div>
            </div>
        </div>

        <!--Nút Giỏ Hàng (Chưa action)-->
        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Thêm vào giỏ hàng
            </button>
        </form>
    </div>
@endsection
