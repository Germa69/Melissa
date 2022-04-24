<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập</title>
    <link rel="icon" href="{{ asset('public/common/icon/icons.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('public/backend/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css" integrity="sha512-/O0SXmd3R7+Q2CXC7uBau6Fucw4cTteiQZvSwg/XofEu/92w6zv5RBOdySvPOQwRsZB+SFVd/t9T5B/eg0X09g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{!! asset('public/backend/css/toastr/toastr.min.css') !!}">

    <script src="{{ asset('public/backend/js/toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/toastr/toastr.min.js') }}"></script>
</head>

<body id="particles-js"></body>
<div class="animated bounceInDown">

    {!! Toastr::message() !!}

    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form name="form1" class="box" action="{{ route('admin.process_login') }}" method="post" onsubmit="return checkStuff()">
            {{ csrf_field() }}
            <h4>Admin<span>Dashboard</span></h4>
            <h5>Sign in to your account.</h5>
            <input type="text" name="email" placeholder="Email" autocomplete="off">
            <i class="typcn typcn-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
            <label>
                <input type="checkbox">
                <span></span>
                <small class="rmb">Remember me</small>
            </label>
            <a href="#" class="forgetpass">Forget Password?</a>
            <input type="submit" value="Sign in" class="btn1">
        </form>
        {{-- <a href="#" class="dnthave">Don’t have an account? Sign up</a> --}}
    </div>
</div>

<script src="{{ asset('public/backend/js/login.js') }}"></script>
<script src="{{ asset('public/backend/js/validate.js') }}"></script>
<script src="{{ asset('public/backend/js/particles.js') }}"></script>
<script src="{{ asset('public/backend/js/particles-config.js') }}"></script>

</html>
