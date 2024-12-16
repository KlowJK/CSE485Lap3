<?php
session_start(); // Khởi động phiên làm việc
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 400px;">
            <h1 class="text-center text-success mb-4">Đăng nhập</h1>
            @if (session('success'))
            <div class="container">
                <div class="alert alert-success  alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                </div>
            </div>
            @endif
            @if (session('error'))
            <div class="container">
                <div class="alert alert-danger  alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                </div>
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Nhập tên đăng nhập">
                    @if ($errors->has('name'))
                    <span class="error-message" style="color: red; font-size: 12px; margin-top: 5px;font-style:italic;">*{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                    @if ($errors->has('password'))
                    <span class="error-message" style="color: red; font-size: 12px; margin-top: 5px; font-style:italic;">*{{$errors->first('password')}}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
                <div class="text-center mt-3">
                    <!-- <a href="" class="text-center mt-2">Quên mật khẩu</a> -->
                    <div class="text-center mt-2">
                        Bạn chưa có tài khoản?
                        <a href="{{route('register')}}">Đăng ký </a>
                    </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>