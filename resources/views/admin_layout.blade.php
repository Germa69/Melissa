<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Hệ thống quản lý cho thuê xe">
    <meta property="og:title" content="Hệ thống quản lý cho thuê xe">
    <meta property="og:description" content="Hệ thống quản lý cho thuê xe">
    <meta property="og:image" content="{{ asset('public/common/icon/icons.png') }}">
    <meta name="format-detection" content="telephone=no">
    <title>Hệ thống quản lý cho thuê xe</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('public/common/icon/icons.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('public/backend/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('public/backend/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('public/backend/css/toastr/toastr.min.css') !!}">

    <script src="{{ asset('public/backend/js/toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/toastr/toastr.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/sweetalert2/sweetalert2.css') }}">

    @stack('css')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="force-overflow"></div>
        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.theme.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.theme.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            {!! Toastr::message() !!}

            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.theme.footer')
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!-- Required vendors -->
    <script src="{{ asset('public/backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('public/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('public/backend/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('public/backend/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('public/backend/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('public/backend/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('public/backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/deznav-init.js') }}"></script>
    <script src="{{ asset('public/backend/js/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('public/backend/js/custom-pro.js')}}"></script> --}}


    @stack('scripts')
</body>

</html>
