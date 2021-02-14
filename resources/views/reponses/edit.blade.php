@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/reponses/{{ $reponse->id }}" method="post">
        @csrf
        @method('put')

        <label for="type">Type de réponse</label>
        <select name="type" id="type" required>
            <option value="{{$reponse->type}}">{{ $reponse->type === 'checkbox' ? 'Choix multiple' : 'Choix unique' }}</option>
            <option value="{{ $reponse->type === 'checkbox' ? 'radio' : 'checkbox' }}">{{ $reponse->type === 'checkbox' ? 'Choix unique' : 'Choix multiple' }}</option>
        </select>
        <label for="reponse">reponse</label>
        <input type="text" name="reponse" id="reponse" value="{{ $reponse->reponse }}" required>
        <label for="is_correct">Is_correct</label>
        <select name="is_correct" id="is_correct" required>
            <option value="{{$reponse->is_correct}}">{{$reponse->is_correct}}</option>
            <option value="{{ $reponse->is_correct === 1 ? 0 : 1 }}">{{ $reponse->is_correct === 1 ? 0 : 1 }}</option>
        </select>
        <label for="question_id">Question_id</label>
        <input type="number" name="question_id" id="question_id" value="{{ $reponse->question_id }}" required>
        <input type="submit">
    </form>

</div>


@endsection