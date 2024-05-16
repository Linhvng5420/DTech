@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Chỉnh sửa EarPhone<a href="{{ route('admin.earphone.index')}}"
                                                 class="btn btn-danger float-end ml-5">Quay lại</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.earphone.update', ['id' => $earphone->id]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control" value="{{ $earphone->TenSP }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control" value="{{ $earphone->MauSac }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Giá</label>
                                <input type="number" name="Gia" class="form-control" value="{{ $earphone->Gia }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Miêu Tả</label>
                                <textarea type="text" name="MieuTa"
                                          class="form-control">{{ $earphone->MieuTa }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" class="form-control" value="{{ $earphone->Hang }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hình Ảnh</label>
                                <input type="file" name="HinhAnh" class="form-control">
                                <img src="{{ asset('uploads/earphone/' . $earphone->HinhAnh) }}" width="70px"
                                     height="70px" alt="Ảnh sản phẩm hiện tại">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
