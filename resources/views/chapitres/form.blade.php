@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/chapitres" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Ajouter un chapitre</h2>
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
        @error('titre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="fichier_video">Fichier_video</label>
        <input type="file" id="fichier_video" name="fichier_video" accept="video/*">
        @error('fichier_video')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="ordre">Ordre</label>
        <input type="text" name="ordre" id="ordre" value="{{ old('ordre') }}">
        @error('ordre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="module_id">Module_id</label>
        <input type="text" name="module_id" id="module_id" value="{{ old('module_id') }}">
        @error('module_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="envoyer">
    </form>

</div>


@endsection