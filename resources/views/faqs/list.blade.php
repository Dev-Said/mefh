@extends('home')

@section('list')

<h1>Chapitres</h1>

<div>

    <table>
        <thead>
            <tr>
            <th>Question</th>
                <th>Réponse</th>
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
@endsection