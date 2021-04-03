<tr>
    <td>
        {{$formation->titre}}
    </td>
    <td>
        {{$formation->description}}
    </td>
    <td>
        {{$formation->langue}}
    </td>

    @if(Auth::check())
    <td class="td_Button">
        <form action="/formations/{{ $formation->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td class="td_Button">
        <form action="/formations/{{ $formation->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>