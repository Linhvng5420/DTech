@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mt-2">
                    <div class="card" style="padding: 5px; height: 30rem; width: 20rem;
        display: grid; justify-items: center; align-items: center;">

                        <a href="{{ route('product.view', ['productType' => strtolower(str_replace('App\\Models\\', '', get_class($product))), 'id' => $product->id]) }}"
                           class="text-decoration-none">
                            <div style="display: flex;justify-content: center;">
                                @php
                                    $productType = strtolower(str_replace('App\\Models\\', '', get_class($product)));
                                @endphp
                                <img src="{{ asset('uploads/'. $productType .'/' . $product->HinhAnh) }}"
                                     alt="{{ $product->TenSP }}"
                                     class="card-img-top"
                                     style="max-height: 200px; object-fit: contain;">
                            </div>
                            <div class="card-body" style="display: grid; justify-items: center;">
                                <h5 class="card-title" style="font-weight: bold; text-align: center;">
                                    {{ mb_strtoupper(($productType).' - '.($product->TenSP))}}
                                </h5>
                                <p class="card-text"
                                   style="font-style: italic; color: #343a40; ">{{ $product->MieuTa }}</p>
                                <p class="card-text" style="font-weight:bold; color: #343a40; ">
                                    Giá: {{ number_format($product->Gia) }} VND</p>
                            </div>
                        </a>

                        <!--Nút Giỏ Hàng (Chưa action)-->
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary btn-sm float-right">
                                <i class="fas fa-plus"></i> Thêm vào giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{--        <!--Phân Trang-->--}}
        {{--        <div class="d-flex justify-content-center mt-4">--}}
        {{--            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}--}}
        {{--        </div>--}}
    </div>
@endsection

@section('styles')
    <style>
        .pagination svg {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection
