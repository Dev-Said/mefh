@extends('layouts.default')

@section('content')

<div class="contenaire_list">

    <h1 class="titre_list">Ressources</h1>

    <a href="{{ '/ressources/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter une ressource</button>
    </a>

    <form action="/ressourcesOneQuestion" method="post" class="contenaire_list_form">
        @csrf
        <p>
            <select name="formation" class="contenaire_list_select">
            <option value="all formations" hidden disabled selected>Sélectionnez une formation</option>
            <option value="all formations">Sélectionner toutes les formations</option>
                @foreach($formations as $formation)
                <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                @endforeach
            </select>
        </p>       
        <input type="submit" value="Sélectionner" class="contenaire_list_submit">
    </form>

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