@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/reponses" method="post">
        @csrf
        <h2>Ajouter une réponse</h2>
        <label for="question_id">Chousissez une question</label>
        <select name="question_id" id="question_id" required>
        <option value=""></option>
            @foreach($questions as $question)
            <option value="{{ $question->id }}">{{ $question->question }}</option>
            @endforeach
        </select>
        <label for="reponse">Indiquez une réponse</label>
        <input type="reponse" name="reponse" id="reponse" required>
        <label for="is_correct">Indiquez si la réponse est correcte</label>
        <select name="is_correct" id="is_correct" required>
            <option value=""></option>
            <option value="1">correct</option>
            <option value="0">not correct</option>
        </select>
        <input type="submit">
    </form>

</div>


@endsection