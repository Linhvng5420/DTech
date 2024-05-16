@extends('dashboard')

@section('content')
    <section class="user-list">
        <div class="container">
            <h2>Quản Trị Tài Khoản</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>

                        @if($user->profile_image)
                            <td><img src="{{ asset('uploads/avatar/' . $user->profile_image) }}"
                                     alt="{{ $user->username }}"
                                     class="profile-image"
                                     style="max-height: 100px; object-fit: contain; border-radius: 50%;"></td>
                        @else
                            <td>No Avatar</td>
                        @endif

                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.view', ['id' => $user->id]) }}">View</a> |
                            <a href="{{ route('users.updateForm', ['id' => $user->id]) }}">Update</a> |
                            <a href="{{ route('users.delete', ['id' => $user->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!--Phân Trang-->
            <div class="pagination">
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .user-list {
            padding: 20px;
            margin: 0 80px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr th {
            background-color: #f2f2f2;
            text-align: center;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: white;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #000;
            padding: 5px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 5px;
        }

        .pagination a.active {
            background-color: #ddd;
        }

        .pagination svg {
            height: 15px;
            width: 30px;
        }
    </style>

@endsection
