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
                        <a href="{{ route('admin.earphone.index', ['id' => $earphone->id]) }}" class="btn btn-danger float-end">Quay
                            lại</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.earphone.update', ['id' => $earphone->id]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mv-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" id="" value="{{$earphone->TenSP}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" id="" value="{{$earphone->MauSac}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Giá</label>
                                <input type="number" name="Gia" id="" value="{{$earphone->Gia}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Ram</label>
                                <input type="number" name="MieuTa" id="" value="{{$earphone->MieuTa}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" id="" value="{{$earphone->Hang}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Ảnh</label>
                                <input type="file" name="HinhAnh" id="" class="form-control">
                                <img src="{{asset('uploads/earphone/'.$earphone->HinhAnh)}}" width="70px" height="70px"
                                     alt="Ảnh">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
