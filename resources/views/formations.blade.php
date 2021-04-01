@extends('layouts.nav')

@section('content')
<div class="contenaire">
    <div class="text-formation">
        <h1>Formez-vous sur les inégalités entre les femmes et les hommes</h1>
        <p>
            L'ASBL MEFH, le Mouvement pour l'égalité entre les Femmes et les Hommes,
            vous propose des formations en ligne sur les discriminations en fonction
            du sexe
        </p>
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

        </a>
        @endforeach
    </div>
</div>


@endsection