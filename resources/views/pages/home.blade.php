@extends('layout')
@section('content')
    <section id="home">
        <div class="row">
            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Bạn đang khó khăn với việc tìm kiếm các mẫu xe ?</h1>
                                <h3>Hãy tham khảo qua về trang web của chúng tôi.</h3>
                                <a href="{{ route('pages.fleet') }}"
                                    class="section-btn btn btn-default">Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Bạn đang chán chiếc xe cũ kĩ ở nhà của bạn ?</h1>
                                <h3>Chúng tôi chuyên cung cấp những chiếc xe mới mẻ và theo sát nhu cầu của thị trường.
                                </h3>
                                <a href="{{ route('pages.fleet') }}"
                                    class="section-btn btn btn-default">Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-third">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Bạn đang cần một chiếc xe sang trọng để ra mắt bạn bè và đối tác ?</h1>
                                <h3>Hãy liên hệ với chúng tôi. Chúng tôi đảm bảo sẽ không làm bạn thất vọng.</h3>
                                <a href="{{ route('pages.fleet') }}"
                                    class="section-btn btn btn-default">Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="text-center">
                            <h2>Giới thiệu</h2>

                            <br>

                            <p class="lead">Do nhu cầu thị trường hiện nay cần dịch vụ thuê xe. Chúng tôi cung
                                cấp cho khách hàng những mẫu xe hiện đại và phong cách, giá cả hợp lí và có thể đáp ứng
                                đủ mọi nhu cầu của khách hàng </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center">
                            <h2>Showroomm <small>Bên dưới là những mẫu xe có thể thuê đc </small></h2>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="{{ route('pages.team') }}-thumb">
                            <div class="{{ route('pages.team') }}-image">
                                <img src="{{ asset('public/frontend/images/Ford-Mustang-Shelby-GT500-1.jpg') }}"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="{{ route('pages.team') }}-info">
                                <h3>Các mẫu xe gia đình</h3>

                                <p class="lead"><small>Giá chỉ từ</small> <strong>$120</strong> <small>1
                                        ngày</small></p>

                                <span>Các mẫu xe này hợp lí với những chuyến đi du lịch hoặc những buổi đi chơi cùng với
                                    gia đình bạn </span>
                            </div>
                            {{-- <div class="{{route('pages.team')}}-thumb-actions"> --}}
                            {{-- <a href="{{route('pages.offers')}}" class="section-btn btn btn-primary btn-block">Xem thêm</a> --}}
                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="{{ route('pages.team') }}-thumb">
                            <div class="{{ route('pages.team') }}-image">
                                <img src="{{ asset('public/frontend/images/offer-2-720x480.jpg') }}" class="img-responsive"
                                    alt="">
                            </div>
                            <div class="{{ route('pages.team') }}-info">
                                <h3>Các mẫu xe sang trọng</h3>

                                <p class="lead"><small>Giá chỉ từ</small> <strong>$99</strong> <small>1
                                        ngày</small></p>

                                <span>Các mẫu xe này hợp lí với những buổi ra mắt hoặc đám cưới và những buổi tiệc sang
                                    trọng, để bạn có thể gây ấn tượng với đối tác hoặc những người bạn</span>
                            </div>
                            {{-- <div class="{{route('pages.team')}}-thumb-actions"> --}}
                            {{-- <a href="{{route('pages.offers')}} " class="section-btn btn btn-primary btn-block">Xem thêm</a> --}}
                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="{{ route('pages.team') }}-thumb">
                            <div class="{{ route('pages.team') }}-image">
                                <img src="{{ asset('public/frontend/images/offer-3-720x480.jpg') }}" class="img-responsive"
                                    alt="">
                            </div>
                            <div class="{{ route('pages.team') }}-info">
                                <h3>Các mẫu xe được ưa chuộng nhất</h3>

                                <p class="lead"><small>Giá chỉ từ</small> <strong>$110</strong> <small>1
                                        ngày</small></p>

                                <span>Đây là những mẫu xe được ưa chuộng bậc nhất trên thị trường, những mẫu xe này thật
                                    lí tưởng cho những dịp đi du lịch cùng người yêu hoặc chở những người bạn đi lượn
                                    trên phố Hếu</span>
                            </div>
                            {{-- <div class="{{route('pages.team')}}-thumb-actions">
                                <a href="{{route('pages.offers')}} " class="section-btn btn btn-primary btn-block">Xem thêm</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonial">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center">
                            <h2>Chúng tôi rất sẵn lòng đáp ứng mọi nhu cầu bạn đề ra <small>Cảm ơn </small></h2>
                        </div>

                        <div class="owl-carousel owl-theme owl-client">
                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="tst-image">
                                        <img src="{{ asset('public/frontend/images/ton.jpg') }}" class="img-responsive"
                                            alt="">
                                    </div>
                                    <div class="tst-author">
                                        <h4>Tonny</h4>
                                        <span>Software Developer</span>
                                    </div>
                                    <p>Tôi rất ngu</p>
                                    <div class="tst-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="tst-image">
                                        <img src="{{ asset('public/frontend/images/coang.jpg') }}" class="img-responsive"
                                            alt="">
                                    </div>
                                    <div class="tst-author">
                                        <h4>Coang</h4>
                                        <span>Marketing Manager</span>
                                    </div>
                                    <p>Tôi đã và đang sử dụng xe của showroom. Xe rất đẹp và hiện đại</p>
                                    <div class="tst-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="tst-image">
                                        <img src="{{ asset('public/frontend/images/hieu.jpg') }}" class="img-responsive"
                                            alt="">
                                    </div>
                                    <div class="tst-author">
                                        <h4>Hiếu Weed</h4>
                                        <span>Art Director</span>
                                    </div>
                                    <p>Dù có một chút thiếu sót trong khung sản phẩm nhưng không đáng kể.</p>
                                    <div class="tst-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="tst-image">
                                        <img src="{{ asset('public/frontend/images/tst-image-4-200x216.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>
                                    <div class="tst-author">
                                        <h4>Andrio</h4>
                                        <span>Web Developer</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore natus culpa
                                        laudantium sit dolores quidem at nulla, iure atque laborum! Odit tempora, enim
                                        aliquid at modi illum ducimus explicabo soluta.</p>
                                    <div class="tst-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <form id="contact-form" role="form" action="" method="post">
                        <div class="section-title">
                            <h2>Liên hệ với chúng tôi <small>Chúng tôi rất sẵn lòng giúp đỡ bạn với những thắc mắc về
                                    sản phẩm của chúng tôi</small></h2>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter full name" name="name" required>

                            <input type="email" class="form-control" placeholder="Enter email address" name="email"
                                required>

                            <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <input type="submit" class="form-control" name="send message" value="Send Message">
                        </div>

                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                        <img src="{{ asset('public/frontend/images/contact-1-600x400.jpg') }}" class="img-responsive"
                            alt="Smiling Two Girls">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
