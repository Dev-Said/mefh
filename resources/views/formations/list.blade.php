@extends('home')

@section('list')

<h1>Formations</h1>

<div>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                @if(Auth::check())
                <th></th>
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody>

            @each('formations.one', $formations, 'formation')

        </tbody>
    </table>
</div>
@endsection