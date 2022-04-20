@extends('admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">

            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                            <i class="flaticon-141-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Thêm người dùng
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.process_insert') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ho tên</label>
                                        <input type="text" name="ten" class="form-control" placeholder="Nhập họ & tên...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Cấp độ</label>
                                        <select class="form-control default-select" name="cap_do">
                                            <option value="" disabled selected>Chọn cấp độ?</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Supper Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-bottom: 30px">
                                        <label>Avatar</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input">
                                            <label class="custom-file-label">Chọn tệp tin</label>
                                        </div>
                                    </div>

                                </div>
                                
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
