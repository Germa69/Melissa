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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="carTable" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số CMTND / Thẻ căn cước</th>
                                        <th>Số điện thoại</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $customer->ten }}</td>
                                            <td>
                                                <span id="showEmail-{{ $customer->ma }}" style="cursor: pointer;"
                                                    onclick="showEmailCustomer('{{ $customer->email }}', {{ $customer->ma }})">[email
                                                    protected]</span>
                                            </td>
                                            <td>{{ $customer->dia_chi }}</td>
                                            <td>{{ $customer->so_CMND }}</td>
                                            <td>{{ $customer->sdt }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if ($customer->tinh_trang == 1)
                                                        <a href="{{ route('customer.active', ['ma' => $customer->ma]) }}" class="badge light badge-success">
                                                            <i class="fa fa-check-circle"></i>
                                                            Đang hoạt động
                                                        </a>
                                                    @else
                                                        <a href="{{ route('customer.inactive', ['ma' => $customer->ma]) }}" class="badge light badge-danger">
                                                            <i class="fa fa-lock"></i>
                                                            Khóa
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <script>
                                            function showEmailCustomer(email, ma) {
                                                const showEmail = document.querySelector(`#showEmail-${ma}`);
                                                showEmail.textContent = email;
                                            }
                                        </script>
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
