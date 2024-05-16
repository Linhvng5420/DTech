@extends('dashboard')

@section('content')

    <section class="login-form">
        <div class="card-login">
            <div class="card-title">
                <h1 style="font-size: 35px; font-weight: bold; color: green;">Màn Hình Đăng Nhập</h1>
            </div>

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.authUser') }}" class="card-body">
                @csrf
                <div class="input-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" required autofocus>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn-login">Đăng nhập</button>
                </div>
            </form>
        </div>
    </section>


    <style>
        .login-form {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .card-login {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 50px;
        }

        .card-title h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            margin-right: 15px;
            flex-direction: row-reverse;
        }

        .remember-forgot .checkbox-label {
            display: flex;
            align-items: center;
        }

        .remember-forgot .checkbox-label input[type="checkbox"] {
            margin-right: 5px;
        }

        .remember-forgot .forgot-password {
            color: blue;
            text-decoration: none;
        }

        .btn-login {
            width: 60%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            font-size: large;
        }
    </style>
@endsection
