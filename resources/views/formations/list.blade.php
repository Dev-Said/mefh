@extends('home')

@section('list')


<div class="contenaire_list">
    <h1 class="titre_list">Formations</h1>

    <a href="{{ '/formations/create' }}">
        <button class="button_nouveau">Ajouter une formation</button>
    </a>

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
</div>

@endsection