<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book Shop</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/style-2.css') }}">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <main class="login-bg">

        <div class="login-form-area">
            <div class="login-form">

                <div class="login-heading">
                    <span>Đăng nhập</span>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <div class="single-input-fields">
                            <label>Địa chỉ email</label>
                            <input type="text" name="email" placeholder="Địa chỉ email">
                        </div>
                        <div class="single-input-fields">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="single-input-fields login-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1" name="remember_token">Ghi nhớ đăng nhập</label>
                            <a href="#" class="f-right">Quên mật khẩu?</a>
                        </div>
                    </div>
                    @include('templates.error')
                    <div class="login-footer">
                        <p>Chưa có tài khoản? <a href="register">Đăng kí</a> ở đây</p>
                        <button class="submit-btn3" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>

    </main>



</body>


</html>
