@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/faqs" method="post">
        @csrf
        <h2>Ajouter une question essentielle</h2>
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="{{ old('question') }}">
        @error('question')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="reponse">Reponse</label>
        <input type="text" id="reponse" name="reponse" value="{{ old('reponse') }}">
        @error('reponse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="envoyer">
    </form>

</div>


@endsection