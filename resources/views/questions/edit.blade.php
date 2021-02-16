@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/questions/{{ $question->id }}" method="post">
        @csrf
        @method('put')
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="{{ $question->question }}">
        @error('question')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="type">Type de réponse</label>
        <select name="type" id="type">
            <option value="{{ $question->type }}">{{ $question->type === 'checkbox' ? 'Choix multiple' : 'Choix unique'}}</option>
            <option value="{{ $question->type === 'checkbox' ? 'radio' : 'checkbox'}}">
                {{ $question->type === 'checkbox' ? 'Choix unique' : 'Choix multiple'}}
            </option>
        </select>
        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="ordre">Num</label>
        <input type="number" name="ordre" id="ordre" value="{{ $question->ordre }}">
        @error('ordre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="quiz_id">Quiz_id</label>
        <input type="number" name="quiz_id" id="quiz_id" value="{{ $question->quiz_id }}">
        @error('quiz_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>


@endsection