<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />
</head>

<body class="myBody">
    <div class="container">
        <div class="nav">
            <ul>
                <a href="/users">
                    <li class="{{ 'users' == request()->path() ? 'active' : '' }}">Users</li>
                </a>
                <a href="/formations">
                    <li class="{{ 'formations' == request()->path() ? 'active' : '' }}">Formations</li>
                </a>
                <a href="/modules">
                    <li class="{{ 'modules' == request()->path() ? 'active' : '' }}">Modules</li>
                </a>
                <a href="/chapitres">
                    <li class="{{ 'chapitres' == request()->path() ? 'active' : '' }}">Chapitres</li>
                </a>
                <a href="/quizzes">
                    <li class="{{ 'quizzes' == request()->path() ? 'active' : '' }}">Quiz</li>
                </a>
                <a href="/questions">
                    <li class="{{ 'questions' == request()->path() ? 'active' : '' }}">Questions</li>
                </a>
                <a href="/reponses">
                    <li class="{{ 'reponses' == request()->path() ? 'active' : '' }}">Reponses</li>
                </a>
                </a>
                <a href="/faqsres">
                    <li class="{{ 'faqsres' == request()->path() ? 'active' : '' }}">Faqs</li>
                </a>
                <a href="{{ request()->path() .'/create' }}">
                    <li class="nouveau {{ request()->is('*/create') ? 'hide' : '' }}">Nouveau</li>
                </a>

                @if(Auth::check())
                <a href="/dashboard">
                    <li class="{{ 'dashboard' == request()->path() ? 'active' : 'connex' }}">Dashboard</li>
                </a>
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