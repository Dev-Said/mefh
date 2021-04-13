@extends('layouts.default')

@section('content')


<div class="contenaire_list">

    <h1 class="titre_list">Chapitres</h1>

    <a href="{{ '/chapitres/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter un chapitre</button>
    </a>

    <form action="/chapitresOneModule" method="post" class="contenaire_list_form">
        @csrf
        <p>
            <select name="module" class="contenaire_list_select">
            <option value="all modules" hidden disabled selected>Sélectionnez un module</option>
            <option value="all modules">Sélectionner tous les modules</option>
                @foreach($modules as $module)
                <option value="{{ $module->id }}">{{ $module->titre }}</option>
                @endforeach
            </select>
        </p>       
        <input type="submit" value="Sélectionner" class="contenaire_list_submit">
    </form>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Module</th>
                    <th>Ordre</th>
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