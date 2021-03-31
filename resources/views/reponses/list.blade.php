@extends('home')

@section('list')

<div class="contenaire_list">

    <h1 class="titre_list">Réponses</h1>

    <a href="{{ '/reponses/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter une réponse</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Réponse</th>
                    <th>Is_correct</th>
                    <th>Question</th>
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
</div>
@endsection