@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/reponses/{{ $reponse->id }}" method="post">
        @csrf
        @method('put')

        <label for="reponse">reponse</label>
        <input type="text" name="reponse" id="reponse" value="{{ $reponse->reponse }}">
        @error('reponse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="is_correct">Is_correct</label>
        <select name="is_correct" id="is_correct">
            <option value="{{$reponse->is_correct}}">{{$reponse->is_correct}}</option>
            <option value="{{ $reponse->is_correct === 1 ? 0 : 1 }}">{{ $reponse->is_correct === 1 ? 0 : 1 }}</option>
        </select>
        @error('is_correct')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="question_id">Question_id</label>
        <input type="number" name="question_id" id="question_id" value="{{ $reponse->question_id }}">
        @error('question_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>


@endsection