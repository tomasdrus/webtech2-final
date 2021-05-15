<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <title>@yield('title')</title>
</head>
<body class="bg-gray-200">

    <nav class="navbar navbar--open" id="navbar">
        <h3 class="nav__name">{{ $LoggedTeacherInfo['forename'] . ' ' . $LoggedTeacherInfo['surname'] }}</h3>
    
        <ul class="nav__links">

            <li>
                <a class="nav__link {{ (request()->is('admin/dashboard')) ? 'link--active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav__icon far fa-tachometer-alt"></i>Dashboard
                </a>
            </li>

            <li>
                <span class="nav__link link--dropdown">
                    <i class="nav__icon far fa-question"></i>Questions
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </span>
                <div class="nav__dropdown">
                    <a class="nav__link link--second {{ (request()->is('admin/question')) ? 'link--active' : '' }}" href="{{ route('admin.question') }}">
                        <i class="nav__icon far fa-question-square"></i>All questions
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/question/create')) ? 'link--active' : '' }}" href="{{ route('admin.question.create') }}">
                        <i class="nav__icon far fa-plus-square"></i>Create question
                    </a>
                </div>
            </li>

            <li>
                <span class="nav__link link--dropdown">
                    <i class="nav__icon far fa-abacus"></i>Exams
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </span>
                <div class="nav__dropdown">
                    <a class="nav__link link--second {{ (request()->is('admin/exam')) ? 'link--active' : '' }}" href="{{ route('admin.exam') }}">
                        <i class="nav__icon far fa-copy"></i>All exams
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/exam/create')) ? 'link--active' : '' }}" href="{{ route('admin.exam.create') }}">
                        <i class="nav__icon far fa-file-plus"></i>Create exam
                    </a>
                </div>
            </li>

            <li>
                <span class="nav__link link--dropdown">
                    <i class="nav__icon far fa-users"></i>Student exams
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </span>
                <div class="nav__dropdown">
                    <a class="nav__link link--second {{ (request()->is('admin/student')) ? 'link--active' : '' }}" href="{{ route('admin.student') }}">
                        <i class="nav__icon far fa-user"></i>Active student exams
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/student/finished')) ? 'link--active' : '' }}" href="{{ route('admin.student.finished') }}">
                        <i class="nav__icon far fa-user-graduate"></i>Finished student exams
                    </a>
                </div>
            </li>

            <li>
                <span class="nav__link link--dropdown">
                    <i class="nav__icon far fa-folder-open"></i>Project info
                    <i class="nav__icon__drop fas fa-chevron-down"></i>
                </span>
                <div class="nav__dropdown">
                    <a class="nav__link link--second {{ (request()->is('admin/info')) ? 'link--active' : '' }}" href="{{ route('admin.info') }}">
                        <i class="nav__icon far fa-clipboard-list"></i>Tasks list
                    </a>

                    <a class="nav__link link--second {{ (request()->is('admin/info/documentation')) ? 'link--active' : '' }}" href="{{ route('admin.info.documentation') }}">
                        <i class="nav__icon far fa-file-code"></i>Documentation
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
    @yield('script')
</body>
</html>