<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html"
            target="_blank">
            <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">Creative Tim</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link {{ request()->routeIs('adminDashboard') ? 'bg-primary text-white' : '' }}"
                    href="{{ route('adminDashboard') }}">
=======
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'bg-primary text-white' : '' }}"
                    href="{{ route('dashboard') }}">
>>>>>>> a63be01e4273c25b6e4374d985539731f3ea02f0
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('stockCode.create') ? 'bg-primary text-white' : '' }}"
                    href="{{ route('stockCode.create') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Stock Code</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pages/rtl') ? 'bg-primary text-white' : '' }}"
                    href="../pages/rtl.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.show', 1) ? 'bg-primary text-white' : '' }}"
                    href="{{ route('users.show', 1) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
<<<<<<< HEAD
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.create') ? 'bg-primary text-white' : '' }}" href="{{ route('users.create') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
=======
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.create') ? 'bg-primary text-white' : '' }}"
                    href="{{ route('users.create') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
>>>>>>> a63be01e4273c25b6e4374d985539731f3ea02f0
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Create Users</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.index', 1) ? 'bg-primary text-white' : '' }}"
                    href="{{ route('users.index', 1) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Show Users</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
