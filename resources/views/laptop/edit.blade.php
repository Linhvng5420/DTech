@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('laptop.all', ['id' => $laptop->id]) }}" class="btn btn-danger float-end">Quay
                            lại</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laptop.update', ['id' => $laptop->id]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mv-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" id="" value="{{$laptop->TenSP}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" id="" value="{{$laptop->MauSac}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Giá</label>
                                <input type="number" name="Gia" id="" value="{{$laptop->Gia}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Ram</label>
                                <input type="number" name="Ram" id="" value="{{$laptop->Ram}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Rom</label>
                                <input type="number" name="Rom" id="" value="{{$laptop->Rom}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" id="" value="{{$laptop->Hang}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Ảnh</label>
                                <input type="file" name="HinhAnh" id="" class="form-control">
                                <img src="{{asset('uploads/laptop/'.$laptop->HinhAnh)}}" width="70px" height="70px"
                                     alt="Ảnh">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Cập nhật Sản Phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
