@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mt-2">
                    <div class="card" style="padding: 5px; height: 30rem; width: 20rem;
                    display: grid; justify-items: center; align-items: center;">
                        <div>
                            <img src="{{ asset('images/' . $product->HinhAnh) }}" alt="{{ $product->TenSP }}"
                                 class="card-img-top" style="max-width: 200px; max-height: 190px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->TenSP }}</h5>
                            <p class="card-text">{{ $product->MieuTa }}</p>
                            <p class="card-text">Giá: {{ number_format($product->Gia) }} VND</p>
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
                </div>
            @endforeach
        </div>

        <!--Phân Trang-->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
{{--            {{ $products->links('pagination::bootstrap-4') }}--}}
        </div>
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
