@extends('layout')
@section('content')
    <section>
        <div class="container">
            <div class="text-center">
                <h1>Bài viết</h1>

                <br>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
            </div>
        </div>
    </section>

    <section class="section-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 pull-right col-xs-12">
                    <div class="form">
                        <form action="#">
                            <div class="form-group">
                                <label class="control-label">Blog Search</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>

                    <label class="control-label">Lorem ipsum dolor sit amet</label>

                    <ul class="list">
                        <li><a href="{{ route('pages.blog_detail') }}">Lorem ipsum dolor sit amet,
                                consectetur adipisicing.</a></li>
                        <li><a href="{{ route('pages.blog_detail') }}">Et animi voluptatem, assumenda enim,
                                consectetur quaerat!</a></li>
                        <li><a href="{{ route('pages.blog_detail') }}">Ducimus magni eveniet sit doloremque
                                molestiae alias mollitia vitae.</a></li>
                    </ul>
                </div>

                <div class="col-lg-9 col-xs-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-1-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>
                                    <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                    </div>
                                </div>

                                <div class="courses-detail">
                                    <h3><a href="{{ route('pages.blog_detail') }}">Lorem ipsum dolor sit
                                            amet, consectetur adipisicing elit.</a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="{{ route('pages.blog_detail') }}"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-2-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>
                                    <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                    </div>
                                </div>

                                <div class="courses-detail">
                                    <h3><a href="{{ route('pages.blog_detail') }}">Tempora molestiae, iste,
                                            consequatur unde sint praesentium!</a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="{{ route('pages.blog_detail') }}"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-3-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>
                                    <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                    </div>
                                </div>

                                <div class="courses-detail">
                                    <h3><a href="{{ route('pages.blog_detail') }}">A voluptas ratione,
                                            error provident distinctio, eaque id officia?</a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="{{ route('pages.blog_detail') }}"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-4-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>

                                </div>

                                <div class="courses-detail">
                                    <h3><a
                                            href="{https://www.24h.com.vn/o-to/ra-mat-nissan-gt-r-2021-gia-cao-hon-ca-xe-porsche-c747a1178957.html">Ra
                                            mắt Nissan GT-R 2021, giá cao hơn cả xe Porsche</a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="https://www.24h.com.vn/o-to/ra-mat-nissan-gt-r-2021-gia-cao-hon-ca-xe-porsche-c747a1178957.html"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-5-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>

                                </div>

                                <div class="courses-detail">
                                    <h3><a
                                            href="https://oto.com.vn/xe-moi/rolls-royce-ghost-2021-danh-cho-dai-gia-he-lo-cabin-ngan-sao-articleid-29yed3o">Rolls-Royce
                                            Ghost 2021 thế hệ mới dành cho giới đại gia hé lộ cabin 'ngàn sao'
                                        </a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="https://oto.com.vn/xe-moi/rolls-royce-ghost-2021-danh-cho-dai-gia-he-lo-cabin-ngan-sao-articleid-29yed3o"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{ asset('public/frontend/images/blog-6-720x480.jpg') }}"
                                            class="img-responsive" alt="">
                                    </div>

                                </div>

                                <div class="courses-detail">
                                    <h3><a
                                            href="https://oto.com.vn/xe-moi/mercedes-benz-glb-200-amg-mo-ban-tai-viet-nam-articleid-9q6pzjw">Mercedes-Benz
                                            GLB 200 AMG giá 1,999 tỷ đồng mở bán tại Việt Nam</a></h3>
                                </div>

                                <div class="courses-info">
                                    <a href="https://oto.com.vn/xe-moi/mercedes-benz-glb-200-amg-mo-ban-tai-viet-nam-articleid-9q6pzjw"
                                        class="section-btn btn btn-primary btn-block">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
