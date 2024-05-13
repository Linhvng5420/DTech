@extends('dashboard')

@section('content')

    <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Teach</title>

    <style>
        .container {
            display: grid;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            display: grid;
            width: 800px;
            height: 500px;
            padding: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.19), 0px 6px 6px rgba(0, 0, 0, 0.23);
            border-radius: 10px;
            background-color: #f0f0f0;
            color: #333;
            align-items: center;
        }

        .card h1 {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>D-Teach</h1>
        </div>
    </div>
</body>
</html>

@endsection
