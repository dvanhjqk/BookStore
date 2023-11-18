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
  
</head>

<body>
    <main class="login-bg">
        <div class="register-form-area">
            <div class="register-form text-center">
                <div class="register-heading">
                    <span>Đăng kí</span>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <div class="single-input-fields">
                            <label>Họ và tên</label>
                            <input type="text" name="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="single-input-fields">
                            <label>Địa chỉ email</label>
                            <input type="email" name="email" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="single-input-fields">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="single-input-fields">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="single-input-fields">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khấu">
                        </div>
                  <input type="hidden" name="role" value="0">
                    </div>
                    @include('templates.error')
                    <div class="register-footer">
                        <p>Bạn đã có tài khoản? <a href="login">Đăng nhập</a> ở đây</p>
                        <button class="submit-btn3" type="submit">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>

    </main>


</body>



</html>
