@extends('home')

@section('list')

<div class="contenaire_list">

    <h1 class="titre_list">Ressources</h1>

    <a href="{{ '/ressources/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter une ressource</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Texte</th>
                    <th>Formation</th>
                    @if(Auth::check())
                    <th></th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @each('ressources.one', $ressources, 'ressource')

            </tbody>
        </table>
    </div>
</div>
@endsection