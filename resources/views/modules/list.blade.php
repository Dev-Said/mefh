@extends('home')

@section('list')
<div class="contenaire_list">

    <h1 class="titre_list">Modules</h1>

    <a href="{{ '/modules/create' }}">
        <button class="button_nouveau">Ajouter un module</button>
    </a>

    <div>

        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Formation</th>
                    <th>Ordre</th>
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
</div>
@endsection