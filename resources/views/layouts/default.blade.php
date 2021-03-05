<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;

        }

        * {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .nav {
            border-right: solid 1px #e9e9e9;
            height: 100vh;
            width: 200px;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
        }

        ul {
            width: 200px;
            list-style-type: none;
            padding: 0;

        }

        li {
            height: 70px;
            width: 100%;
            border-bottom: solid 1px #e9e9e9;
            padding: 0 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .active {
            background-color: #f7f7f7;
            color: #292b2c;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .nouveau {
            background-color: #4d5051;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .connex {
            letter-spacing: 1px;
            background-color: #f5fbfe;
        }

        .list {
            width: calc(100% - 200px);
            height: 100vh;
            overflow: scroll;
            padding: 10px 20px;
            position: absolute;
            top: 0;
            left: 200px;
        }



        table {
            border-spacing: 0 10px;
        }

        td,
        th {
            padding-left: 15px;
        }

        td {
            border-bottom: solid 1px #f2f2f2;
            height: 35px;
        }

        th {
            text-align: left;
            background-color: #f7f7f7;
            padding: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            flex-wrap: nowrap;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
            margin-bottom: 10px;
            color: #5b5b5b;
            width: auto;
            /* border: solid red 1px; */
        }

        .edit {
            overflow: auto;
            padding: 10px 20px;
            position: absolute;
            top: 50px;
            left: 15%;
            border: #e0e0e0 solid 1px;
            border-radius: 5px;
            width: 600px;
            height: auto;
            display: flex;
            flex-direction: column;
            
        }


        .edit input,
        .edit select {
            margin: 0;
            padding-left: 10px;
            width: 100%;
            height: 45px;
            border: #e1e1e1 solid 1px;
            border-radius: 5px;
        }

        input[type=submit] {
            height: 45px;
            min-width: 90px;
            border-radius: 5px;
        }

        .supp {
            background-color: #d9534f;
            color: white;
        }

        .modif {
            background-color: #5bc0de;
            color: white;
        }

        .formquiz {
            width: 100%;
        }

        .formQuiz {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .formQuiz input[type=submit] {
            margin: 0;
            width: 60px;
            height: 30px;
            border: #e1e1e1 solid 1px;
        }
        #quizform {
            display: flex;
            flex-direction: column;
        }

        .endRight {
            margin-left: auto;
        }

        .edit input[type=radio],
        .edit input[type=checkbox] {
            height: 18px;
            width: 20px; 
        }

        .divradio{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .divradio label {
            margin-right: 15px;
        }

        .hide{
            display: none;
        }


    </style>
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