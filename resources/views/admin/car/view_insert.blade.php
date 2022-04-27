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
                        Thêm xe
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('car.process_insert') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name='ten_xe' class="form-control input-default"
                                        placeholder="Tên xe">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="gia_thue_xe" class="form-control input-default"
                                        placeholder="Giá thuê xe">
                                </div>
                                <div class="form-group">
                                    <select class="form-control default-select" name="ma_hang_xe">
                                        <option value="" disabled selected>Thương hiệu xe</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->ma }}">
                                                {{ $brand->ten_hang_xe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="so_luong" class="form-control input-default" min="1"
                                        placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="so_cho_ngoi" class="form-control input-default" min="1"
                                        max="100" placeholder="Số chỗ ngồi">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tien_phat" class="form-control input-default"
                                        placeholder="Tiền phạt">
                                </div>
                                <div class="form-group">
                                    <textarea name="mo_ta" class="form-control" rows="4" id="comment" placeholder="Nhập nội dung..."></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
