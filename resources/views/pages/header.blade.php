<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="#" class="navbar-brand">
                <img src="{{ asset('public/common/logo/logo2.jpg') }}" alt="" style="width: 115px; height: 70px;">
            </a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first nav-list">
                <li class="active">
                    <a href="{{ route('home_page') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('pages.fleet') }}">Một số mẫu xe</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Thêm<span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('pages.blog') }}">Tin tức</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.about_us') }}">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.team') }}">Đội</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.terms') }}">Điều kiện</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('pages.contact') }}">Liên hệ với chúng tôi</a>
                </li>

                @if (!Session::get('ma_khach_hang'))
                    <li><a href="{{ route('customer.login') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('customer.register') }}">Đăng kí</a></li>
                @endif

                
                @if (Session::get('ma_khach_hang'))
                <li>
                    <a href="{{ route('customer.profile', ['ma' => Session::get('ma_khach_hang')]) }}">
                        <i class="fa fa-user"></i> {{ Session::get('ten_khach_hang') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</section>

@push('scripts')
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuDropdown = document.querySelector('a.dropdown-toggle');

        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = 'active'
            } 
        }
    </script>
@endpush
