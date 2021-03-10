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
        <textarea   id="description" name="description" value="{{ old('description') }}"></textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="module_id">Module_id</label>

        <p>
            <select name="module_id" id="module_id">
            <option value="">Sélectionnez un module</option>
                @foreach($modules as $module)
                <option value="{{ $module->id }}">{{ $module->titre }}</option>
                @endforeach
            </select>
        </p>


        <!-- <input type="text" name="module_id" id="module_id" value="{{ old('module_id') }}"> -->
        @error('module_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="envoyer">
    </form>

</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace( 'description', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
@endsection