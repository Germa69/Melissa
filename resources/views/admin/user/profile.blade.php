@extends('admin_layout')

@push('css')
    <link href="{{ asset('public/backend/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">

            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('public/uploads/avatar/' . $user->avatar) }}"
                                    class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ $user->ten }}</h4>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <span id="showEmail-{{ $user->ma }}" style="cursor: pointer;"
                                        onclick="showEmailProfile('{{ $user->email }}', {{ $user->ma }})">[email
                                        protected]</span>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                        aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewbox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item">
                                            <a href="#about-me" data-toggle="tab">
                                                <i class="fa fa-user-circle text-primary mr-2"></i>
                                                Th??ng tin c?? nh??n
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="#profile-settings" data-toggle="tab">
                                                <i class="fa fa-users text-primary mr-2"></i> C??i ?????t</li>
                                            </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                            class="nav-link active show">Th??ng tin c?? nh??n</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                            class="nav-link">C??i ?????t</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-personal-info" style="margin-top: 30px">
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">T??n <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ $user->ten }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">?????a ch??? <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ $user->dia_chi }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">S??? ??i???n tho???i <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>{{ $user->sdt }}</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <span id="showEmailTap" style="cursor: pointer;"
                                                        onclick="showEmailTap('{{ $user->email }}')">[email
                                                        protected]</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">C???p ????? <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>
                                                    @if ($user->cap_do == 1)
                                                        Super Admin
                                                    @else
                                                        Admin
                                                    @endif
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form action="{{ route('user.profile_update', ['ma' => $user->ma]) }}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>T??n</label>
                                                            <input type="text" name="ten" placeholder="Nh???p t??n..." class="form-control" value="{{ $user->ten }}">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>S??? ??i???n tho???i</label>
                                                            <input type="text" name="sdt" placeholder="Nh???p s??? ??i???n tho???i..."
                                                                class="form-control" value="{{ $user->sdt }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????a ch???</label>
                                                        <input type="text" name="dia_chi" placeholder="Nh???p ?????a ch???..."
                                                            class="form-control" value="{{ $user->dia_chi }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" name="email" placeholder="Nh???p email..."
                                                            class="form-control" value="{{ $user->email }}">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>M???t kh???u</label>
                                                            <input type="password" name="mat_khau" placeholder="Nh???p m???t kh???u..." class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Avatar</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input">
                                                                <label class="custom-file-label">Ch???n t???p tin</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">C???p nh???t</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('public/backend/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>

    <script>
        function showEmailProfile(email, ma) {
            const showEmail = document.querySelector(`#showEmail-`+ma);
            showEmail.textContent = email;
        }

        function showEmailTap(email) {
            const showEmail = document.querySelector(`#showEmailTap`);
            showEmail.textContent = email;
        }
    </script>
@endpush
