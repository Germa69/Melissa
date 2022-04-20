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
                        Cập nhật người dùng
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.process_update', ['ma' => $user->ma]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        
                                        <legend>Tên: {{ $user->ten }}</legend>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Cấp độ</label>
                                        <select class="form-control default-select" name="cap_do">
                                            <option value="0" {{ $user->cap_do == 0 ? 'selected' : '' }}>Admin</option>
                                            <option value="1" {{ $user->cap_do == 1 ? 'selected' : '' }}>Supper Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tình trạng</label>
                                        <select class="form-control default-select" name="tinh_trang">
                                            <option value="0" {{ $user->tinh_trang == 0 ? 'selected' : '' }}>Khóa</option>
                                            <option value="1" {{ $user->tinh_trang == 1 ? 'selected' : '' }}>Đang hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
@endsection
