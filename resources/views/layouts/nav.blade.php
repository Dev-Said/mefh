<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact.css') }}" />

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

<nav class="cd-auto-hide-header menu" id="navigation">

<input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
        <label for="toggle-nav" class="nav-button"></label>

    <ul class="nav menu nav-inner" id="first_ul">
        <li class="logo">
            <img src="/storage/images/logoMix.png" alt="logo" />
        </li>
        <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="/">{{ __('messages.accueil') }}</a>
        </li>
        <li class="nav-item {{ 'formations-liste' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="formations-liste">Formations</a>
        </li>
        <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="contact">Contact</a>
        </li>




        @if(Auth::check())
            @if(Auth::user()->admin)
            <li class="connex nav-item {{ 'users' == request()->path() ? 'active' : '' }}">
                <a href="/users"> Admin</a>
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

        @php ($lang = Lang::locale())
        <div class="dropdown">
            <button class="dropbtn"><img src="/storage/images/{{ $lang }}.png" alt="choix de la langue" /></button>
            <div class="dropdown-content">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="{{ $lang == $localeCode ? 'hide' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img src="/storage/images/{{ $localeCode }}.png" alt="langue {{ $localeCode }}" />
                </a>
                @endforeach
            </div>
        </div>
    </ul>
</nav>
    @yield('content')

</body>

</html>




<script>
    $(document).ready(function() {

        $(window).scroll(function() {

            if ($(window).scrollTop() > 1) {
                $('.menu').css({
                    background: '#ffffff',
                    height: '80px',
                    borderBottom: 'white solid 2',
                    'box-shadow': 'rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px',
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

                $('.contenaireFormations').css({
                    marginTop: '130px',
                });

            }

            if ($(window).scrollTop() <= 1) {
                $('.menu').css({
                    position: 'relative',
                    background: '#ffffff',
                    height: '100px',
                    'align-items': 'center',
                    'box-shadow': 'none',
                });

                $('.logo img').css({
                    height: '100px',
                });

                $('.contenaireFormations').css({
                    marginTop: '30px',
                });

            }
        })
    });
</script>