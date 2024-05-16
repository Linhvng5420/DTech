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
                    <a href="{{ route('desktop.all', ['id' => $desktop->id]) }}" class="btn btn-danger float-end">Quay lại</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('desktop.update', ['id' => $desktop->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mv-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" id="" value="{{$desktop->TenSP}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" id="" value="{{$desktop->MauSac}}" class="form-control">
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
                                <input type="text" name="Hang" id="" value="{{$desktop->Hang}}" class="form-control">
                            </div>
                            <div class="form-group mv-3">
                                <label for="">Ảnh</label>
                                <input type="file" name="HinhAnh" id="" class="form-control">
                                <img src="{{asset('uploads/desktop/'.$desktop->HinhAnh)}}" width="70px" height="70px"
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
