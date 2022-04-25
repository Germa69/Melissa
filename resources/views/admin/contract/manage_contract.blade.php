@extends('admin_layout')

@push('css')
    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

    <!-- BEGIN: Select2 CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/select2-materialize.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/backend/css/select2/form-select2.min.css') !!}">
    <!-- END: Select2 CSS-->
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">

            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">
                            <i class="flaticon-141-home"></i>
                            Dashboard
                        </a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-bottom: 40px">
            <div class="col col-lg-4 col-md-6 col-sm-12 resetDate" style="margin-bottom: 10px">
                <label for="users-list-verified">Từ ngày</label>
                <div class="input-field">
                    <input type="text" name="ngay_thue" id="ngay_thue" class="form-control" placeholder="yyyy-mm-dd"
                        data-input>
                </div>
            </div>
            <div class="col col-lg-4 col-md-6 col-sm-12 resetDate" style="margin-bottom: 10px">
                <label for="users-list-role">Đến ngày</label>
                <div class="input-field">
                    <input type="text" name="ngay_tra" id="ngay_tra" class="form-control" placeholder="yyyy-mm-dd"
                        data-input>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 10px">
                <label for="users-list-status">Trạng thái</label>
                <div class="input-field">
                    <select class="select2 browser-default form-control" style="width: fit-content !important;"
                        name="tinh_trang" id="tinh_trang">
                        <option value="" selected disabled>Chọn trạng thái</option>
                        <option value="1">Đang chờ duyệt</option>
                        <option value="2">Đã duyệt | Đang cho thuê</option>
                        <option value="3">Hủy hợp đồng</option>
                    </select>
                </div>
            </div>
            <div class="col col-lg-1 col-md-6 col-sm-12" style="margin-bottom: 10px">
                <button type="button" class="btn btn-primary" id="filter"
                    style="margin-top: 30px; height: 48px;">Lọc</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="contractd">
                    <div class="contractd-body">
                        <div class="table-responsive">
                            <table id="contractTable" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên xe</th>
                                        <th>Giá thuê xe</th>
                                        <th>Số lượng</th>
                                        <th>Ngày thuê</th>
                                        <th>Ngày trả</th>
                                        <th>Ngày trả thực tế</th>
                                        <th>Tiền phạt</th>
                                        <th>Tình trạng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Datatable -->
    <script src="{{ asset('public/backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/js/plugins-init/datatables.init.js') }}"></script> --}}

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
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                            },
                            text: '<i class="fas fa-print"></i> Print',
                        },
                    ],
                    ajax: {
                        url: "{{ route('contract.manage_contract') }}",
                        data: {
                            ngay_thue: ngay_thue,
                            ngay_tra: ngay_tra,
                            tinh_trang: tinh_trang
                        }
                    },
                    columns: [
                        { data: 'DT_RowIndex' },
                        { data: 'customer.ten' },
                        { data: 'car.ten_xe' },
                        { data: 'car.gia_thue_xe' },
                        { data: 'so_luong' },
                        { data: 'ngay_thue' },
                        { data: 'ngay_tra' },
                        { data: 'ngay_tra_thuc_te',
                            "render": function (data, type, row) {
                                if (data != null) {
                                    return data;
                                } else {
                                    return '[ Trống ... ]'
                                }
                            }
                        },
                        { data: 'tien_phat' },
                        { data: 'tinh_trang',
                            "render": function (data, type, row) {
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
                            data: 'action', name: 'action',
                            orderable: true,
                            searchable: true,
                        },
                    ]
                });
            }

            $('#filter').click(function () {
                var ngay_thue   = $('#ngay_thue').val();
                var ngay_tra     = $('#ngay_tra').val();
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
@endpush
