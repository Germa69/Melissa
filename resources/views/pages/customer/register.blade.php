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
    <style>
        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 100%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #fff;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

    </style>
</head>

<body>
    <div class="overlay">
        {!! Toastr::message() !!}
        <form action="{{ route('customer.process_register') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <a href="{{ route('home_page') }}" class="link">
                <i class="fa fa-home" style="color: darkslategrey"></i>
            </a>
            <div class="con">
                <header class="head-form">
                    <h2>Đăng ký</h2>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input class="form-input" name="ten" id="txt-input" type="text" placeholder="Nhập tên..."
                        required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input class="form-input" name="email" id="txt-input" type="text" placeholder="Nhập email..."
                        required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-map"></i>
                    </span>
                    <input class="form-input" name="dia_chi" id="txt-input" type="text"
                        placeholder="Nhập địa chỉ..." required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-phone" style="font-size: 20px"></i>
                    </span>
                    <input class="form-input" name="sdt" id="txt-input" type="text"
                        placeholder="Nhập số điện thoại..." required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-address-card"></i>
                    </span>
                    <input class="form-input" name="so_CMND" id="txt-input" type="text"
                        placeholder="Nhập số CMND..." required>
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

                    <div class="profile-img">
                        <div class="file btn btn-lg btn-primary">
                            <i class="fa fa-upload"></i>
                            <input type="file" name="file" /> Chọn tệp tin
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="log-in"> Đăng ký </button>
                </div>

                <div class="other">
                    <button class="btn sign-up" onclick="redirectLogin()">Đăng nhập
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('public/frontend/login/js/main.js') }}"></script>
</body>

<script>
    function redirectLogin() {
        window.location.href = "{{ route('customer.login') }}";
    }
</script>

</html>
