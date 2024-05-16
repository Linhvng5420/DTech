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
                        <h3>Laptop Crud</h3>
                        <a href="{{ route('laptop.add') }}" class="btn btn-primary">Thêm lapTop</a>
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
                            @foreach($laptops as $laptop)
                                <tr>
                                    <td>{{ $laptop->id }}</td>
                                    <td>{{ $laptop->TenSP }}</td>
                                    <td><img src="{{ asset('images/'.$laptop->HinhAnh) }}" width="70px"
                                             height="70px" alt="Ảnh sản phẩm"></td>
                                    <td>{{ $laptop->MauSac }}</td>
                                    <td>{{ $laptop->Gia }}</td>
                                    <td>{{ $laptop->Ram }}</td>
                                    <td>{{ $laptop->Rom }}</td>
                                    <td>{{ $laptop->Hang }}</td>
                                    <td>
                                        <a href="{{ route('laptop.edit', ['id' => $laptop->id]) }}"
                                           class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('laptop.delete', ['id' => $laptop->id]) }}"
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
                            <li class="page-item {{ $laptops->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $laptops->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $laptops->lastPage(); $i++)
                                <li class="page-item {{ $laptops->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $laptops->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $laptops->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $laptops->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
