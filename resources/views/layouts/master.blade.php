<!DOCTYPE html>
<html lang="en">

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
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .custom-dropdown-box {
            background-color: #8e121f;
            /* opacity: 0.9; */
            border-radius: 20px;
            padding: 10px;
            z-index: 1;
            /* Optional: To add some space inside the box */
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 position-absolute w-100"
        style="background-image: url('/assets/img/mining3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0.8;">
    </div>
    @include('components.sidebar')

    <main class="main-content position-relative border-radius-lg ">

        @include('components.navbar')
        @yield('content')
    </main>
    @include('components.script')
</body>

</html>
