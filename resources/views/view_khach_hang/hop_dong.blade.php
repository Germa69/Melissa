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

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
@include('view_khach_hang.menu')
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
<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                {{Session::get('ma_khach_hang')}}
                <table>
                    <thead>
                    <tr class="row100 head">

                        <th>Ngày thuê</th>
                        <th>Ngày trả</th>

                        <th>Mã xe</th>
                        <th>Giá thuê xe</th>
                        <th>Tiền phạt</th>
                        <th>Tình trạng</th>
                        <th>Ngày trả thực tế</th>
                    </tr>
                    </thead>





                    <tbody>


                        <tr class="row100 body">
                            <td>{{Session::get('ngay_thue')}}</td>

                            <td>{{Session::get('ngay_tra')}}</td>
                            <td>{{Session::get('ma_xe')}}</td>
                            <td>{{Session::get('gia_thue_xe')}}</td>
                            <td>{{Session::get('tien_phat')}}</td>
                            <td>{{Session::get('tinh_trang')}}</td>


                        </tr>



                    </tbody>
                </table>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="contact-image">
                    <img src="{{asset('user/images/contact-1-600x400.jpg')}}" class="img-responsive" alt="">
                </div>
            </div>

        </div>
    </div>
</section>


@include('view_khach_hang.footer_kh')


<!-- SCRIPTS -->
<script src="{{asset('user/js/jquery.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/smoothscroll.js')}}"></script>
<script src="{{asset('user/js/custom.js')}}"></script>

</body>
</html>