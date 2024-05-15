<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Thêm Laptop</h3>
                        <a href="{{ route('laptop.all') }}" class="btn btn-danger">Quay lại</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laptop.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="TenSP" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="MauSac" class="form-label">Màu Sắc</label>
                                <input type="text" name="MauSac" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Gia" class="form-label">Giá</label>
                                <input type="text" name="Gia" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Ram" class="form-label">Ram</label>
                                <input type="text" name="Ram" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Rom" class="form-label">Rom</label>
                                <input type="text" name="Rom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Hang" class="form-label">Hãng</label>
                                <input type="text" name="Hang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="HinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" name="HinhAnh" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
