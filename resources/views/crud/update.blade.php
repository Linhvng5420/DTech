@extends('dashboard')

@section('content')
    <section class="update-form">
        <div class="card-update">
            <div class="card-title">
                <h2 style="color: #0069d9;">Thay Đổi Thông Tin User</h2>
            </div>
            <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}" class="card-body" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" value="{{ $user->username }}" required autofocus>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="input-group">
                    <label for="newpassword1">New Password</label>
                    <input type="password" id="newpassword1" name="newpassword1">
                </div>

                <div class="input-group">
                    <label for="newpassword2">New Password Again</label>
                    <input type="password" id="newpassword2" name="newpassword2">
                </div>

                <div class="input-group">
                    <label for="image">Avatar Image</label>
                    <input type="file" id="image" name="image" onchange="previewImage(event)">
                    @if($user->profile_image)
                        <img src="{{ asset('uploads/avatar/' . $user->profile_image) }}" alt="{{ $user->username }}" class="profile-image" style="max-height: 100px; object-fit: contain; border-radius: 50%; margin-top: 10px; border: black double 5px;">
                    @else
                        <i class="fas fa-user-circle fa-10x"></i>
                    @endif
                    <div class="image-preview">
                        <img id="preview" style="max-width: 100px; margin-top: 10px; margin-left: 100px; border: #5cb85c double 5px;">
                    </div>
                </div>

                <button type="submit" class="btn-update">Cập Nhật</button>
            </form>
        </div>
    </section>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <style>
        .update-form {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .card-update {
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
        .input-group input[type="password"],
        .input-group input[type="email"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .login {
            display: grid;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            color: blue;
            text-decoration: none;
        }

        .btn-update {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            font-size: x-large;
        }
    </style>
@endsection
