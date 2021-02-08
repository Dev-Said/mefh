<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MEFH</title>

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
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" />
    <link rel="stylesheet" type="text/css" href="css/accueil.css" />
    <link rel="stylesheet" type="text/css" href="css/formation.css" />
    <link rel="stylesheet" type="text/css" href="css/modules.css" />
    <link rel="stylesheet" type="text/css" href="css/video.css" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <style>
        body {
            font-family: 'Nunito';
            background-color: white;
        }
    </style>
</head>

<body class="antialiased">

    <ul class="nav">
        <div class="logo">
            <img src="/storage/images/M.png" alt="logo">
        </div>
        <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item {{ 'formation' == request()->path() ? 'active' : '' }}">
            <!-- <a class="nav-link" href="formation"><button id="buttonAccueil">Suivre la formation</button></a> -->
            <a class="nav-link" href="formation">Formation</a>
        </li>
        <li class="nav-item {{ 'questions' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="questions">Questions essentielles</a>
        </li>
        <li class="nav-item {{ 'resources' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="resources">Resources</a>
        </li>
        <li class="nav-item {{ 'certificat' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="certificat">Certificat</a>
        </li>
        <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="contact">Contact</a>
        </li>
        <li class="connex nav-item {{ 'register' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="register"><button id="buttonconnex">Inscription</button></a>
        </li>
    </ul>

    @yield('content')

</body>

</html>