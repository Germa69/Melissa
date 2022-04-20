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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Cập nhật hãng xe</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('brand.process_update', ['ma' => $brand->ma]) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name='ten_hang_xe' class="form-control input-default"
                                        placeholder="Tên hãng xe" value="{{ $brand->ten_hang_xe }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tải lên</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input">
                                        <label class="custom-file-label">Chọn tệp tin</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form" style="display: block; text-align: center">
                            <img src="{{ asset('public/uploads/brand/' . $brand->logo) }}" width="150px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
