<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 400px;">
            <h1 class="text-center text-success mb-4">Đăng ký tài khoản</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Nhập tên đăng nhập">
                    @if ($errors->has('name'))
                    <span class="error-message" style="color: red; font-size: 12px; margin-top: 5px;font-style:italic;">*{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Nhập email">
                    @if ($errors->has('email'))
                    <span class="error-message" style="color: red; font-size: 12px; margin-top: 5px;font-style:italic;">*{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                    @if ($errors->has('password'))
                    <span class="error-message" style="color: red; font-size: 12px; margin-top: 5px; font-style:italic;">*{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn btn-success ">Đăng ký</button>
                    <a href="{{route('login')}}" class="btn btn-secondary ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>