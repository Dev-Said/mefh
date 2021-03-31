@extends('home')

@section('list')

<div class="contenaire_list">

    <h1 class="titre_list">Questions essentielles</h1>

    <a href="{{ '/faqs/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter une question essentielle</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Réponse</th>
                    <th>Formation</th>
                    @if(Auth::check())
                    <th></th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @each('faqs.one', $faqs, 'faq')

            </tbody>
        </table>
    </div>
</div>
@endsection