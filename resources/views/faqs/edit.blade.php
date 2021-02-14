@extends('layouts.default')

@section('content')

<div class="edit">

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="/chapitres/{{ $chapitre->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $chapitre->titre }}" >

        <label for="fichier_video">Fichier_video</label>
        <input type="file" id="fichier_video" name="fichier_video" value="{{ $chapitre->fichier_video }}" 
         accept="video/*">
        
        <label for="description">Description</label>
        <input type="description" name="description" id="description" value="{{ $chapitre->description }}" >
        <label for="ordre">Ordre</label>
        <input type="number" name="ordre" id="ordre" value="{{ $chapitre->ordre }}" >
        <label for="module_id">Module</label>
        <select name="module_id" id="module_id" >
        
            <option value="{{ $chapitre->module_id }}">{{ $chapitre->module->titre }}</option>
            @foreach($modules as $module)
            <option value="{{ $module->id }}">{{ $module->titre }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

</div>



@endsection