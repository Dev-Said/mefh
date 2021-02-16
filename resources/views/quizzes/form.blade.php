@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/quizzes" method="post" id="quizform">
        @csrf
        <h2>Créer un quiz</h2>
        <div class="formquiz">
            <label for="titre">Titre</label>
            <p> <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
            </p>
            @error('titre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="module_id">Liste des modules qui n'ont pas de quiz</label>
            <p> <select name="module_id" id="module_id">
                    <option value="{{ old('id') }}">{{ old('id') }}</option>
                    @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->titre }}</option>
                    @endforeach
                </select>
            </p>
            @error('module_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit">
    </form>

</div>

@endsection