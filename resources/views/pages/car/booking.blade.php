<div class="modal fade" id="modal-booking-{{ $car->ma }}">
    <div class="modal-dialog resize" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">
                    <img src="{{ asset('public/common/icon/icons.png') }}" width="35px">
                    Melissa - Đặt xe
                </h4>
            </div>

            <div class="modal-body">
                <form>
                    {{ csrf_field() }}
                    <div id="cart">
                        <input type="hidden" name="ma_xe" id="ma_xe_{{ $car->ma }}" value="{{ $car->ma }}">
                        <input type="hidden" name="ma_khach_hang" id="ma_khach_hang_{{ $car->ma }}"
                            value="{{ Session::get('ma_khach_hang') }}">
                        <input type="hidden" name="gia_thue_xe" id="gia_thue_xe_{{ $car->ma }}" value="{{ $car->gia_thue_xe }}">
                        <input type="hidden" name="tien_phat" id="tien_phat_{{ $car->ma }}" value="{{ $car->tien_phat }}">
                        <input type="hidden" name="tien_coc" id="tien_coc_{{ $car->ma }}" value="{{ $car->gia_thue_xe * 0.2 }}">

                        <div class="row">
                            <div class="col-md-6 mb-mobile mb-tablet">
                                <label>Ngày thuê xe</label>
                                <div class="resetDate">
                                    <div style="width: 100%;">
                                        <input type="text" class="form-control" name="ngay_thue"
                                            id="ngay_thue_{{ $car->ma }}" placeholder="Ngày thuê xe" data-input
                                            onchange="handleChangeThue({{ $car->ma }})">
                                        <span class="label label-danger" id="error1_{{ $car->ma }}"></span>
                                    </div>
                                    <button type="button" class="input-button btn btn-primary" style="height: 35px;"
                                        title="clear" data-clear>
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Ngày trả xe</label>
                                <div class="resetDate">
                                    <div style="width: 100%;">
                                        <input type="text" class="form-control" name="ngay_tra" id="ngay_tra_{{ $car->ma }}"
                                            placeholder="Ngày trả xe" data-input
                                            onchange="handleChangeTra({{ $car->ma }})"
                                            style="pointer-events: none">
                                        <span class="label label-danger" id="error2_{{ $car->ma }}"></span>
                                    </div>
                                    <button type="button" class="input-button btn btn-primary" style="height: 35px;"
                                        title="clear" data-clear>
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <article class="product">
                            <header>
                                <a class="remove">
                                    <img src="{{ asset('public/uploads/car/' . $car->anh_xe) }}" alt="">
                                    <h3>
                                        <i class="fa fa-expand"></i>
                                        Phóng to
                                    </h3>
                                </a>
                            </header>

                            <div class="wrapper">
                                <div class="content mobile">

                                    <h1>
                                        {{ $car->ten_xe }}
                                    </h1>

                                    <p>
                                        Tiền thuê:
                                        <i style="color: orangered;">
                                            {{ number_format($car->gia_thue_xe, 0, ',', '.') }} VNĐ / 1 ngày
                                        </i>
                                    </p>
                                    </i>
                                    <span>
                                        Tiền cọc:
                                        <i style="color: orangered;">
                                            {{ number_format($car->gia_thue_xe * 0.2, 0, ',', '.') }}
                                            VNĐ</i> (Lấy phụ thuộc vào 20% giá trị của xe) / 1 xe
                                    </span>

                                    <div title="You have selected this product to be shipped in the color yellow."
                                        class="color ghostwhite">
                                        <img src="{{ asset('public/uploads/brand/' . $car->brand->logo) }}" alt="">
                                    </div>
                                    <div class="type small">
                                        <i class="fa fa-user"></i> {{ $car->so_cho_ngoi }}
                                    </div>
                                </div>

                                <footer class="content">
                                    <div class="wrap-content">
                                        <span class="qt-minus" id="qt-minus_{{ $car->ma }}" onclick="handleClickMinus({{ $car->ma }})">-</span>
                                        <span class="qt qty" id="qty_{{ $car->ma }}" name="so_luong" name="so_luong"
                                            id="so_luong">1</span>
                                        <span class="qt-plus" id="qt-plus_{{ $car->ma }}" onclick="handleClickPlus({{ $car->ma }})">+</span>
                                    </div>

                                    <div class="wrap-content">
                                        <h2 class="price">
                                            Số ngày:
                                        </h2>
                                        <h2 class="full-price">
                                            <strong id="days_{{ $car->ma }}" style="color: #000">0</strong>
                                        </h2>
                                    </div>

                                </footer>
                            </div>
                        </article>

                        <div class="row">
                            <div class="col-md-6 mb-mobile mb-tablet">
                                <fieldset>
                                    <legend>Thông tin khách hàng</legend>
                                    <p>Tên khách hàng: {{ Session::get('ten_khach_hang') }}</p>
                                    <p>Địa chỉ: {{ Session::get('dia_chi') }}</p>
                                    <p>Số điện thoại: {{ Session::get('so_dien_thoai') }}</p>
                                    <p>CMND: {{ Session::get('so_CMND') }}</p>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend style="width: 40%;">Công cụ tính tiền</legend>
                                    <div class="total">
                                        <span class="text">Tiền thuê / 1 ngày:</span>
                                        <div>
                                            <span class="price" id="price_{{ $car->ma }}">0</span>
                                            <span class="currency">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <span class="text">Tiền cọc / 1 xe:</span>
                                        <div>
                                            <span class="price" id="deposit_{{ $car->ma }}">0</span>
                                            <span class="currency">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <span class="text">Tổng tiền:</span>
                                        <div>
                                            <span class="price" id="total_{{ $car->ma }}">0</span>
                                            <span class="currency">VNĐ</span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary booking-sub" onclick="handleBooking({{ $car->ma }})" name="booking-sub">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span style="margin-left: 5px">Đặt xe</span>
                                    </button>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
