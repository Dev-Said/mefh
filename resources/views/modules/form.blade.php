@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/modules" method="post">
        @csrf
        <h2>Ajouter un module</h2>
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
        <input type="hidden" name="ordre" id="ordre" value="{{ $modulesCount }}">
        <input type="hidden" name="formation_id" value="1">
        <input type="submit">
    </form>

</div>


@endsection