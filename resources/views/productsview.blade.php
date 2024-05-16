@extends('dashboard')

@section('content')
    <div class="container" id="app">
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

                    <div
                        style="margin-left: 100px; margin-top: -46px; margin-left: 100px; padding: 5px; border: 2px double green; border-radius: 15px;
                        width: 400px; align-items: center; display: flex;  justify-content: center; background-color: lightgray;">
                        <div v-for="color in colors" :key="color" style="display: inline-block; margin-right: 5px;">
                            <button class="btn btn-m rounded-circle"
                                    :style="{ backgroundColor: color, width: '25px', height: '25px' }"
                                    @click="currentColor = color">
                            </button>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <p><strong>Chi Tiết:</strong> <br></p>
                        <div
                            style="border: green solid medium; border-radius: 10px; padding: 20px; height: 200px; margin-bottom: 10px;">
                            <p><i style="font-style: italic;">{{ $product->MieuTa }}</i></p>
                        </div>
                    </div>

                    <div
                        style="border: green solid medium; border-radius: 10px; padding: 10px; width: 250px; margin-left: 520px;">
                        <p style="color: #4cae4c; font-weight: bold; text-align: end; padding-top: 20px;">
                            Số Lượng: {{ number_format($product->Gia-1500000) }}</p>
                        <p style="color: #4cae4c; font-weight: bold; text-align: end;">
                            Giá: {{ number_format($product->Gia) }} VND</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <!--Nút Giỏ Hàng (Chưa action)-->
            <form action="#" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary btn-sm float-right">
                    <i class="fas fa-plus"></i> Thêm vào giỏ hàng
                </button>
            </form>

            <script>
                var app = new Vue({
                    el: '#app',
                    data: {
                        colors: [],
                        currentColor: '',
                        allColors: ['red', 'yellow', 'green', 'blue', 'orange', 'white', 'black', 'purple', 'pink', 'grey'],
                    },
                    created() {
                        this.generateRandomColors();
                    },
                    methods: {
                        generateRandomColors() {
                            const numberOfColors = Math.floor(Math.random() * (7 - 3 + 1)) + 3; // Random từ 3 đến 7
                            this.colors = [];
                            for (let i = 0; i < numberOfColors; i++) {
                                const randomColorIndex = Math.floor(Math.random() * this.allColors.length);
                                this.colors.push(this.allColors[randomColorIndex]);
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
@endsection

