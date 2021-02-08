@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/questions" method="post">
        @csrf
        <!-- Question -->
        <h3>Ajouter une question</h3>
        <label for="quiz_id">Sélectionnez un quiz</label>
        <select name="quiz_id" id="quiz_id" required>
            <option value=""></option>
            @foreach($quizzes as $quiz)
            <option value="{{ $quiz->id }}">{{ $quiz->titre }}</option>
            @endforeach
        </select>

        <label for="question">Ecrivez votre question</label>
        <p><input type="text" name="question" id="question" required></p>
        <label for="type">Type de réponse</label>
        <select name="type" id="type" required>
            <option value=""></option>
            <option value="checkbox">Choix multiple</option>
            <option value="radio">Choix unique</option>
        </select>
        <input type="hidden" name="ordre" id="ordre" value="{{ $questionsCount }}">

        <input type="submit">
    </form>

</div>


@endsection