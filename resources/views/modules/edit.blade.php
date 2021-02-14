@extends('layouts.default')

@section('content')

<div class="edit">
    <form action="/modules/{{ $module->id }}" method="post">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $module->titre }}">
        <label for="description">Description</label>
        <input type="description" name="description" id="description" value="{{ $module->description }}">
        <input type="hidden" name="ordre" value="{{ $module->ordre }}">
        <input type="hidden" name="formation_id" value="{{ $module->formation_id }}">
        <input type="submit">
    </form>

</div>


@endsection