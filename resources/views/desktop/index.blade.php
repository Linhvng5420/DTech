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
                        <h3>CRUD LAPTOP</h3>
                        <a href="{{ route('desktop.add') }}" class="btn btn-primary">Thêm desktop</a>
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
                            @foreach($desktops as $desktop)
                                <tr>
                                    <td>{{ $desktop->id }}</td>
                                    <td>{{ $desktop->TenSP }}</td>
                                    <td><img src="{{ asset('uploads/desktop/' . $desktop->HinhAnh) }}" width="100px"
                                             height="70px" alt="Ảnh sản phẩm"></td>
                                    <td>{{ $desktop->MauSac }}</td>
                                    <td>{{ $desktop->Gia }}</td>
                                    <td>{{ $desktop->Ram }}</td>
                                    <td>{{ $desktop->Rom }}</td>
                                    <td>{{ $desktop->Hang }}</td>
                                    <td>
                                        <a href="{{ route('desktop.edit', ['id' => $desktop->id]) }}"
                                           class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('desktop.delete', ['id' => $desktop->id]) }}"
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
                            <li class="page-item {{ $desktops->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $desktops->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $desktops->lastPage(); $i++)
                                <li class="page-item {{ $desktops->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $desktops->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $desktops->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $desktops->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
