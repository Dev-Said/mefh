@extends('layouts.default')

@section('content')

<div class="edit">
<h2>Ajouter un users</h2>

    <form action="/users" method="post">
        @csrf
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
        @error('nom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}">
        @error('prenom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe">
            <option value="">--sexe--</option>
            <option value="masculin">masculin</option>
            <option value="feminin">feminin</option>
        </select>
        @error('sexe')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="admin">Admin</label>
        <select name="admin" id="admin">
            <option value="">--admin--</option>
            <option value="1">admin</option>
            <option value="0">not admin</option>
        </select>
        @error('admin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>

</div>


@endsection