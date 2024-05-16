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
                        <h3>Mouse CRUD</h3>
                        <a href="{{ route('admin.mouse.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
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
                                <th>Miêu Tả</th>
                                <th>Hãng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mouses as $mouse)
                                <tr>
                                    <td>{{ $mouse->id }}</td>
                                    <td>{{ $mouse->TenSP }}</td>
                                    <td><img src="{{ asset('uploads/mouse/' . $mouse->HinhAnh) }}" width="70px"
                                             height="70px" alt="Ảnh sản phẩm"></td>
                                    <td>{{ $mouse->MauSac }}</td>
                                    <td>{{ $mouse->Gia }}</td>
                                    <td>{{ $mouse->MieuTa }}</td>
                                    <td>{{ $mouse->Hang }}</td>
                                    <td>
                                        <a href="{{ route('admin.mouse.edit', ['id' => $mouse->id]) }}"
                                           class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('admin.mouse.delete', ['id' => $mouse->id]) }}"
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
                            <li class="page-item {{ $mouses->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $mouses->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $mouses->lastPage(); $i++)
                                <li class="page-item {{ $mouses->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $mouses->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $mouses->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $mouses->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
