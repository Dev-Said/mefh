@extends('home')

@section('list')

<h1>Modules</h1>

<div>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                @if(Auth::check())
                <th></th>
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody>

            @each('modules.one', $modules, 'module')

        </tbody>
    </table>
</div>
@endsection