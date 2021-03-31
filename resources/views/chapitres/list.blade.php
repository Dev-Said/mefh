@extends('home')

@section('list')


<div class="contenaire_list">

    <h1 class="titre_list">Chapitres</h1>

    <a href="{{ '/chapitres/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter un chapitre</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Module</th>
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
</div>
@endsection