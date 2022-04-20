@extends('layout')
@push('css')
    <style>
        .breadcrumbs {
            position: relative;
            width: 100%;
            float: left;
            margin: 20px 0;
        }

        .breadcrumbs>ul>li {
            position: relative;
            float: left;
            transform: skewX(-15deg);
            background-color: #fff;
            box-shadow: -2px 0px 20px -6px rgba(0, 0, 0, 0.5);
            z-index: 1;
            width: 120px;
            margin-left: -50px;
            transition: all 0.5s;
            list-style: none;
        }

        .breadcrumbs>ul>li>a {
            display: block;
            padding: 5px;
            font-size: 16px;
            transform: skewX(15deg);
            text-decoration: none;
            color: #444;
            font-weight: 300;
            text-align: center;
        }

        .breadcrumbs>ul>li:first-child {
            margin-left: 0px;
        }

        .breadcrumbs>ul>li:hover {
            background-color: #CFD8DC;
        }

        .breadcrumbs>ul>li:last-child {
            background-color: #78909C;
        }

        .breadcrumbs>ul>li:last-child>a {
            color: #fff;
            ;
        }

        .breadcrumbs>ul:hover>li {
            margin-left: 0px;
        }

        .profile {
            margin: 45px 0;
        }

        .emp-profile {
            margin: 0 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

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
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 12%;
            padding: 10px;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .profile-edit-btn:hover {
            background-color: gainsboro;
            color: teal;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

    </style>
@endpush

@section('content')
    <div class="container">

        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('home_page') }}">
                        <i class="fa fa-home"></i>
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a>
                        <i class="fa fa-user"></i>
                        Hồ sơ
                    </a>
                </li>
            </ul>
        </div>

        <div class="row profile">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu">
                    <li>
                        <div class="profile-img">
                            <img src="{{ asset('public/uploads/customer/' . $profile->anh_khach_hang) }}" alt="" />

                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file" id="file" data-customer_id={{ $profile->ma }}/>
                            </div>
                        </div>
                    </li>
                    <li class="active">
                        <a href="" data-target-id="profile">
                            <i class="fa fa-user"></i>
                            Hồ sơ
                        </a>
                    </li>
                    <li>
                        <a href="" data-target-id="change-password">
                            <i class="fa fa-key"></i>
                            Đổi mật khẩu
                        </a>
                    </li>
                    <li>
                        <a href="" data-target-id="logout">
                            <i class="fa fa-sign-out"></i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 admin-content" id="profile">
                <div class="emp-profile">
                    <div class="row">
                        <div class="col-md-12" style="position: relative;">
                            <div class="profile-head">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Thông tin</a></li>
                                    <li><a data-toggle="tab" href="#updatedInfo">Cập nhật thông tin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tên người dùng</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profile->ten }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Địa chỉ</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profile->dia_chi }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Số điện thoại</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profile->sdt }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profile->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Số CMND</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profile->so_CMND }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="updatedInfo" class="tab-pane fade">
                                    <form action="{{ route('customer.profile_update', ['ma' => $profile->ma]) }}"
                                        method="post">
                                        {{ csrf_field() }}
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-6">
                                                <label for="ten">Tên người dùng</label>
                                                <input type="text" name="ten" class="form-control"
                                                    value="{{ $profile->ten }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sdt">Số điện thoại</label>
                                                <input type="text" name="sdt" class="form-control"
                                                    value={{ $profile->sdt }}>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-6">
                                                <label for="dia_chi">Địa chỉ</label>
                                                <input type="text" name="dia_chi" class="form-control"
                                                    value="{{ $profile->dia_chi }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $profile->email }}">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-12">
                                                <label for="so_CMND">Số CMND</label>
                                                <input type="text" name="so_CMND" class="form-control"
                                                    value="{{ $profile->so_CMND }}">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-12" style="display: flex; justify-content: center;">
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-9  admin-content" id="change-password">
                <form action="{{ route('customer.password_update', ['ma' => $profile->ma]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="panel panel-info" style="margin: 1em;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <label for="mat_khau" class="control-label panel-title">Mật
                                        khẩu mới</label>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <i class="fa fa-key" style="font-size: 20px; line-height: 34px"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="mat_khau" id="password">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-info" style="margin: 1em;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><label for="nhap_lai_mat_khau"
                                        class="control-label panel-title">Nhập lại mật khẩu</label></h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <i class="fa fa-key" style="font-size: 20px; line-height: 34px"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="nhap_lai_mat_khau"
                                            id="confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-info" style="margin: 1em; display: flex; justify-content: center;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="pull-left">
                                        <input type="submit" class="form-control btn btn-primary" id="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-md-9  admin-content" id="logout">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Confirm Logout</h3>
                    </div>
                    <div class="panel-body">
                        Bạn có thực sự muốn đăng xuất? <br>
                        <a href="" class="label label-danger" style="margin-right: 5px"
                            onclick="event.preventDefault();                                                                                                                                                   document.getElementById('logout-form').submit();">
                            <span class="label label-success">Yes</span>
                        </a>
                        <a href="{{ route('customer.profile', ['ma' => $profile->ma]) }}"
                            class="label label-success"><span class="label label-danger">No</span></a>
                    </div>
                    <form id="logout-form" action="{{ route('customer.logout') }}" method="GET" style="display: none;">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var navItems = $('.admin-menu li > a');
            var navListItems = $('.admin-menu li');
            var allWells = $('.admin-content');
            var allWellsExceptFirst = $('.admin-content:not(:first)');
            allWellsExceptFirst.hide();
            navItems.click(function(e) {
                e.preventDefault();
                navListItems.removeClass('active');
                $(this).closest('li').addClass('active');
                allWells.hide();
                var target = $(this).attr('data-target-id');
                $('#' + target).show();
            });
        });

        $(document).ready(function() {
            $('#password, #confirm_password').on('keyup', function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#confirm_password').css('border', '1px solid green');
                } else
                    $('#confirm_password').css('border', '1px solid red');
            });
        });
    </script>

    <script>
        $(document).on('change', '#file', function() {
            var customerId = $(this).data('customer_id');
            var property = document.getElementById('file').files[0];
            var image_name = property.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg', '']) == -1) {
                alert("Tệp hình ảnh không hợp lệ");
            }
            var image_size = property.size;
            if (image_size > 2000000) {
                alert("Tệp hình ảnh quá lớn")
            } else {
                var form_data = new FormData();
                form_data.append("file", property);
                form_data.append("ma", customerId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('customer.image_update') }}",
                    method: 'POST',
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(data) {
                        location.reload();
                    }
                })
            }
        });
    </script>
@endpush
