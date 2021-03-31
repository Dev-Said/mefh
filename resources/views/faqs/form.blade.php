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
        <textarea id="reponse" name="reponse">{{ old('reponse') }}</textarea>
        @error('reponse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="envoyer">
    </form>

</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace( 'reponse', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>

@endsection