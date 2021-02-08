@extends('layouts.default')

@section('content')

<div class="edit">
<h2>Ajouter un module</h2>
    <form action="/modules" method="post">
        @csrf
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
        <input type="hidden" name="ordre" id="ordre" value="{{ $modulesCount }}">
        <input type="hidden" name="formation_id">
        <input type="submit">
    </form>

</div>


@endsection