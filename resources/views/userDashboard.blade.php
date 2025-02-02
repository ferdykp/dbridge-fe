<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>TES</h1>
    <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
            <a href="javascript:void(0)" class="nav-link text-white font-weight-bold px-0"
                onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign Out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    </ul>

</body>

</html>
