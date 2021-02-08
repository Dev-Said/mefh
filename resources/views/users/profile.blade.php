@extends('home')

@section('list')

<h1>Profil</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Admin</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{$user->nom}}
            </td>
            <td>
                {{$user->prenom}}
            </td>
            <td>
                {{$user->sexe}}
            </td>
            <td>
                {{$user->admin}}
            </td>
            <td>
                {{$user->email}}
            </td>
        </tr>
    </tbody>
</table>

<h2>Quiz completé</h2>

@forelse ($user->quizzes as $quiz)
<h4>{{ $quiz->titre }}</h4>
@empty
<h4>N'a pas encore completé de quiz</h4>
@endforelse

@endsection