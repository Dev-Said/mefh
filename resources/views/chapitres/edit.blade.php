@extends('layouts.default')

@section('content')

<div class="edit">
    <form action="/chapitres/{{ $chapitre->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $chapitre->titre }}" required>

        <label for="fichier_video">Fichier_video</label>
        <input type="file" id="fichier_video" name="fichier_video" value="{{ $chapitre->fichier_video }}" 
        required accept="video/*">
        
        <label for="description">Description</label>
        <input type="description" name="description" id="description" value="{{ $chapitre->description }}" required>
        <label for="ordre">Ordre</label>
        <input type="number" name="ordre" id="ordre" value="{{ $chapitre->ordre }}" required>
        <label for="module_id">Module</label>
        <select name="module_id" id="module_id" required>
        
            <option value="{{ $chapitre->module_id }}">{{ $chapitre->module->titre }}</option>
            @foreach($modules as $module)
            <option value="{{ $module->id }}">{{ $module->titre }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

</div>



@endsection