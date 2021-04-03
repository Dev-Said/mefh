@extends('layouts.default')

@section('content')

<div class="edit">
<form action="/formations/{{ $formation->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h2>Modifier une formation</h2>
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
        <label for="langue">Langue</label>
        <select name="langue" id="langue">
            <option value="{{ $formation->langue }}">{{ $formation->langue }}</option>
            <option value="Français">Français</option>
            <option value="Néerlendais">Néerlendais</option>
            <option value="Anglais">Anglais</option>
            <option value="Allemand">Allemand</option>
        </select>
        @error('langue')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="image_formation">Choisissez une image si vous souhaitez remplacer l'image actuelle</label>
        <input type="file" name="image_formation" id="image_formation">
        @error('image_formation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="hidden" name="ordre" value="{{ $formation->ordre }}">
        <input type="submit">
    </form>

</div>


@endsection