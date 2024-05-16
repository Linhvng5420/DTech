@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm Screens
                            <a href="{{ route('admin.screen.index') }}" class="btn btn-danger float-end ml-5">Quay
                                lại</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.screen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="TenSP">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="MauSac">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="Gia">Giá</label>
                                <input type="number" name="Gia" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Kích Thước</label>
                                <input type="number" name="KichThuoc" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="MieuTa">Miêu Tả</label>
                                <textarea name="MieuTa" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Hang">Hãng</label>
                                <input type="text" name="Hang" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="HinhAnh">Hình Ảnh</label>
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
