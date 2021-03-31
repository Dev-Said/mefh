@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/faqs/{{ $faq->id }}" method="post">
        @csrf
        @method('put')
        <h2>Modifier une question essentielle</h2>
        <label for="question">Question</label>
        <input type="text" name="question" id="question" value="{{ $faq->question }}">
        @error('question')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="reponse">Réponse</label>
        <!-- <input type="text" id="reponse" name="reponse" value="{{ $faq->reponse }}"> -->
        <textarea id="reponse" name="reponse">{{ $faq->reponse }}</textarea>
        @error('reponse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
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