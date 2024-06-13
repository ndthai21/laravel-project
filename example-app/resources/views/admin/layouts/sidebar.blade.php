<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <span class="ms-1 font-weight-bold text-white">Quản lý hồ sơ sinh viên 5 tốt</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'bg-gradient-info active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Giới thiệu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('users.show') && request()->route('user')->id == auth()->user()->id ? 'bg-gradient-info active' : '' }}"
                    href="{{ route('users.show', auth()->user()->id) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">manage_accounts</i>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin cá nhân</span>
                </a>
            </li>

            <li class="nav-item">
                @can('view profile')
                    <a class="nav-link text-white {{ request()->routeIs('profiles.*') ? 'bg-gradient-info active' : '' }}"
                        href="{{ route('profiles.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">post_add</i>
                        </div>
                        <span class="nav-link-text ms-1">Hồ sơ</span>
                    </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view profileSubmit 1')
                    <a class="nav-link text-white {{ request()->routeIs('profiles.*') ? 'bg-gradient-info active' : '' }}"
                        href="{{ route('profiles.teacherAIndex') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Hồ sơ</span>
                    </a>
                @endcan
            </li>

            <li class="nav-item">
                @can('view profileSubmit 2')
                    <a class="nav-link text-white {{ request()->routeIs('profiles.*') ? 'bg-gradient-info active' : '' }}"
                        href="{{ route('profiles.teacherBIndex') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Hồ sơ</span>
                    </a>
                @endcan
            </li>

            <li class="nav-item">
                @can('delete user')
                    <a class="nav-link text-white {{ request()->routeIs('users.*') ? 'bg-gradient-info active' : '' }}"
                        href="{{ route('users.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                @endcan
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Đăng xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
