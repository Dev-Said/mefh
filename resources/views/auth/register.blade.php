@extends('layouts.nav')

@section('content')
<x-slot name="logo">
    <a href="/">
        <x-application-logo />
    </a>
</x-slot>

<!-- Validation Errors -->
<x-auth-validation-errors :errors="$errors" />

<form method="POST" action="{{ route('register') }}" class="auth auth_inscription">
    @csrf

    <h1>{{ __('messages.inscription') }}</h1>
    <!-- Name -->
    <label for="nom" class="auth_label">{{ __('messages.nom') }}</label>

    <x-input id="nom" class="auth_input" type="text" name="nom" :value="old('nom')" required autofocus />


    <label for="prenom" class="auth_label">{{ __('messages.prenom') }}</label>

    <x-input id="prenom" class="auth_input" type="text" name="prenom" :value="old('prenom')" required autofocus />


    <label for="sexe" class="auth_label">{{ __('messages.sexe') }}</label>

    <select name="sexe" id="sexe" class="auth_input" :value="old('sexe')" required autofocus style="width:100%; border-radius: 0.375rem; border-color: rgba(209, 213, 219, 1);">
        <option value=""></option>
        <option value="Féminin">féminin</option>
        <option value="Masculin">masculin</option>
    </select>

    <!-- Email Address -->

    <label for="email" class="auth_label">Email</label>

    <x-input id="email" class="auth_input" type="email" name="email" :value="old('email')" required />

    <!-- Password -->

    <label for="password" class="auth_label">{{ __('messages.mdp') }}</label>

    <x-input id="password" class="auth_input" type="password" name="password" required autocomplete="new-password" />

    <!-- Confirm Password -->

    <label for="password_confirmation" class="auth_label">{{ __('messages.mdpconfirm') }}</label>

    <x-input id="password_confirmation" class="auth_input" type="password" name="password_confirmation" required />


    <div class="auth_footer">
        <a href="{{ route('login') }}">
            {{ __('messages.deja_inscrit') }}
        </a>

        <x-button>
            {{ __('messages.inscrire') }}
        </x-button>
    </div>
</form>
@endsection