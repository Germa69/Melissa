@extends('admin_layout')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    <link rel="stylesheet" href="{{ asset('public/backend/css/contract.css') }}">
@endpush

@section('content')
    <div class="row gutters" style="margin: 0 5px">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-actions-btns mb-4">
                                        <a href="#" class="btn btn-primary">
                                            <i class="icon-download"></i> Download
                                        </a>
                                        <a href="#" class="btn btn-secondary">
                                            <i class="icon-printer"></i> Print
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <img src="{{ asset('public/common/icon/icons.png') }}" width="60px" alt="">
                                    <a href="index.html" class="invoice-logo">
                                        Melissa
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right">
                                        Số 9 Hàng Nón
                                        Hà Nội - Việt Nam<br>
                                    </address>
                                </div>
                            </div>

                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <p>Tên khách hàng: {{ $customer->ten }}</p>
                                        <p>Địa chỉ: {{ $customer->dia_chi }}</p>
                                        <p>E-Mail: {{ $customer->email }}</p>
                                        <p>Số điện thoại: {{ $customer->sdt }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Hợp đồng - #{{ $contract->ma }}</div>
                                            {{ \Carbon\Carbon::parse($contract->ngay_thue)->format('d/m/Y')}} -
                                            {{ \Carbon\Carbon::parse($contract->ngay_tra)->format('d/m/Y')}}
                                        </div>
                                    </div>
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Tình trạng</div>
                                            <div>
                                                @if ($contract->tinh_trang == 1)
                                                    <span class="badge light badge-warning">Đang chờ duyệt</span>
                                                @elseif ($contract->tinh_trang == 2)
                                                    <span class="badge light badge-success">Đã duyêt | Đang cho thuê</span>
                                                @elseif ($contract->tinh_trang == 3)
                                                    <span class="badge light badge-danger">Hủy hợp đồng</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-body">
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Tên xe</th>
                                                    <th>Giá tiền</th>
                                                    <th>Số lượng thuê</th>
                                                    <th>Số ngày thuê</th>
                                                    <th>Số ngày trễ hẹn</th>
                                                    <th>Tiền cọc</th>
                                                    <th>Tiền phạt</th>
                                                    <th>Tổng phụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $subTotal = $contract->gia_thue_xe * $contract->so_ngay_thue * $contract->so_luong;
                                                    $deposit = $contract->tien_coc * $contract->so_luong;
                                                    $mulct = $contract->tien_phat * $contract->so_ngay_tre_hen;
                                                    $total = $subTotal + $deposit + $mulct;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p class="m-0">{{ $car->ten_xe }}</p>
                                                    </td>
                                                    <td>{{ number_format($contract->gia_thue_xe, 0, ',', '.') }}</td>
                                                    <td>{{ $contract->so_luong }}</td>
                                                    <td>{{ $contract->so_ngay_thue }}</td>
                                                    <td>{{ $contract->so_ngay_tre_hen }}</td>
                                                    <td>{{ number_format($contract->tien_coc, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($contract->tien_phat, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($subTotal, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                @if ($contract->tinh_trang == 1)
                                                                    <form>
                                                                        @csrf
                                                                        <input type="hidden" name="ma_xe"
                                                                            value="{{ $contract->ma_xe }}">
                                                                        <input type="hidden" name="ma_khach_hang"
                                                                            value="{{ $contract->ma_khach_hang }}">
                                                                        <input type="hidden" name="so_luong"
                                                                            value="{{ $contract->so_luong }}">
                                                                        <select
                                                                            class="form-control js-custom-select contract_status">
                                                                            <option id={{ $contract->ma }} selected
                                                                                disabled value="1">Đang chờ duyệt</option>
                                                                            <option id={{ $contract->ma }} value="2">Đã
                                                                                duyệt | Đang cho thuê</option>
                                                                            <option id={{ $contract->ma }}
                                                                                {{ $contract->tinh_trang == 1 ? 'disabled' : '' }}
                                                                                value="3">Hủy hợp đồng</option>
                                                                        </select>
                                                                    </form>
                                                                @elseif ($contract->tinh_trang == 2)
                                                                    <form>
                                                                        @csrf
                                                                        <input type="hidden" name="ma_xe"
                                                                            value="{{ $contract->ma_xe }}">
                                                                        <input type="hidden" name="ma_khach_hang"
                                                                            value="{{ $contract->ma_khach_hang }}">
                                                                        <input type="hidden" name="so_luong"
                                                                            value="{{ $contract->so_luong }}">
                                                                        <select
                                                                            class="form-control js-custom-select contract_status">
                                                                            <option id={{ $contract->ma }}
                                                                                {{ $contract->tinh_trang == 2 ? 'disabled' : '' }}
                                                                                value="1">Đang chờ duyệt</option>
                                                                            <option id={{ $contract->ma }} selected
                                                                                value="2">Đã duyệt | Đang cho thuê</option>
                                                                            <option id={{ $contract->ma }} value="3">Hủy
                                                                                hợp đồng</option>
                                                                        </select>
                                                                    </form>
                                                                @elseif ($contract->tinh_trang == 3)
                                                                    <form>
                                                                        @csrf
                                                                        <input type="hidden" name="ma_xe"
                                                                            value="{{ $contract->ma_xe }}">
                                                                        <input type="hidden" name="ma_khach_hang"
                                                                            value="{{ $contract->ma_khach_hang }}">
                                                                        <input type="hidden" name="so_luong"
                                                                            value="{{ $contract->so_luong }}">
                                                                        <select
                                                                            class="form-control js-custom-select contract_status">
                                                                            <option id={{ $contract->ma }}
                                                                                {{ $contract->tinh_trang == 3 ? 'disabled' : '' }}
                                                                                value="1">Đang chờ duyệt</option>
                                                                            <option id={{ $contract->ma }}
                                                                                {{ $contract->tinh_trang == 3 ? 'disabled' : '' }}
                                                                                value="2">Đã duyệt | Đang cho thuê</option>
                                                                            <option id={{ $contract->ma }} selected
                                                                                value="3">Hủy hợp đồng</option>
                                                                        </select>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6">
                                                                @if ($contract->tinh_trang == 2)
                                                                    <div class="resetDate">
                                                                        <div class="input-field">
                                                                            {{ csrf_field() }}
                                                                            <form>
                                                                                <input type="hidden" name="ma" id="ma"
                                                                                    value="{{ $contract->ma }}">
                                                                                <input type="hidden" name="ngay_tra"
                                                                                    id="ngay_tra"
                                                                                    value="{{ $contract->ngay_tra }}">
                                                                                <input type="text" name="ngay_tra_thuc_te"
                                                                                    id="ngay_tra_thuc_te"
                                                                                    class="form-control ngay_tra_thuc_te"
                                                                                    placeholder="Ngày trả thực tế"
                                                                                    data-input>
                                                                                <span class="label" id="error"
                                                                                    style="margin-top: 5px;
                                                                                            width: 100%;
                                                                                            border-radius: 5px;"></span>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="3">
                                                        <p>
                                                            Tổng phụ: [Giá tiền * Số lượng thuê * Số ngày thuê]<br>
                                                            Tiền cọc: [Tiền cọc * Số lượng thuê]<br>
                                                            Tiền phạt: [Tiền phạt * Số ngày trễ hẹn]<br>
                                                        </p>
                                                        <h5 class="text-success"><strong>Tổng tiền</strong></h5>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            {{ number_format($subTotal, 0, ',', '.') }}<br>
                                                            {{ number_format($deposit, 0, ',', '.') }}<br>
                                                            {{ number_format($mulct, 0, ',', '.') }}<br>
                                                        </p>
                                                        <h5 class="text-success">
                                                            <strong>{{ number_format($total, 0, ',', '.') }}</strong>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-footer" style="margin-top: 18px"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

    <script>
        $(".resetDate").flatpickr({
            wrap: true,
            weekNumbers: true,
        });
    </script>

    <script type="text/javascript">

        // Cập nhật lại ngày trả thực tế
        $('.ngay_tra_thuc_te').change(function() {
            var ma = $('#ma').val();
            var ngay_tra_thuc_te = $('#ngay_tra_thuc_te').val();
            var ngay_tra_thuc_te_fmt = new Date(ngay_tra_thuc_te);

            var ngay_tra = $('#ngay_tra').val();
            var ngay_tra_fmt = new Date(ngay_tra);

            var diff_in_time = ngay_tra_thuc_te_fmt.getTime() - ngay_tra_fmt.getTime();
            // Để tính toán số ngày giữa hai ngày
            var diff_in_days = diff_in_time / (1000 * 3600 * 24);

            var _token = $('input[name="_token"]').val();

            if (ngay_tra_thuc_te_fmt <= ngay_tra_fmt) {
                $('#error').addClass('label-danger');
                $('#ngay_tra_thuc_te').css('border', '1px solid #f00');
                $('#error').text('Ngày trả thực tế phải lớn hơn ngày trả xe');
            } else {
                $('#error').removeClass('label-danger');
                $('#ngay_tra_thuc_te').css('border', '1px solid #ccc');
                $('#error').text('');

                setTimeout(function() {
                    $.ajax({
                        url: '{{ route('contract.update_date_contract') }}',
                        method: 'POST',
                        data: {
                            ma: ma,
                            ngay_tra_thuc_te: ngay_tra_thuc_te,
                            so_ngay_tre_hen: diff_in_days,
                            _token: _token
                        },
                        success: function(data) {
                            swal("Hoàn tất!", "Cập nhật ngày trả thực tế thành công!",
                                "success");

                            setTimeout(function() {
                                location.reload();
                            }, 1000)
                        }
                    });
                }, 1000)
            }
        });

        // Cập nhật tình trạng hợp đồng
        $('.contract_status').change(function() {
            var contract_status = $(this).val();
            var contract_id = $(this).children(":selected").attr("id");
            var car_id = $("input[name='ma_xe']").val();
            var customer_id = $("input[name='ma_khach_hang']").val();
            var qty = $("input[name='so_luong']").val();

            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ route('contract.update_status_contract') }}',
                method: 'POST',
                data: {
                    contract_status: contract_status,
                    contract_id: contract_id,
                    car_id: car_id,
                    customer_id: customer_id,
                    qty: qty,
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    swal("Hoàn tất!", "Thay đổi tình trạng hợp đồng thành công!", "success");

                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            });
        });
    </script>
@endpush
