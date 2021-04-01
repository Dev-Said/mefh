<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>MEFH</title>
    <base href="/public">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Unna:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accueil.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/formation.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/video.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/listeChapitres.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stepper.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <style>
        body {
            font-family: 'Nunito';
            background-color: white;
        }
    </style>
    <script>
        var auth = <?= json_encode($auth); ?>
    </script>

</head>

<body class="antialiased">

    <ul class="nav menu">
        <li class="logo">
            <img src="/storage/images/logo.png" alt="logo" />
        </li>
        <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item {{ 'formations-liste' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="formations-liste">Formations</a>
        </li>
        <li class="nav-item {{ 'questionsEssentielles' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="questionsEssentielles">Questions essentielles</a>
        </li>
        <li class="nav-item {{ 'resources' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="resources">Ressources</a>
        </li>
        <li class="nav-item {{ 'certificat' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="certificat">Certificat</a>
        </li>
        <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="contact">Contact</a>
        </li>




        @if(Auth::check())
        Bienvenue {{{Auth::user()->prenom}}}
        @if(Auth::user()->admin)
        <li class="connex nav-item {{ 'users' == request()->path() ? 'active' : '' }}">
            <a href="/users">Admin</a>
        </li>
        @endif
        <li class="connex nav-item {{ 'logout' == request()->path() ? 'active' : '' }}">
            <a href="/logout"><button id="buttonconnex">Déconnexion</button></a>
        </li>
        @else
        <li class="connex nav-item {{ 'login' == request()->path() ? 'active' : '' }}">
            <a href="/login"><button id="buttonconnex">Connexion</button></a>
        </li>
        <li class="connex nav-item {{ 'register' == request()->path() ? 'active' : '' }}">
            <a href="/register"><button id="buttonconnex">Inscription</button></a>
        </li>
        @endif
    </ul>

    @yield('content')

</body>

</html>

<script>
    $(document).ready(function() {

        $(window).scroll(function() {

            if ($(window).scrollTop() > 1) {
                $('.menu').css({
                    background: '#fdfdfd',
                    height: '80px',
                    border: '#a1a1a1 solid',
                    'border-width': '0 0 1px 0',
                    borderBottom: 'white solid 2',
                    'box-shadow': '0 4px 8px 0 rgba(0, 0, 0, 0.2)',
                    'align-items': 'center',
                    position: 'fixed',
                    top: '0',
                    left: '0',
                });

                $('.menu a:link').css({
                    color: '#1c2168',
                });

                $('.logo img').css({
                    height: '80px',
                });

            }

            if ($(window).scrollTop() <= 1) {
                $('.menu').css({
                    position: 'none',
                    background: '#fdfdfd',
                    height: '100px',
                    border: 'white2 solid',
                    'border-width': '0 0 1px 0',
                    'align-items': 'center',
                    'box-shadow': 'none',
                });

                $('.logo img').css({
                    height: '100px',
                });

            }
        })
    });
</script>