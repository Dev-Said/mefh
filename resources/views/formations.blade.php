@extends('layouts.nav')

@section('content')
<div class="contenaire">
    <div class="text-formation">
        <h1>Suivez notre formation sur le harcelement sexuel dans le milieu
            universitaire et dans les hautes écoles
        </h1>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro
            reiciendis tempore nemo. Alias numquam, quidem blanditiis commodi
            optio ex ut veniam tempora labore obcaecati, tenetur doloremque
            voluptas veritatis ratione deserunt.
        </p>
    </div>
    @foreach ($formations as $formation)
    <a href="indexFormations/{{ $formation->id }}" class="card-formation">
        <div class="supp-card-formation">
            <h2>{{ $formation->titre }}</h2>
        </div>

        <figure class="fig_formations_liste">
            <img class="img_formation" src="{{ asset('storage/'.$formation->image_formation) }}" alt="illustrations formations"/>
        </figure>

        <div class="inf-card-formation">
            <h3>{{ $formation->description }}</h3>
        </div>

    </a>
    @endforeach
</div>


@endsection