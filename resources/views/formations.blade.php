@extends('layouts.nav')

@section('content')
<div class="contenaireFormations">
    <div class="text-formation">
        <h1>{{ __('messages.slogan1_formations') }}</h1>
        <p>{{ __('messages.slogan2_formations') }}</p>
    </div>

    <div class="selectForm">
        <form action="/formationsLangue" method="get">
            @csrf
            <select name="langue" id="langue">
                @isset( $langue ) <option value="{{ $langue }}">{{ $langue }}</option> @endisset
                @if ($langue && $langue !== 'Toutes les formations')
                <option value="Toutes les formations">Toutes les formations</option>
                @endif
                @if ($langue && $langue !== 'Français')
                <option value="Français">Les formations en Français</option>
                @endif
                @if ($langue && $langue !== 'Néerlendais')
                <option value="Néerlendais">Les formations en Néerlendais</option>
                @endif
                @if ($langue && $langue !== 'Anglais')
                <option value="Anglais">Les formations en Anglais</option>
                @endif
                @if ($langue && $langue !== 'Allemand')
                <option value="Allemand">Les formations en Allemand</option>
                @endif
            </select>
            <input type="submit" value="Confirmer">
        </form>
    </div>


    <div class="blockFormations">
        @foreach ($formations as $formation)
        <a href="formation/{{ $formation->id }}" class="card-formation">
            <div class="supp-card-formation">
                <h2>{{ $formation->titre }}</h2>
            </div>

            <figure class="fig_formations_liste">
                <img class="img_formation" src="{{ asset('storage/'.$formation->image_formation) }}" alt="illustrations formations" />
            </figure>

            <div class="inf-card-formation">
                <h3>{{ $formation->description }}</h3>
            </div>
            <div class="inf-card-langue">
                <h4><strong>Langue </strong>{{ $formation->langue }}</h4>
            </div>

        </a>
        @endforeach
    </div>
</div>


@endsection