@extends('home')

@section('list')

<h1>Questions</h1>

<div>

    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Num</th>
                <th>Quiz_id</th>
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