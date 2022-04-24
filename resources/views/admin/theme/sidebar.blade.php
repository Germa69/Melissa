<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{ asset('public/uploads/avatar/'. Session::get('avatar')) }}" alt="">
                <a href="{{ route('user.profile', ['ma' => Session::get('ma_admin')]) }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{ Session::get('ten_admin') }}</h5>
            <span id="showEmail" style="cursor: pointer;" onclick="showEmail('{{ Session::get('email') }}')">[email
                protected]</span>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}">Dashboard Light</a></li>
                    <li><a href="{{ route('dashboard_dark') }}">Dashboard Dark</a></li>
                </ul>
            </li>
            <li class="nav-label">Manage</li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-101-safari"></i>
                    <span class="nav-text">Xe</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('car.view_all') }}">Danh sách xe</a>
                    </li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-061-puzzle"></i>
                    <span class="nav-text">Hãng xe</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('brand.view_all') }}">Danh sách hãng xe</a>
                    </li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-032-briefcase"></i>
                    <span class="nav-text">Hợp đồng</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('contract.manage_contract') }}">Danh sách hợp đồng</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-028-user-1"></i>
                    <span class="nav-text">Khách hàng</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('customer.view_all') }}">Danh sách khách hàng</a>
                    </li>
                </ul>
            </li>

            <li class="nav-label">Security</li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-073-settings"></i>
                    <span class="nav-text">Người dùng</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('user.view_all') }}">Danh sách người dùng</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>MELISSA Admin Dashboard</strong> © 2022 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by Nguyen Vy Anh</p>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function showEmail(email) {
            const showEmail = document.querySelector(`#showEmail`);
            showEmail.textContent = email;
        }
    </script>
@endpush
