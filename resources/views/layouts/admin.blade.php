<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <title>@yield('title')</title>
</head>
<body>

    <nav class="navbar navbar--open" id="navbar">
        <h3 class="nav__name">@yield('name')</h3>
    
        <ul class="nav__links">

            <li>
                <a class="nav__link {{ (request()->is('admin/dashboard')) ? 'link--active' : '' }}" href="index.html">
                    <i class="nav__icon fas fa-home"></i>Dashboard
                </a>
            </li>

{{--             <li>
                <label class="nav__link" for="id-hry">
                    <i class="nav__icon fas fa-puzzle-piece"></i>Tests
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </label>
                <input class="drop" type="checkbox" id="id-hry">
                <div class="nav__dropdown {{ (request()->is('admin/*')) ? 'nav--active' : '' }}">
                    <a class="nav__link link--second {{ (request()->is('admin/tests')) ? 'nav--active' : '' }}" href="{{ route('admin.tests') }}">
                        <i class="nav__icon fas fa-puzzle-piece"></i>Create test
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/tests')) ? 'nav--active' : '' }}" href="{{ route('admin.tests') }}">
                        <i class="nav__icon fas fa-puzzle-piece"></i>Create Questions
                    </a>
                </div>
            </li> --}}

            <li>
                <span class="nav__link link--dropdown">
                    <i class="nav__icon fas fa-puzzle-piece"></i>Tests
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </span>
                <div class="nav__dropdown">
                    <a class="nav__link link--second {{ (request()->is('admin/dashboard')) ? 'link--active' : '' }}" href="{{ route('admin.tests') }}">
                        <i class="nav__icon fas fa-puzzle-piece"></i>Create test
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/tests')) ? 'link--active' : '' }}" href="{{ route('admin.tests') }}">
                        <i class="nav__icon fas fa-puzzle-piece"></i>Create Questions
                    </a>
                </div>
            </li>

        </ul>
    </nav>
    
    <section class="page__content" id="page-content">
    
        <header class="header" id="page-header">
            <span class="header__icon" onclick="openNavbar()"><i class="fas fa-bars"></i></span>
            <a class="header__link" href="{{ route('admin.logout') }}">Logout</a>
        </header>

        @yield('content')

    </section>

    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
</body>
</html>