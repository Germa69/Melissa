<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/login/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('public/backend/css/toastr/toastr.min.css') !!}">
    
    <script src="{{ asset('public/backend/js/toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/toastr/toastr.min.js') }}"></script>
</head>

<body>
    <div class="overlay">
        {!! Toastr::message() !!}
        <form action="{{ route('customer.process_login') }}" method="POST">
            {{ csrf_field() }}
            <a href="{{ route('home_page') }}" class="link">
                <i class="fa fa-home" style="color: darkslategrey"></i>
            </a>
            <div class="con">
                <header class="head-form">
                    <h2>Đăng nhập</h2>
                    <p style="margin-top: 5px">Đăng nhập ở đây bằng email và mật khẩu của bạn</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input class="form-input" name="email" id="txt-input" type="text" placeholder="Email" required>
                    <br>

                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" type="password" placeholder="Mật khẩu" id="pwd" name="mat_khau"
                        required>

                    <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                    </span>

                    <br>

                    <button type="submit" class="log-in"> Đăng nhập </button>
                </div>

                <div class="other">
                    <button class="btn submits frgt-pass">Quên mật khẩu?</button>
                    <button class="btn submits sign-up" onclick="redirectRegister()">Đăng ký
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('public/frontend/login/js/main.js') }}"></script>
</body>

<script>
    function redirectRegister() {
        window.location.href = "{{ route('customer.register') }}";
    }
</script>

</html>
