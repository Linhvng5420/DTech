@extends('dashboard')

@section('content')
    <main>
        <div class="container">
            <h1>Thông tin người dùng</h1>

            <div style="text-align: center;">
                @if($user->profile_image)
                    <img src="{{ asset('uploads/avatar/' . $user->profile_image) }}"
                         alt="{{ $user->username }}"
                         class="profile-image"
                         style="max-height: 200px; object-fit: contain; border-radius: 50%;">
                @else
                    <i class="fas fa-user-circle fa-10x"></i>
                @endif
            </div>

            <form>
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <p>{{ $user->username }}</p>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <p>{{ $user->email }}</p>
                </div>
            </form>

            <a href="{{ route('users.updateForm', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Chỉnh sửa</a>
        </div>
    </main>

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            height: auto;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            margin-top: -10px;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        p {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>

@endsection
