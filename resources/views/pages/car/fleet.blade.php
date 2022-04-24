@extends('layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontend/css/fleet.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    <style>
        .resetDate {
            display: flex;
        }

        .input-button {
            margin-left: 5px;
        }

        .input-button:focus {
            outline: none;
        }

    </style>
@endpush
@section('content')
    <section>
        <div class="container">
            <div class="text-center">
                <h1>Các xe trong cửa hàng của chúng tôi</h1>

                <br>

                <p class="lead">Tìm kiếm xe</p>
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            name="searchText" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section-background">
        <div class="container">
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4 col-sm-4">
                        <div class="courses-thumb courses-thumb-secondary">
                            <div class="courses-top">
                                <div class="courses-image">
                                    <img src="{{ url('public/uploads/car/' . $car->anh_xe) }}" class="img-responsive"
                                        width="100%" height="100%">
                                </div>

                                <div class="courses-date">
                                    <span title="passegengers"><i class="fa fa-user"></i>
                                        {{ $car->so_cho_ngoi }}</span>
                                    <span title="luggages"><i class="fa fa-briefcase"></i> 4</span>
                                    <span title="doors"><i class="fa fa-sign-out"></i> 4</span>
                                    <span title="transmission"><i class="fa fa-cog"></i> A</span>
                                </div>
                            </div>

                            <div class="courses-detail">
                                <h3><a href="fleet">{{ $car->ten_xe }}</a></h3>
                                <p class="lead"><small>Chỉ từ</small>
                                    <strong>{{ number_format($car->gia_thue_xe, 0, ',', '.') }}</strong> <small>VNĐ / 01
                                        ngày</small>
                                </p>
                                <p class="lead">
                                    <small>Số tiền phạt khi trả xe chậm thời hạn</small>
                                    <strong>{{ number_format($car->tien_phat, 0, ',', '.') }}</strong>
                                    <small>VNĐ / 01 ngày</small>
                                </p>
                                <p>
                                    <i class="fa fa-tag" style="margin-right: 5px"></i>
                                    @if ($car->tinh_trang == 0)
                                        Còn xe
                                    @elseif($car->tinh_trang == 1)
                                        Xe đã được thuê
                                    @else
                                        Đang bảo dưỡng
                                    @endif
                                </p>
                            </div>

                            <div class="courses-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if (Session::has('ma_khach_hang'))
                                            @if ($car->tinh_trang == 1)
                                                @if ($car->so_luong != 0)
                                                    <button type="button" class="custom-btn custom-size booking"
                                                        id="booking_{{ $car->ma }}" data-car_id={{ $car->ma }}>

                                                        <div class="custom-left">
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            <span class="mobie-checkout">Đặt</span>
                                                        </div>

                                                        <div class="custom-right">
                                                            <i class="fa fa-car"></i>: {{ $car->so_luong_da_thue }}
                                                            /
                                                            {{ $car->so_luong + $car->so_luong_da_thue }}
                                                        </div>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        onclick="if (confirm('Xe đã được thuê hết!!')) window.location.href='{{ route('customer.login') }}'"
                                                        class="section-btn btn btn-danger btn-block custom-btn">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                        <span style="margin-left: 5px">Đã thuê hết</span>
                                                    </button>
                                                @endif
                                            @else
                                                <button type="button"
                                                    onclick="if (confirm('Xe đã được bảo dưỡng!!')) window.location.href='{{ route('customer.login') }}'"
                                                    class="section-btn btn btn-info btn-block custom-btn">
                                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    <span style="margin-left: 5px">Đang bảo dưỡng</span>
                                                </button>
                                            @endif
                                        @else
                                            <button type="button"
                                                onclick="if (confirm('Xin hãy đăng nhập để thực hiện việc đặt xe!!')) window.location.href='{{ route('customer.login') }}'"
                                                class="section-btn btn btn-primary btn-block custom-btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                <span style="margin-left: 5px">Đặt ngay</span>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button"
                                            class="section-btn btn btn-info btn-block custom-btn showCarDetail"
                                            id="showCarDetail_{{ $car->ma }}" data-car_id={{ $car->ma }}>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span style="margin-left: 5px">Xem xe</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('pages.car.car_detail')
                    @include('pages.car.booking')
                @endforeach
            </div>
        </div>
        {{ $cars->links() }}
    </section>
@endsection

@push('scripts')
    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script src="{{ asset('public/frontend/js/simple.money.format.js') }}"></script>

    <script>
        $(".resetDate").flatpickr({
            wrap: true,
            weekNumbers: true,
        });
    </script>

    <script type="text/javascript">
        // Load ngày tháng
        function load_date(ma, ngay_thue, ngay_tra) {
            var gia_thue_xe = $('#gia_thue_xe_' + ma).val();
            // Để tính toán chênh lệch thời gian của hai ngày
            var diff_in_time = ngay_tra.getTime() - ngay_thue.getTime();
            // Để tính toán số ngày giữa hai ngày
            var diff_in_days = diff_in_time / (1000 * 3600 * 24);
            $('#days_' + ma).text(diff_in_days);
        }

        // Công cụ tính tiền [Xem trước giống như máy tính bỏ túi]
        function load_money(ma) {
            var gia_thue_xe = $('#gia_thue_xe_' + ma).val();
            var tien_coc = $('#tien_coc_' + ma).val();
            var so_ngay_thue = $('#days_' + ma).text();
            var so_luong = $('#qty_' + ma).text();

            var price = (gia_thue_xe * so_ngay_thue * so_luong);
            $('#price_' + ma).text(price);
            $('#price_' + ma).simpleMoneyFormat();

            var deposit = (tien_coc * so_luong);
            $('#deposit_' + ma).text(deposit);
            $('#deposit_' + ma).simpleMoneyFormat();

            var total = price + deposit;
            $('#total_' + ma).text(total);
            $('#total_' + ma).simpleMoneyFormat();
        }

        // Xử lý thay đổi khi chọn ngày thuê
        function handleChangeThue(ma) {
            var ngay_thue = $('#ngay_thue_' + ma).val();
            var ngay_thue = new Date(ngay_thue);

            var now = new Date().toISOString().slice(0, 10);
            var ngay_hom_nay = new Date(now);

            if (ngay_thue < ngay_hom_nay) {
                $('#ngay_thue_' + ma).css('border', '1px solid #f00');
                $('#error1_' + ma).text('Ngày nhận xe phải lớn hơn hoặc bằng ngày hiện tại');
            } else {
                $('#ngay_tra_' + ma).css('pointer-events', 'all');
                $('#ngay_thue_' + ma).css('border', '1px solid #ccc');
                $('#error1_' + ma).text('');
            }
        };

        // Xử lý thay đổi khi chọn ngày trả
        function handleChangeTra(ma) {
            $('#qt-minus_' + ma).css('pointer-events', 'all');
            $('#qt-plus_' + ma).css('pointer-events', 'all');

            var ngay_thue = $('#ngay_thue_' + ma).val();
            var ngay_thue = new Date(ngay_thue);

            var ngay_tra = $('#ngay_tra_' + ma).val();
            var ngay_tra = new Date(ngay_tra);

            load_date(ma, ngay_thue, ngay_tra);

            if (ngay_tra <= ngay_thue) {
                $('#ngay_tra_' + ma).css('border', '1px solid #f00');
                $('#error2_' + ma).text('Ngày trả xe phải lớn hơn ngày thuê xe');
            } else {
                $('#ngay_tra_' + ma).css('border', '1px solid #ccc');
                $('#error2_' + ma).text('');
                load_money(ma);
            }
        }

        // Xử lý khi Giảm số lượng đặt
        function handleClickMinus(ma) {
            var qty = $('#qty_' + ma).text();
            if (qty > 1) {
                qty--;
                $('#qty_' + ma).text(qty);
                load_money(ma);
            } else {
                toastr.error('Số lượng thuê tối thiểu là 1', 'Error');
            }
        }

        // Xử lý khi Tăng số lượng đặt
        function handleClickPlus(ma) {
            var qty = $('#qty_' + ma).text();
            if (qty < 10) {
                qty++;
                $('#qty_' + ma).text(qty);
                load_money(ma);
            } else {
                toastr.error('Số lượng thuê tối đa là 10', 'Error');
            }
        }

        // Xử lý việc đặt xe
        function handleBooking(ma) {
            setTimeout(function() {
                var ma_xe = $('#ma_xe_' + ma).val();
                $('#modal-booking-' + ma_xe).modal('hide');
            }, 500)

            swal({
                    title: "Xác nhận đơn đặt",
                    text: "Đặt xe sẽ diễn ra, bạn có muốn tiếp tục đặt không?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Cảm ơn, đặt xe!",
                    cancelButtonText: "Đóng, suy nghĩ thêm",
                    cancelButtonClass: "btn-danger",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },

                function(isConfirm) {
                    if (isConfirm) {
                        var ma_xe = $('#ma_xe_' + ma).val();
                        var ma_khach_hang = $('#ma_khach_hang_' + ma).val();
                        var ngay_thue = $('#ngay_thue_' + ma).val();
                        var ngay_tra = $('#ngay_tra_' + ma).val();
                        var so_luong = $('#qty_' + ma).text();
                        var so_ngay_thue = $('#days_' + ma).text();
                        var gia_thue_xe = $('#gia_thue_xe_' + ma).val();
                        var tien_phat = $('#tien_phat_' + ma).val();
                        var tien_coc = $('#tien_coc_' + ma).val();
                        var _token = $('input[name="_token"]').val();

                        if (ngay_thue == '') {
                            swal("", "Hãy chọn ngày thuê xe!", "error");
                            setTimeout(function() {
                                var ma_xe = $('#ma_xe').val();
                                $('#modal-booking-' + ma_xe).modal('show');

                            }, 1500)
                        } else if (ngay_tra == '') {
                            swal("", "Hãy chọn ngày trả xe!", "error");
                            setTimeout(function() {
                                var ma_xe = $('#ma_xe').val();
                                $('#modal-booking-' + ma_xe).modal('show');

                            }, 1500)
                        } else {
                            $.ajax({
                                url: '{{ route('customer.confirm_booking') }}',
                                method: 'POST',
                                data: {
                                    ma_khach_hang: ma_khach_hang,
                                    ma_xe: ma_xe,
                                    ngay_thue: ngay_thue,
                                    ngay_tra: ngay_tra,
                                    so_luong: so_luong,
                                    so_ngay_thue: so_ngay_thue,
                                    gia_thue_xe: gia_thue_xe,
                                    tien_phat: tien_phat,
                                    tien_coc: tien_coc,
                                    _token: _token
                                },
                                success: function() {
                                    location.reload();
                                },
                                error: function() {
                                    swal("Đặt xe",
                                        "Bạn đã đặt xe thất bại, vui lòng kiểm tra lại!",
                                        "error");
                                }
                            });
                        }
                    } else {
                        swal("Đóng", "Đặt xe chưa được xác nhận, làm ơn hoàn tất việc đặt xe",
                            "error");
                        setTimeout(function() {
                            var ma_xe = $('#ma_xe_' + ma).val();
                            $('#modal-booking-' + ma_xe).modal('show');
                        }, 1500)
                    }
                });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Hiển thị ra modal chi tiết xe
            $('.showCarDetail').each(function() {
                var car_id = $(this).data('car_id');
                var showCarDetailId = $('#showCarDetail_' + car_id);

                showCarDetailId.click(function() {
                    $('#modal-detail-' + car_id).modal('show');
                })
            });

            // Hiển thị ra modal để book xe
            $('.booking').each(function() {
                var car_id = $(this).data('car_id');
                var bookingId = $('#booking_' + car_id);

                bookingId.click(function() {
                    $('#modal-booking-' + car_id).modal('show');
                })
            });
        });
    </script>
@endpush
