@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/formations" method="post">
        @csrf
        <h2>Ajouter une formation</h2>
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
        @error('titre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>


@endsection