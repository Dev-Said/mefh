<tr>
    <td>
        {{$user->nom}}
    </td>
    <td>
        {{$user->prenom}}
    </td>
    <td>
        {{$user->sexe}}
    </td>
    <td>
        {{$user->admin}}
    </td>
    <td>
        {{$user->email}}
    </td>


    @if(Auth::check())
    <td>
        <form action="/users/{{ $user->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/users/{{ $user->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    <td>
        <form action="/users/profile/{{ $user->id }}" method="get">
            @csrf
            <input type="submit" value="Voir le profil" name="update" class="gris">
        </form>
    </td>
    @endif
</tr>