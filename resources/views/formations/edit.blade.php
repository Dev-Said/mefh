@extends('layouts.default')

@section('content')

<div class="edit">
    <form action="/formations/{{ $formation->id }}" method="post">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $formation->titre }}">
        @error('titre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $formation->description }}">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>


@endsection