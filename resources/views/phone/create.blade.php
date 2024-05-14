<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                        <h3>Thêm Phone<a href="{{ route('phone.store')}}" class="btn btn-danger float-end">Quay lại</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phone.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Giá</label>
                                <input type="text" name="Gia" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hãng</label>
                                <input type="text" name="Hang" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">RAM</label>
                                <input type="text" name="Ram" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">ROM</label>
                                <input type="text" name="Rom" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mô Tả</label>
                                <textarea name="MieuTa" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Hình Ảnh</label>
                                <input type="file" name="HinhAnh" class="form-control">
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
</body>

</html>
