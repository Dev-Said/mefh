@extends('home')

@section('list')

<h1>Users</h1>

<div>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Admin</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @each('users.one', $users, 'user')

        </tbody>
    </table>
</div>
@endsection