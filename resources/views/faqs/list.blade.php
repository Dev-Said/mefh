@extends('home')

@section('list')

<h1>Chapitres</h1>

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

            @each('chapitres.one', $chapitres, 'chapitre')

        </tbody>
    </table>
</div>
@endsection