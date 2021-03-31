@extends('layouts.default')

@section('content')

<div class="edit">

    <form action="/certificats/{{ $certificat->id }}" method="post">
        @csrf
        @method('put')
        <h2>Modifier un certificat</h2>
        <label for="formation_id">Sélectionnez une formation</label>
        <p>
            <select name="formation_id" id="formation_id">
                <option value="{{ $formation_old->id }}">{{ $formation_old->titre }}</option>
                @foreach($formations as $formation)
                @if ($formation->id !== $formation_old->id)
                <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                @endif
                @endforeach
            </select>
        </p>
        @error('formation_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="text">Texte du certificat</label>
        <textarea id="text" name="text">{{ $certificat->text }}</textarea>
        @error('text')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="envoyer">
    </form>

</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace( 'text', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
@endsection