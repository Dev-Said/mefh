@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/questions/{{ $question->id }}" method="post">
        @csrf
        @method('put')
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="{{ $question->question }}" required>
        <label for="type">Type de réponse</label>
        <select name="type" id="type" required>
            <option value="{{ $question->type }}">{{ $question->type === 'checkbox' ? 'Choix multiple' : 'Choix unique'}}</option>
            <option value="{{ $question->type === 'checkbox' ? 'radio' : 'checkbox'}}">
            {{ $question->type === 'checkbox' ? 'Choix unique' : 'Choix multiple'}}</option>
        </select>
        <label for="num">Num</label>
        <input type="number" name="num" id="num" value="{{ $question->num }}" required>
        <label for="quiz_id">Quiz_id</label>
        <input type="number" name="quiz_id" id="quiz_id" value="{{ $question->quiz_id }}" required>
        <input type="submit">
    </form>

</div>


@endsection