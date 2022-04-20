<!DOCTYPE html>
<html lang="en">
<head>

    <title>Rental Website</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">

    <!--=== Bootstrap CSS ===-->
    <link href="{{asset('car-detail/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{asset('car-detail/css/plugins/slicknav.min.css')}}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{asset('car-detail/css/plugins/magnific-popup.css')}}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{asset('car-detail/css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{asset('car-detail/css/plugins/gijgo.css')}}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{asset('car-detail/css/font-awesome.css')}}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{asset('car-detail/css/reset.css')}}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{asset('car-detail/style.css')}}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{asset('car-detail/css/responsive.css')}}" rel="stylesheet">


    <!--[if lt IE 9]>
{{--    <script src="{{asset('car-detail//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>--}}
{{--    <script src="{{asset('car-detail//oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>--}}
{{--    <![endif]-->--}}
    <!--=== Favicon ===-->
{{--    <link rel="shortcut icon" href="{{asset('car-detail/favicon.ico')}}" type="image/x-icon" />--}}

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
@include('view_khach_hang.menu')
<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->

<section>
    <div class="container">
        <div class="text-center">
            <h1>Contact Us</h1>

            <br>

            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
        </div>
    </div>
</section>


<!-- CONTACT -->
<section id="car-list-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Car List Content Start -->
            <div class="col-lg-8">

                <div class="car-details-content">
                    <h2><span class="price">Rent: <b>$150</b></span></h2>
                    <div class="car-preview-crousel">
                        <div class="single-car-preview">
                            <img src="{{asset('car-detail/img/car/car-5.jpg')}}" alt="JSOFT">

                        </div>
                    </div>
                    <div class="car-details-info">
                        <h4>Additional Info</h4>
                        <p>The Aventador LPER 720-4 50° ise a limited (200 units – 100 Coupe and 100 Roadster) versione of thed Aventadored LP 700-4 commemorating the 50th anniversary of Lamborghini. It included ised increased engine power to 720 PS (530 kW; 710 bhp) via a new specific engine calibration, enlarged and extended front air intakes and the aerodynamic splitter.</p>

                        <div class="technical-info">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="tech-info-table">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Class</th>
                                                <td>Compact</td>
                                            </tr>
                                            <tr>
                                                <th>Fuel</th>
                                                <td>Petrol</td>
                                            </tr>
                                            <tr>
                                                <th>Doors</th>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <th>GearBox</th>
                                                <td>Automatic</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="tech-info-list">
                                        <ul>
                                            <li>ABS</li>
                                            <li>Air Bags</li>
                                            <li>Bluetooth</li>
                                            <li>Car Kit</li>
                                            <li>GPS</li>
                                            <li>Music</li>
                                            <li>Bluetooth</li>
                                            <li>ABS</li>
                                            <li>GPS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- Car List Content End -->

            <!-- Sidebar Area Start -->
            <div class="col-lg-4">
                <div class="sidebar-content-wrap m-t-50">
                    <!-- Single Sidebar Start -->
                    <div class="single-sidebar">
                        <h3>For More Informations</h3>

                        <div class="sidebar-body">
                            <p><i class="fa fa-mobile"></i> +8801816 277 243</p>
                            <p><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</p>
                        </div>
                    </div>
                    <!-- Single Sidebar End -->

                    <!-- Single Sidebar Start -->

                    <!-- Single Sidebar End -->

                    <!-- Single Sidebar Start -->
                    <div class="single-sidebar">
                        <h3>Connect with Us</h3>

                        <div class="sidebar-body">
                            <div class="social-icons text-center">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Sidebar End -->
                </div>
            </div>
            <!-- Sidebar Area End -->
        </div>
    </div>
</section>


@include('view_khach_hang.footer_kh')

{{--<!--=======================Javascript============================-->--}}
{{--<!--=== Jquery Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/jquery-3.2.1.min.js')}}"></script>--}}
{{--<!--=== Jquery Migrate Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/jquery-migrate.min.js')}}"></script>--}}
{{--<!--=== Popper Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/popper.min.js')}}"></script>--}}
{{--<!--=== Bootstrap Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/bootstrap.min.js')}}"></script>--}}
{{--<!--=== Gijgo Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/gijgo.js')}}"></script>--}}
{{--<!--=== Vegas Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/vegas.min.js')}}"></script>--}}
{{--<!--=== Isotope Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/isotope.min.js')}}"></script>--}}
{{--<!--=== Owl Caousel Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/owl.carousel.min.js')}}"></script>--}}
{{--<!--=== Waypoint Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/waypoints.min.js')}}"></script>--}}
{{--<!--=== CounTotop Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/counterup.min.js')}}"></script>--}}
{{--<!--=== YtPlayer Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/mb.YTPlayer.js')}}"></script>--}}
{{--<!--=== Magnific Popup Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/magnific-popup.min.js')}}"></script>--}}
{{--<!--=== Slicknav Min Js ===-->--}}
{{--<script src="{{asset('car-detail/js/plugins/slicknav.min.js')}}"></script>--}}

{{--<!--=== Mian Js ===-->--}}
{{--<script src="{{asset('car-detail/js/main.js')}}"></script>--}}
<!-- SCRIPTS -->
<script src="{{asset('user/js/jquery.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/smoothscroll.js')}}"></script>
<script src="{{asset('user/js/custom.js')}}"></script>

</body>
</html>