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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Cập nhật xe</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('car.process_update', ['ma' => $car->ma]) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name='ten_xe' class="form-control input-default" placeholder="Tên xe"
                                        value="{{ $car->ten_xe }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="gia_thue_xe" class="form-control input-default"
                                        placeholder="Giá thuê xe" value="{{ $car->gia_thue_xe }}">
                                </div>
                                <div class="form-group">
                                    <select class="form-control default-select" name="ma_hang_xe">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->ma }}"
                                                {{ $brand->ma == $car->ma_hang_xe ? 'selected' : '' }}>
                                                {{ $brand->ten_hang_xe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="so_luong" class="form-control input-default" min="1"
                                        max="100" placeholder="Số lượng" value="{{ $car->so_luong }}">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="so_cho_ngoi" class="form-control input-default" min="1"
                                        max="100" placeholder="Số chỗ ngồi" value="{{ $car->so_cho_ngoi }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tien_phat" class="form-control input-default"
                                        placeholder="Tiền phạt" value="{{ $car->tien_phat }}">
                                </div>
                                <div class="form-group">
                                    @if ($car->so_luong_da_thue != 0)
                                        <select class="form-control default-select" name="tinh_trang">
                                            <option value="1" {{ $car->tinh_trang == 1 ? 'selected' : '' }}>Xe đang được
                                                thuê</option>
                                            {{-- <option value="2" {{ $car->tinh_trang == 2 ? 'selected' : '' }}>Đang bảo dưỡng
                                            </option> --}}
                                        </select>
                                    @else
                                        <select class="form-control default-select" name="tinh_trang">
                                            <option value="1" {{ $car->tinh_trang == 1 ? 'selected' : '' }}>Xe đang được
                                                thuê</option>
                                            <option value="2" {{ $car->tinh_trang == 2 ? 'selected' : '' }}>Bảo dưỡng xe
                                            </option>
                                        </select>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea name="mo_ta" class="form-control" rows="4" id="comment"
                                        placeholder="Nhập nội dung...">{{ $car->mo_ta }}</textarea>
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
                                <div class="input-group mb-3">
                                    <img src="{{ asset('public/uploads/car/' . $car->anh_xe) }}" width="150px">
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
        </div>
    </div>
@endsection
