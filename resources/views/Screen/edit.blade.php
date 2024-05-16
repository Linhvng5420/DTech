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
                        <h3>Chỉnh Sửa Screen<a href="{{ route('admin.screen.index')}}"
                                                 class="btn btn-danger float-end ml-5">Quay lại</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.screen.update', ['id' => $screen->id]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control" value="{{ $screen->TenSP }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control" value="{{ $screen->MauSac }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Giá</label>
                                <input type="number" name="Gia" class="form-control" value="{{ $screen->Gia }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Kích Thước</label>
                                <input type="number" name="KichThuoc" class="form-control" value="{{ $screen->KichThuoc }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Miêu Tả</label>
                                <textarea type="text" name="MieuTa"
                                          class="form-control">{{ $screen->MieuTa }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" class="form-control" value="{{ $screen->Hang }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hình Ảnh</label>
                                <input type="file" name="HinhAnh" class="form-control">
                                <img src="{{ asset('uploads/screen/' . $screen->HinhAnh) }}" width="70px"
                                     height="70px" alt="Ảnh sản phẩm hiện tại">
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
