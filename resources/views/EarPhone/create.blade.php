@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm EarPhone<a href="{{ route('admin.earphone.index')}}"
                                            class="btn btn-danger float-end ml-5">Quay lại</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.earphone.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Giá</label>
                                <input type="number" name="Gia" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Miêu Tả</label>
                                <textarea type="text" name="MieuTa" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hình Ảnh</label>
                                <input type="file" name="HinhAnh" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
