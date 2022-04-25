@extends('layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/backend/css/breadcrumbs.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/profile.css') }}">

    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

    <!-- BEGIN: Select2 CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/select2-materialize.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/form-select2.min.css') !!}">
    <!-- END: Select2 CSS-->

    <style>
        .select2-container .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

        .badge-success {
            background-color: #ecfae4;
            color: #68CF29;
            padding: 7px;
        }

        .badge-danger {
            background-color: #ffefee;
            color: #FF4C41;
            padding: 7px;
        }

        .badge-warning {
            background-color: #fff0da;
            color: #FFAB2D;
            padding: 7px;
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
                                Thay đổi hình ảnh
                                <input type="file" name="file" id="file" data-customer_id={{ $profile->ma }} />
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
                        <a href="" data-target-id="history-contract">
                            <i class="fa fa-suitcase"></i>
                            Lịch sử đặt xe
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

            <div class="col-md-9 admin-content" id="change-password">
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

            <div class="col-md-9 admin-content" id="history-contract">
                @include('pages.customer.history_contract')
                @include('pages.customer.view_contract')
                @include('pages.customer.cancel_contract')
            </div>

            <div class="col-md-9 admin-content" id="logout">
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
    <!-- Datatable -->
    <script src="{{ asset('public/backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

    <!-- BEGIN: Select2 JS-->
    <script src="{!! asset('public/backend/js/select2/select2.full.min.js') !!}"></script>
    <script src="{!! asset('public/backend/js/select2/form-select2.min.js') !!}"></script>
    <!-- END: Select2 JS-->

    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

    <script>
        $(".resetDate").flatpickr({
            wrap: true,
            weekNumbers: true,
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            fill_datatable();

            function fill_datatable(ngay_thue = '', ngay_tra = '', tinh_trang = '') {
                $('#contractTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "oLanguage": {
                        "sSearch": '<span class="fs-14">Tìm kiếm: </span> ',
                        "sZeroRecords": "Không có dữ liệu nào trong bảng",
                        "sLengthMenu": '<span class="fs-14">Hiển thị</span> <select>' +
                            '<option value="10">10</option>' +
                            '<option value="20">20</option>' +
                            '<option value="30">30</option>' +
                            '<option value="40">40</option>' +
                            '<option value="50">50</option>' +
                            '<option value="-1">Tất cả</option>' +
                            '</select> <span class="fs-14">bản ghi</span>',
                        "sInfo": "Hiển thị _START_ đến _END_ trong tổng số bản ghi là _TOTAL_",
                        "sProcessing": 'Loading <i class="fa fa-spinner" style="transition: 2s;"></i>',
                        "oPaginate": {
                            "sNext": '<i class="fa fa-chevron-right"></i>',
                            "sPrevious": '<i class="fa fa-chevron-left"></i>',
                        }
                    },
                    dom: 'Blfrtip',
                    buttons: [{
                        extend: 'print',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                        text: '<i class="fas fa-print"></i> Print',
                    }, ],
                    ajax: {
                        url: '{{ url('customer/profile/') . '/' . $profile->ma }}',
                        data: {
                            ngay_thue: ngay_thue,
                            ngay_tra: ngay_tra,
                            tinh_trang: tinh_trang
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex'
                        },
                        {
                            data: 'customer.ten'
                        },
                        {
                            data: 'car.ten_xe'
                        },
                        {
                            data: 'ngay_thue'
                        },
                        {
                            data: 'ngay_tra'
                        },
                        {
                            data: 'tinh_trang',
                            "render": function(data, type, row) {
                                if (data == 1) {
                                    return '<span class="badge light badge-warning">Đang chờ duyệt</span>';
                                } else if (data == 2) {
                                    return '<span class="badge light badge-success">Đã duyệt | Đang cho thuê</span>';
                                } else {
                                    return '<span class="badge light badge-danger">Hủy hợp đồng</span>'
                                }
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true,
                        },
                    ]
                });
            }

            $('#filter').click(function() {
                var ngay_thue = $('#ngay_thue').val();
                var ngay_tra = $('#ngay_tra').val();
                var tinh_trang = $('#tinh_trang').val();

                if (ngay_thue !== '' && ngay_tra !== '' || tinh_trang !== '') {
                    $('#contractTable').DataTable().destroy();
                    fill_datatable(ngay_thue, ngay_tra, tinh_trang);
                } else {
                    alert('Hãy lựa chọn phù hợp để lọc');
                    $('#contractTable').DataTable().destroy();
                    fill_datatable(ngay_thue, ngay_tra, tinh_trang);
                }
            });
        });
    </script>

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

    <script type="text/javascript">
        function handleShowContract(ma) {
            $('#modal-show-contract-' + ma).modal('show');
        }

        function handleCancelContract(ma) {
            $('#modal-cancel-contract-' + ma).modal('show');
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.cancel_contract').click(function() {
                setTimeout(function() {
                    var ma = $('#ma').val();
                    $('#modal-cancel-contract-' + ma).modal('hide');
                }, 500)

                swal({
                        title: "Xác nhận hủy đặt xe",
                        text: "Bạn thật sự muốn hủy đặt xe này?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Vâng, hủy đặt!",
                        cancelButtonText: "Đóng, suy nghĩ thêm",
                        cancelButtonClass: "btn-danger",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },

                    function(isConfirm) {
                        if (isConfirm) {
                            var ma = $('#ma').val();
                            var contract_status = $('#contract_status').val();
                            var car_id = $('#car_id').val();
                            var customer_id = $('#customer_id').val();
                            var qty = $('#contract_qty').val();
                            var reason = $('#reason').val();
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url: '{{ route('customer.cancel_status_contract') }}',
                                method: 'POST',
                                data: {
                                    contract_status: contract_status,
                                    ma: ma,
                                    car_id: car_id,
                                    customer_id: customer_id,
                                    qty: qty,
                                    reason: reason,
                                    _token: _token
                                },
                                success: function(data) {
                                    swal("Hoàn tất!", "Hủy hợp đồng thành công!",
                                        "success");

                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000)
                                }
                            });
                        } else {
                            swal("Đóng", "Hủy hợp đồng thất bại!",
                                "error");
                            $('#reason').val('');
                            // setTimeout(function() {
                            //     var ma = $('#ma').val();
                            //     $('#modal-cancel-contract-' + ma).modal('show');
                            // }, 1500)
                        }
                    });
            });
        });
    </script>
@endpush
