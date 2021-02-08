@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/quizzes/{{ $quiz->id }}" method="post">
        @csrf
        @method('put')
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="{{ $quiz->titre }}" required>

        <label for="module_id">Liste des modules qui n'ont pas de quiz</label>
        <p> <select name="module_id" id="module_id" required>
                <option value=""></option>
                @foreach($modules as $module)
                <option value="{{ $module->id }}">{{ $module->titre }}</option>
                @endforeach
            </select>
        </p>

         <input type="submit">
    </form>

</div>


@endsection