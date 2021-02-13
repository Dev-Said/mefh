@extends('layouts.default')

@section('content')
{{ $errors->first('file', '<div class="alert alert-danger">:message</div>') }}
<div class="edit">

    <form action="/chapitres" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Ajouter un chapitre</h2>
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>  
        <label for="fichier_video">Fichier_video</label>
        <input type="file" id="fichier_video" name="fichier_video"  required >
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
        <label for="ordre">Ordre</label>
        <input type="text" name="ordre" id="ordre" required>
        <label for="module_id">Module_id</label>
        <input type="text" name="module_id" id="module_id" required>
        <!-- <input type="hidden" name="duree" value="30"> -->
        <input type="submit" value="envoyer">
    </form>

</div>


@endsection