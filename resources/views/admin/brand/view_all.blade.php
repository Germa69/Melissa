@extends('admin_layout')

@push('css')
    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <a href="{{ route('brand.view_insert') }}"class="btn btn-rounded btn-info">
                    <span class="btn-icon-left text-info">
                        <i class="fa fa-plus color-info"></i>
                    </span>
                    Thêm hãng xe
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
                                        <th>#</th>
                                        <th>Tên hãng xe</th>
                                        <th>Logo</th>
                                        <th>Quốc gia</th>
                                        <th>Năm thành lập</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $brand->ten_hang_xe }}</td>
                                            <td>
                                                <img class="rounded-circle" width="35"
                                                    src="{{ asset('public/uploads/brand/' . $brand->logo) }}" alt="">
                                            </td>
                                            <td>{{ $brand->quoc_gia }}</td>
                                            <td>{{ $brand->nam_thanh_lap }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('brand.view_update', ['ma' => $brand->ma]) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>

                                                    @if (Session::get('cap_do') == 0)
                                                        <button type="button"
                                                                class="btn btn-danger shadow btn-xs sharp"
                                                                style="outline: none"
                                                                onclick="notificationDelte()"><i
                                                                    class="fa fa-trash-o fa-fw"></i></button>
                                                    @else
                                                        <form>
                                                            {{ csrf_field() }}
                                                            <button type="button"
                                                                class="btn btn-danger shadow btn-xs sharp"
                                                                style="outline: none"
                                                                onclick="deleteBrand({{ $brand->ma }})"><i
                                                                    class="fa fa-trash-o fa-fw"></i></button>
                                                        </form>
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

    <script>
        function notificationDelte() {
            swal("Hãy lên quyền Super Admin để thực hiện chức năng này!", "Vui lòng thử lại", "error");
        }

        function deleteBrand(ma) {
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
                    url: '{{ route('brand.delete') }}',
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
