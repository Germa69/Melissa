@extends('layout')
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
                            <div class="courses-top" style="width: 360px;height: 280px">
                                <div class="courses-image">
                                    <img src="{{ url('public/uploads/car') }}/{{ $car->anh_xe }}" class="img-responsive"
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
                                    <strong>{{ number_format($car->gia_thue_xe, 0, ',', '.') }}</strong> <small>VNĐ / 01 ngày</small>
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
                                        @if ($car->tinh_trang == 0)
                                            @if (Session::has('ma_khach_hang'))
                                                <button type="button" data-toggle="modal"
                                                    data-target=".bs-example-modal"
                                                    class="section-btn btn_book btn btn-primary btn-block custom-btn">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span style="margin-left: 5px"><span style="margin-left: 5px">Đặt
                                                            ngay</span></span>
                                                </button>
                                            @else
                                                <button type="button"
                                                    onclick="if (confirm('Xin hãy đăng nhập để thực hiện việc đặt xe!!')) window.location.href='{{ route('customer.login') }}'"
                                                    class="section-btn btn btn-primary btn-block custom-btn">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    <span style="margin-left: 5px">Đặt ngay</span>
                                                </button>
                                            @endif
                                        @elseif($car->tinh_trang == 1)
                                            <button type="submit"
                                                class="section-btn btn_book btn btn-danger btn-block custom-btn">
                                                Xe đã được thuê
                                            </button>
                                        @elseif($car->tinh_trang == 2)
                                            <button type="submit"
                                                class="section-btn btn_book btn btn-warning btn-block custom-btn">
                                                Đang bảo dưỡng
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="section-btn btn btn-info btn-block custom-btn showCarDetail" id="showCarDetail_{{ $car->ma }}" data-car_id={{ $car->ma }}>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span style="margin-left: 5px">Xem xe</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('pages.car.car_detail')
                @endforeach
            </div>
        </div>
        {{ $cars->links() }}
    </section>

@endsection

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Đặt ngay</h4>
            </div>

            <div class="modal-body">
                <form>
                    <input hidden="hidden" value="{{ Session::get('ma_khach_hang') }}" name="ma_khach_hang" id="ma_khach_hang">
                    <input hidden="hidden" value="{{ $car->ma }}" name="ma_xe" id="ma_xe">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <label>Ngày nhận xe</label>
                            <input type="date" class="form-control" min="{{ date('Y-m-d') }}" name="ngay_thue"
                                id="ngay_thue" placeholder="Ngày nhận xe">
                        </div>

                        <div class="col-md-6">
                            <label>Ngày trả xe</label>
                            <input type="date" class="form-control" min="{{ date('Y-m-d') }}" name="ngay_tra"
                                id="ngay_tra" placeholder="Ngày trả xe">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Tên khách hàng: {{ Session::get('ten_khach_hang') }} </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Địa chỉ: {{ Session::get('dia_chi') }}</h4>
                        </div>

                        <div class="col-md-6">
                            <h4>Số điện thoại khách hàng: {{ Session::get('so_dien_thoai') }} </h4>
                        </div>
                        <div class="col-md-12" style="padding: 0 15px;">
                            <h4>Khi đi lấy xe, quý khách vui lòng mang theo bản sao lưu sổ đỏ có công trứng để cọc. Xin
                                cảm ơn!</h4>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="section-btn btn btn-primary">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.showCarDetail').each(function () {
                var car_id = $(this).data('car_id');
                var showCarDetailId = $('#showCarDetail_'+car_id);

                showCarDetailId.click(function () {
                    $('#modal-id-'+car_id).modal('show');
                })
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $(".btn_book").click(function() {
                var ma_xe = $(this).data('ma_xe');
                console.log(ma_xe);
                $("#ma_xe").val(ma_xe);
            })
        })
    </script> --}}

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#ngay_tra').click(function() {
                var ngay_thue = $('#ngay_thue').val();

                if (ngay_thue == "") {
                    var now = new Date();
                    var ngay_tra = new Date(now.getFullYear(), now.getMonth() + 1, now.getDate() + 1);
                    var month = String(ngay_tra.getMonth());
                    var mins;
                    if (month.length == 1) {
                        mins = ngay_tra.getFullYear() + '-' + '0' + ngay_tra.getMonth() + '-' + ngay_tra
                            .getDate();
                    } else {
                        mins = ngay_tra.getFullYear() + '-' + ngay_tra.getMonth() + '-' + ngay_tra
                    .getDate();
                    }

                    $('#ngay_tra').attr('min', mins);
                    $('#ngay_tra').change(function() {
                        let max = $("#ngay_tra").val();
                        let date = new Date(max);
                        let ngay = new Date(date.getFullYear(), date.getMonth() + 1, date
                        .getDate() - 1);
                        let thang = String(ngay.getMonth());
                        let min;
                        //alert(ngay);
                        if (thang.length == 1) {
                            min = ngay.getFullYear() + '-' + '0' + ngay.getMonth() + '-' + ngay
                                .getDate();
                        } else {
                            min = ngay.getFullYear() + '-' + ngay.getMonth() + '-' + ngay.getDate();
                        }
                        $('#ngay_thue').attr('max', min);

                    })

                } else {
                    var date = new Date(ngay_thue);
                    var ngay = new Date(date.getFullYear(), date.getMonth() + 1, date.getDate() + 1);

                    var thang = String(ngay.getMonth());
                    var min;
                    console.log(ngay);
                    if (thang.length == 1) {
                        min = ngay.getFullYear() + '-' + '0' + ngay.getMonth() + '-' + ngay.getDate();
                    } else {
                        min = ngay.getFullYear() + '-' + ngay.getMonth() + '-' + ngay.getDate();
                    }
                    $(this).attr('min', min);

                }
            })
        })
    </script> --}}
@endpush
