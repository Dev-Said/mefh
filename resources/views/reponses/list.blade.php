@extends('home')

@section('list')

<h1>Réponses</h1>

<div>

    <table>
        <thead>
            <tr>
                <th>Réponse</th>
                <th>Type</th>
                <th>Is_correct</th>
                <th>Question_id</th>
                @if(Auth::check())
                <th></th>
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody>

            @each('reponses.one', $reponses, 'reponse')

        </tbody>
    </table>
</div>
@endsection