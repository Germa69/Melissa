@extends('admin_layout')

@push('css')
    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 650px;
                margin: 1.75rem auto;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <a href="{{ route('car.view_insert') }}" class="btn btn-rounded btn-info">
                    <span class="btn-icon-left text-info">
                        <i class="fa fa-plus color-info"></i>
                    </span>
                    Thêm xe
                </a>
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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="carTable" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tên xe</th>
                                        <th>Giá thuê xe</th>
                                        <th>Tiền phạt</th>
                                        <th>Số lượng còn</th>
                                        <th>Số lượng đã thuê</th>
                                        <th>Tình trạng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" width="35"
                                                    src="{{ asset('public/uploads/car/' . $car->anh_xe) }}" alt="">
                                            </td>
                                            <td>{{ $car->ten_xe }}</td>
                                            <td>{{ number_format($car->gia_thue_xe, 0, ',', '.') }}</td>
                                            <td>{{ number_format($car->tien_phat, 0, ',', '.') }}</td>
                                            <td>{{ $car->so_luong }}</td>
                                            <td>{{ $car->so_luong_da_thue }}</td>
                                            <td>
                                                @if ($car->tinh_trang == 1)
                                                    <span class="badge light badge-success">Còn xe [{{ $car->so_luong }} / {{ $car->so_luong + $car->so_luong_da_thue }}]</span>
                                                @else
                                                    <span class="badge light badge-warning">Đang bảo dưỡng</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex" style="justify-content: center">
                                                    <button type="button" class="btn btn-info shadow btn-xs sharp mr-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-detail-{{ $car->ma }}"><i
                                                            class="fa fa-info"></i></button>

                                                    <a href="{{ route('car.view_update', ['ma' => $car->ma]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>

                                                    @if (Session::get('cap_do') == 0)
                                                        <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                                            style="outline: none" onclick="notificationDelte()"><i
                                                                class="fa fa-trash-o fa-fw"></i></button>
                                                    @else
                                                        <form>
                                                            {{ csrf_field() }}
                                                            <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                                                style="outline: none"
                                                                onclick="deleteCar({{ $car->ma }})"><i
                                                                    class="fa fa-trash-o fa-fw"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        @include('admin.car.view_detail')
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

    <script>
        function notificationDelte() {
            swal("Hãy lên quyền Super Admin để thực hiện chức năng này!", "Vui lòng thử lại", "error");
        }

        function deleteCar(ma) {
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
                    url: '{{ route('car.delete') }}',
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
    </script>
@endpush
