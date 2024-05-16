@extends('dashboard')

@section('content')
    <div class="container">
        <div class="product-details" style="border: 5px groove snow; padding: 10px; margin-bottom: 10px; width: 800px;">

            <h2 style="color: #007bff; font-weight: bold; text-align: center;">{{ mb_strtoupper(($productType).' '.($product->TenSP))}}</h2>

            <div class="product-image">
                <img src="{{ asset('uploads/'. $productType .'/' . $product->HinhAnh) }}"
                     alt="{{ $product->TenSP }}"
                     class="card-img-top"
                     style="max-height: 300px; object-fit: contain; margin-bottom: 10px">

                <div class="product-info">
                    <p><strong>Màu Sắc:</strong> {{ $product->MauSac }}</p>

                    <p><strong>Màu Khác:</strong></p>
                    <div style="display: flex; justify-content: space-evenly; align-items: center; margin-bottom: 10px;
                    padding: 15px; background-color: #cbd5e0; border-radius: 15px;">
                        <button class="btn btn-m rounded-circle"
                                style="background-color: red; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: yellow; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: green; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: blue; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: orange; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: white; width: 25px; height: 25px;"></button>

                        <button class="btn btn-m rounded-circle"
                                style="background-color: black; width: 25px; height: 25px;"></button>
                    </div>

                    <p><i style="font-style: italic;">{{ $product->MieuTa }}</i></p>
                    <p style="color: #4cae4c; font-weight: bold; text-align: end;">
                        Số Lượng: {{ number_format($product->Gia-1500000) }}</p>
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
