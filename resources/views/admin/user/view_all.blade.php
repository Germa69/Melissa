@extends('admin_layout')

@push('css')
    <!-- Datatable -->
    <link href="{{ asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-sm-flex d-block">
                <div class="mr-auto mb-sm-0 mb-3">
                    <h4 class="card-title mb-2">Danh sách người dùng</h4>
                </div>
                <a href="{{ route('user.view_insert') }}" class="btn btn-info">
                    <i class="flaticon-043-plus"></i>
                    Thêm người dùng
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table style-1" id="ListDatatableView">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Cấp độ</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $stt++ }}
                                    </td>
                                    <td>
                                        <div class="media style-1">
                                            <img src="{{ asset('public/uploads/avatar/' . $user->avatar) }}"
                                                class="img-fluid mr-2" alt="">
                                            <div class="media-body">
                                                <h6>{{ $user->ten }}</h6>
                                                <span id="showEmail-{{ $user->ma }}" style="cursor: pointer;"
                                                    onclick="showEmailUser('{{ $user->email }}', {{ $user->ma }})">[email
                                                    protected]</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->dia_chi }}
                                    </td>
                                    <td>
                                        {{ $user->sdt }}
                                    </td>
                                    <td>
                                        @if ($user->cap_do == 0)
                                            <span class="badge badge-info">Admin</span>
                                        @else
                                            <span class="badge badge-warning">Super Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->tinh_trang == 1)
                                            <span class="badge badge-success">Đang hoạt động</span>
                                        @else
                                            <span class="badge badge-danger">Khóa</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex action-button">
                                            <a href="{{ route('user.view_update', ['ma' => $user->ma]) }}"
                                                class="btn btn-info btn-xs light px-2">
                                                <i class="fa fa-pencil" style="font-size: 18px"></i>
                                            </a>

                                            <form action="{{ route('user.reissue_password')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="ma" value="{{ $user->ma }}">
                                                <button type="submit" onclick="return confirm('Bạn có muốn cấp lại mật khẩu không?')" class="btn btn-warning btn-xs light px-2"
                                                    style="margin-left: 5px" style="outline: none">
                                                    <i class="fa fa-key" style="font-size: 18px"></i></button>
                                            </form>

                                            <form action="{{ route('user.delete')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="ma" value="{{ $user->ma }}">
                                                <button type="submit" onclick="return confirm('Bạn có xóa người dùng này không?')" class="btn btn-danger btn-xs light px-2"
                                                    style="margin-left: 5px" style="outline: none">
                                                    <i class="fa fa-trash" style="font-size: 18px"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <script>
                                    function showEmailUser(email, ma) {
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <p>Chú ý: Mật khẩu được cấp lại mặc định là: `123456`</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Datatable -->
    <script src="{{ asset('public/backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/plugins-init/datatables.init.js') }}"></script>
@endpush
