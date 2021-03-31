@extends('home')

@section('list')

<div class="contenaire_list">

    <h1 class="titre_list">Questions</h1>

    <a href="{{ '/questions/create' }}">
        <button class="button_nouveau"><i class="fas fa-plus"></i>Ajouter une question</button>
    </a>


    <div class="tabla_list">

        <table>
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Type de question</th>
                    <th>Quiz</th>
                    @if(Auth::check())
                    <th></th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @each('questions.one', $questions, 'question')

            </tbody>
        </table>
    </div>
    @endsection