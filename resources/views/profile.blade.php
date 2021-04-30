@extends('layouts.nav')

@section('content')



<div class="contenaire_profile">
    <div class="headerProfile">
        <h3>Vous êtes inscrit(e) depuis le {{ date('d-m-Y', strtotime($user->created_at)) }}</h3>
        <button>Compléter mon profile</button>
    </div>

    <div class="headerProfile">
        <h3>{{ ucfirst(strtolower($user->nom)) }}</h3>
        <h3>{{ ucfirst(strtolower($user->prenom)) }}</h3>
    </div>

    <div class="headerProfile tabla_list">
        <h3>
            Vous avez déjà réussi(e) les quiz des modules suivants
        </h3>
        <table>
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Formation</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infos_quiz as $info_quiz)
                <tr>
                    <td>
                        {{$info_quiz->module_titre}}
                    </td>
                    <td>
                        {{$info_quiz->formation_titre}}
                    </td>
                    <td>
                        {{$info_quiz->score}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="headerProfile tabla_list">
        <h3>
            Vos certificats
        </h3>
        @foreach ($infos_quiz as $info_quiz)
           <h5>télécharger le certificat</h5> {{$info_quiz->module_titre}}<br>
           <h5>télécharger le certificat</h5> {{$info_quiz->formation_titre}}<br>
           <h5>télécharger le certificat</h5> {{$info_quiz->score}}<br>
        @endforeach
    </div>
</div>

</div>


@endsection