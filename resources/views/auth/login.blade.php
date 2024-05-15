<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<main class="login-form mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="border: 2px solid black;">
          <h3 class="card-header bg-dark text-center text-light">LOGIN</h3>
          <div class="card-body">
            <div class="container">
              <!-- Display any errors -->
              @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong><br>
                  @endforeach
                </div>
              @endif
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              <form action="{{ route('user.checkUser') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

</body>
</html>
