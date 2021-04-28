@extends('layouts.nav')

@section('content')

<div class="contenairAccueil">
    <h1>{{ __('messages.mefh') }}</h1>
    <h2 class="textAccueil1">
        {{ __('messages.slogan_accueil') }}
    </h2>
    <h2 class="textAccueil2">
        {{ __('messages.slogan_accueil2') }} <br>
        {{ __('messages.slogan_accueil3') }}
    </h2>

    <a id="lienFormation" href="formations-liste"><button id="buttonAccueil">{{ __('messages.button_accueil3') }}</button></a>

    <div class="sociaux">
        <a href="https://www.facebook.com/MEFH1/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.linkedin.com/company/mouvement-%C3%A9galit%C3%A9-femmes-hommes/about/"><i class="fab fa-linkedin-in"></i></a>
        <a href="mailto:mouvementegalite.femmeshommes@gmail.com"><i class="fas fa-envelope"></i></a>
    </div>

</div>


<script src="/js/app.js"></script>
@endsection