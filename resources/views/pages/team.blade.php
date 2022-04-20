@extends('layout')
@section('content')
    <section>
        <div class="container">
            <div class="text-center">
                <h1>Team</h1>

                <br>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
            </div>
        </div>
    </section>

    <section id="team" class="section-background">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="{{ asset('public/frontend/images/coang.jpg') }}" class="img-responsive" alt="" width="646px"
                                height="680px">
                        </div>
                        <div class="team-info">
                            <h3>Coang Nguỹn</h3>
                            <span>Tổng giám đốc công ty TNHH HTTC</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="{{ asset('public/frontend/images/ton.jpg') }}" class="img-responsive" alt="" width="646px"
                                height="680px">
                        </div>
                        <div class="team-info">
                            <h3>Tôn Ngộ Không</h3>
                            <span>Con khỉ duy nhất của công ty chúng tôi</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-google"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="{{ asset('public/frontend/images/hieu.jpg') }}" class="img-responsive" alt="" width="646px"
                                height="680px">
                        </div>
                        <div class="team-info">
                            <h3>Hiếu Weed</h3>
                            <span>Đội nhà Stoner</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="{{ asset('public/frontend/images/fuckboiz.jpg') }}" class="img-responsive" alt="" width="646px"
                                height="680px">
                        </div>
                        <div class="team-info">
                            <h3>Lê Công Minh</h3>
                            <span>Đội nhà fuckboiz</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
