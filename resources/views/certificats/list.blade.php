@extends('layouts.default')

@section('content')

<div class="contenaire_list">

    <h1 class="titre_list">Certificats</h1>

    <a href="{{ '/certificats/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter un certificat</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Texte</th>
                    <th>Formation</th>
                    @if(Auth::check())
                    <th></th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @each('certificats.one', $certificats, 'certificat')

            </tbody>
        </table>
    </div>
</div>
@endsection