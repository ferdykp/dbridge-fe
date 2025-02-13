<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo-mining-bg.jpg') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-mining-bg.jpg') }}">
        <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet">
        <title>
            D-Bridge
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->
        {{-- <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" /> --}}
    </head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <main class="main-content position-relative border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                @php
                    $segments = request()->segments();
                    $lastSegment = end($segments);
                    $breadcrumb = ucfirst(str_replace('-', ' ', $lastSegment));
                @endphp

                <div class="p-3 rounded-3" style="background-color: rgba(128, 0, 0, 0.8);">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="opacity-75 text-white" href="{{ url('/') }}">Home</a>
                            </li>
                            @foreach ($segments as $index => $segment)
                                @php
                                    $url = url(implode('/', array_slice($segments, 0, $index + 1)));
                                    $isLast = $loop->last;
                                @endphp
                                <li class="breadcrumb-item text-sm {{ $isLast ? 'text-white active' : '' }}"
                                    aria-current="{{ $isLast ? 'page' : '' }}">
                                    @if ($isLast)
                                        {{ ucfirst(str_replace('-', ' ', $segment)) }}
                                    @else
                                        <a class="opacity-75 text-white"
                                            href="{{ $url }}">{{ ucfirst(str_replace('-', ' ', $segment)) }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                        <h6 class="font-weight-bolder text-white mb-0">{{ $breadcrumb }}</h6>
                    </nav>
                </div>

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div> --}}
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <!-- User Dropdown -->
                        <div class="custom-dropdown-box">
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a class="nav-link dropdown-toggle text-white font-weight-bold px-0" id="navbarDropdown"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-haspopup="true">
                                    <i class="ni ni-single-02 text-sm opacity-10"></i>
                                    <span class="d-sm-inline d-none ms-2">Halo, {{ auth()->user()->name }}</span>
                                    <i class="ni ni-bold-down ms-2 text-sm opacity-10"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('users.show', 1) ? 'bg-primary text-white' : '' }}"
                                            href="{{ route('users.show', 1) }}">
                                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="ni ni-curved-next text-dark text-sm opacity-10"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </div>

                        <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center mx-3">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid ">
            <div class="gradient">
                <div class="container">
                    {{-- <img src="{{ asset('images/error/500.png') }}" class="img-fluid mb-4 w-50" alt=""> --}}
                    <h2 class="mb-0 mt-4 text-white">Oops! It Looks Like Your Excel Data Doesn't Match</h2>
                    <p class="mt-2 text-white">Try Re-Uploading.</p>
                    <a class="btn bg-white text-primary d-inline-flex align-items-center"
                        href="{{ route('dashboard') }}">Back to Home</a>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>
