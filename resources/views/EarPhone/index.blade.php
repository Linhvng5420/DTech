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
                        <h3>earphone CRUD</h3>
                        <a href="{{ route('admin.earphone.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
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
                            @foreach($earphones as $earphone)
                                <tr>
                                    <td>{{ $earphone->id }}</td>
                                    <td>{{ $earphone->TenSP }}</td>
                                    <td><img src="{{ asset('uploads/earphone/' . $earphone->HinhAnh) }}" width="70px"
                                             height="70px"
                                             alt="Ảnh sản phẩm"></td>
                                    <td>{{ $earphone->MauSac }}</td>
                                    <td>{{ $earphone->Gia }}</td>
                                    <td>{{ $earphone->MieuTa }}</td>
                                    <td>{{ $earphone->Hang }}</td>
                                    <td>
                                        <a href="{{ route('admin.earphone.edit', ['id' => $earphone->id]) }}"
                                           class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('admin.earphone.delete', ['id' => $earphone->id]) }}"
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
                            <li class="page-item {{ $earphone->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $earphone->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $earphone->lastPage(); $i++)
                                <li class="page-item {{ $earphone->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $earphone->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $earphone->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $earphone->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
