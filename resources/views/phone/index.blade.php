<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WASSASU</title>
    <!-- Latest compiled and minified CSS -->
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
                        <h3>WASSASU Laravel</h3>
                        <a href="{{ route('phone.add') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Màu Sắc</th>
                                    <th>Giá</th>
                                    <th>Ram</th>
                                    <th>Rom</th>
                                    <th>Hãng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($phones as $phone)
                                <tr>
                                    <td>{{ $phone->id }}</td>
                                    <td>{{ $phone->TenSP }}</td>
                                    <td><img src="{{ asset('uploads/phone/'.$phone->HinhAnh) }}" width="70px" height="70px" alt="Ảnh sản phẩm"></td>
                                    <td>{{ $phone->MauSac }}</td>
                                    <td>{{ $phone->Gia }}</td>
                                    <td>{{ $phone->Ram }}</td>
                                    <td>{{ $phone->Rom }}</td>
                                    <td>{{ $phone->Hang }}</td>
                                    <td>
                                        <a href="{{ route('phone.edit', ['id' => $phone->id]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('phone.delete', ['id' => $phone->id]) }}" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Phân trang -->
                    <div class="card-footer d-flex justify-content-center">
                        <ul class="pagination pagination-sm">
                            <li class="page-item {{ $phones->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $phones->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $phones->lastPage(); $i++)
                                <li class="page-item {{ $phones->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $phones->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                                <li class="page-item {{ $phones->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $phones->nextPageUrl() }}">Next</a>
                                </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>