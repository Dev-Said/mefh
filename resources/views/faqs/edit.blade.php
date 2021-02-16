@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/faqs/{{ $faq->id }}" method="post">
        @csrf
        @method('put')
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="{{ $faq->question }}">
        @error('question')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="reponse">Réponse</label>
        <input type="text" id="reponse" name="reponse" value="{{ $faq->reponse }}">
        @error('reponse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>



@endsection