@extends('admin_layout')

@push('css')
    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
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

        <div class="row">
            <div class="col-12">
                <div class="contractd">
                    <div class="contractd-body">
                        <div class="table-responsive">
                            <table id="contractTable" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <th>Tên xe</th>
                                        <th>Giá thuê xe</th>
                                        <th>Tình trạng</th>
                                        <th>Ngày thuê</th>
                                        <th>Ngày trả</th>
                                        <th>Ngày trả thực tế</th>
                                        <th>Tiền phạt</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $contract)
                                        <tr>
                                            <td>{{ $contract->customer->ten }}</td>
                                            <td>{{ $contract->car->ten_xe }}</td>
                                            <td>{{ $contract->car->gia_thue_xe }}</td>
                                            <td>
                                                @if ($contract->tinh_trang == 0)
                                                    <span class="badge light badge-warning">Chờ duyệt</span>
                                                @elseif($contract->tinh_trang == 1)
                                                    <span class="badge light badge-success">Đã thuê</span>
                                                @elseif($contract->tinh_trang == 2)
                                                    <span class="badge light badge-danger">Đang bảo dưỡng</span>
                                                @endif
                                            </td>
                                            <td>{{ $contract->ngay_thue }}</td>
                                            <td>{{ $contract->ngay_tra }}</td>
                                            <td>{{ $contract->ngay_tra_thuc_te }}</td>
                                            <td>{{ $contract->tien_phat }}</td>
                                            <td>
                                                <div class="d-flex" style="justify-content: center">
                                                    @if ($contract->tinh_trang == 0)
                                                        <a href="{{ route('contract.approval', ['ma' => $contract->ma]) }}"
                                                            class="btn btn-success shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-check"></i>
                                                        </a>

                                                        <a href="{{ route('contract.cancel', ['ma' => $contract->ma]) }}"
                                                            class="btn btn-danger shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    @elseif ($contract->tinh_trang == 1)
                                                        <a href="{{ route('contract.view_update', ['ma' => $contract->ma]) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    <script src="{{ asset('public/backend/js/plugins-init/datatables.init.js') }}"></script>

    {{-- <script>
        function notificationDelte() {
            swal("Hãy lên quyền Super Admin để thực hiện chức năng này!", "Vui lòng thử lại", "error");
        }

        function deletecontract(ma) {
            var _token = $('input[name="_token"]').val();

            swal({
                title: "Bạn có chắc xóa không?",
                text: "Bạn sẽ không thể khôi phục lại tệp này!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Huỷ",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Vâng, xóa nó!",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: '{{ route('contract.delete') }}',
                    method: 'POST',
                    data: {
                        ma: ma,
                        _token: _token
                    },
                    dataType: "html",
                    success: function() {
                        setTimeout(function() {
                            location.reload();
                        }, 1000)
                    },
                });
            });
        }
    </script> --}}
@endpush
