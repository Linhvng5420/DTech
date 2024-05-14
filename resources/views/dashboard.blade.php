<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: center;
      padding: 5px 0;
      margin: 0 5%;
      border: 1px solid black;
    }

    .navbar a {
      color: black;
      text-decoration: none;
      padding: 10px 20px;
      font-weight: bold;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
      border-radius: 5px;
    }

    footer {
      display: grid;
      margin: 1% 5%;
      padding: 1%;
      border: 1px solid black;
      justify-items: center;
    }

    .content-yield {
        display: grid;
        justify-content: center;
    }
  </style>
</head>

<body>

  <nav class="navbar">
    <a href="{{route('login')}}">Đăng Nhập</a>
    <a href="#">Đăng Ký</a>
  </nav>

  <div class="content-yield">
    @yield('content')
    @yield('content_update')
  </div>

  <footer><strong>Team D</strong></footer>
</body>
</html>
