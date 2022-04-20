<!DOCTYPE html>
<html lang="en">

<head>

    <title>Car Rental Website</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('public/common/icon/icons.png') }}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{!! asset('public/backend/css/toastr/toastr.min.css') !!}">
    
    <script src="{{ asset('public/backend/js/toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/toastr/toastr.min.js') }}"></script>

    <!-- TOKEN -->
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">

    @stack('css')
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    <!-- MENU -->
    @include('pages.header')

    <!-- HOME -->
    <div id="wrapper">
        {!! Toastr::message() !!}
        
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('pages.footer')

    <!-- SCRIPTS -->
    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
