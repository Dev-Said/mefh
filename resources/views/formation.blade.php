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
    @foreach ($modules as $module)
    <div class="card-formation">
        <div class="sous-card-formation">
            <a href="modules"><h3>Module {{ $loop->index + 1 }}</h3></a>
            <h2>{{ $module->titre }}</h2>
            <!-- <p>{{ $module->description }}</p> -->
        </div>

        <img class="img_formation" src="storage/images/loris.jpg" alt="femme">
    </div>
    @endforeach
</div>


@endsection