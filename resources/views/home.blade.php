@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($phones as $phone)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $phone->HinhAnh }}" alt="{{ $phone->TenSP }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $phone->TenSP }}</h5>
                            <p class="card-text">{{ $phone->MieuTa }}</p>
                            <p class="card-text">Giá: {{ number_format($phone->Gia) }} VND</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
