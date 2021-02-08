@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/quizzes" method="post" id="quizform">
        @csrf
        <h2>Créer un quiz</h2>
        <div class="formquiz">
            <label for="titre">Titre</label>
            <p> <input type="text" name="titre" id="titre" required>
            </p>

            <label for="module_id">Liste des modules qui n'ont pas de quiz</label>
            <p> <select name="module_id" id="module_id" required>
                    <option value=""></option>
                    @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->titre }}</option>
                    @endforeach
                </select>
            </p>
        </div>
        <input type="submit">
    </form>

</div>


@endsection