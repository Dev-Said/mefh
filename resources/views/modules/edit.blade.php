@extends('layouts.default')

@section('content')

<div class="edit">
    <form action="/modules/{{ $module->id }}" method="post">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $module->titre }}" required>
        <label for="description">Description</label>
        <input type="description" name="description" id="description" value="{{ $module->description }}" required>
        <label for="ordre">Ordre</label>
        <input type="number" name="ordre" id="ordre" value="{{ $module->ordre }}" required>
        <input type="hidden" name="formations_id" id="formations_id" value="1">
        <input type="submit">
    </form>

</div>


@endsection