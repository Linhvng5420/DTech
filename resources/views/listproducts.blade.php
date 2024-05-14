@extends('navlistproducts')

@section('content')
    <!-- Phone -->
    <div id="phone">
        <div class="title-with-button">
            <h1>PHONE</h1>
            <button class="add-button">Thêm +</button>
        </div>
        <table>
            <tr>
                <th>MaSP</th>
                <th>TenSP</th>
                <th>HinhAnh</th>
                <th>MauSac</th>
                <th>Gia</th>
                <th>Ram</th>
                <th>Rom</th>
                <th>MieuTa</th>
                <th>Hang</th>
            </tr>

            <!-- Load danh sach san pham -->
            @foreach ($phones as $phone)
                <tr>
                    <td>{{ $phone->id }}</td>
                    <td>{{ $phone->TenSP }}</td>
                    <td>{{ $phone->HinhAnh }}</td>
                    <td>{{ $phone->MauSac }}</td>
                    <td>{{ $phone->Gia }}</td>
                    <td>{{ $phone->Ram }}</td>
                    <td>{{ $phone->Rom }}</td>
                    <td>{{ $phone->MieuTa }}</td>
                    <td>{{ $phone->Hang }}</td>
                </tr>
            @endforeach
        </table>

        <div class="container">
            <div class="pagination-container">
                {!! $phones->links() !!}
            </div>
        </div>
    </div>
@endsection
