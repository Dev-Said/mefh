<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />
</head>

<body>
    <div class="container">
        <div class="nav">
            <ul>
                <a href="/users">
                    <li class="{{ 'users' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-user"></i>
                    Users</li>
                </a>
                <a href="/formations">
                    <li class="{{ 'formations' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                     Formations</li>
                </a>
                <a href="/modules">
                    <li class="{{ 'modules' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    Modules</li>
                </a>
                <a href="/chapitres">
                    <li class="{{ 'chapitres' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-book-reader"></i>
                    Chapitres</li>
                </a>
                <a href="/quizzes">
                    <li class="{{ 'quizzes' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-list"></i>
                    Quiz</li>
                </a>
                <a href="/questions">
                    <li class="{{ 'questions' == request()->path() ? 'active' : '' }}">
                    <i class="far fa-question-circle"></i>
                    Questions</li>
                </a>
                <a href="/reponses">
                    <li class="{{ 'reponses' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-check"></i>
                    Reponses</li>
                </a>
                </a>
                <a href="/faqsres">
                    <li class="{{ 'faqsres' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-info"></i>
                    Questions essentielles</li>
                </a>
                <a href="/ressources">
                    <li class="{{ 'ressources' == request()->path() ? 'active' : '' }}">
                    <i class="far fa-comment-dots"></i>
                    Ressources</li>
                </a>
                <a href="/dashboard">
                    <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    Dashboard</li>
                </a>
                <!-- <a href="{{ request()->path() .'/create' }}">
                    <li class="nouveau {{ request()->is('*/create') ? 'hide' : '' }}">Nouveau</li>
                </a> -->

                @if(Auth::check())
                <a href="/logout">
                    <li class="connex">Déconnexion</li>
                </a>
                @else
                <a href="/login">
                    <li class="connex">Connexion</li>
                </a>
                <a href="/register">
                    <li class="connex">Inscription</li>
                </a>
                @endif

            </ul>
        </div>

        @yield('content')


    </div>

</body>

</html>