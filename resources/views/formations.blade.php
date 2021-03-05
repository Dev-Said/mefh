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
    <div class="card-formation">
    <img class="img_formation" src="storage/images/loris.jpg" alt="femme">
        <div class="sous-card-formation">
            <a href="indexFormations/{{ $formation->id }}"><h2>{{ $formation->titre }}</h2></a>
        </div>

        
    </div>
    @endforeach
</div>


@endsection