@extends('home')

@section('list')

<h1>Dashboard</h1>


<table>
    <thead>
        <tr>
            <th>Model</th>
            <th>Nombre d'entrées</th>
            <th>Dernière valeur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Users</td>
            <td>{{ $usersCount }}</td>
            <td>{{ $usersLast }}</td>
        </tr>
        <tr>
            <td>Modules</td>
            <td>{{ $modulesCount }}</td>
            <td>{{ $modulesLast }}</td>
        </tr>
        <tr>
            <td>Quiz</td>
            <td>{{ $quizzesCount }}</td>
            <td>{{ $quizzesLast }}</td>
        </tr>
        <tr>
            <td>Questions</td>
            <td>{{ $questionsCount }}</td>
            <td>{{ $questionsLast }}</td>
        </tr>
        <tr>
            <td>Reponses</td>
            <td>{{ $reponsesCount }}</td>
            <td>{{ $reponsesLast }}</td>
        </tr>
    </tbody>
</table>


@endsection