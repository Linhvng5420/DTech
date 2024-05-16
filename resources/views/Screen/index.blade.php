@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Earphone CRUD</h3>
                        <a href="{{ route('admin.screen.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
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
                                <th>Kích Thước</th>
                                <th>Miêu Tả</th>
                                <th>Hãng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($screens as $screen)
                                <tr>
                                    <td>{{ $screen->id }}</td>
                                    <td>{{ $screen->TenSP }}</td>
                                    <td><img src="{{ asset('uploads/screen/' . $screen->HinhAnh) }}" width="70px"
                                             height="70px" alt="Ảnh sản phẩm"></td>
                                    <td>{{ $screen->MauSac }}</td>
                                    <td>{{ $screen->Gia }}</td>
                                    <td>{{ $screen->KichThuoc }}</td>
                                    <td>{{ $screen->MieuTa }}</td>
                                    <td>{{ $screen->Hang }}</td>
                                    <td>
                                        <a href="{{ route('admin.screen.edit', ['id' => $screen->id]) }}"
                                           class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('admin.screen.delete', ['id' => $screen->id]) }}"
                                           class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Phân trang -->
                    <div class="card-footer d-flex justify-content-center">
                        <ul class="pagination pagination-sm">
                            <li class="page-item {{ $screens->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $screens->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $screens->lastPage(); $i++)
                                <li class="page-item {{ $screens->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $screens->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $screens->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $screens->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
