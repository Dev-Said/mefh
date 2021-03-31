<tr>
    <td>
        {{$module->titre}}
    </td>
    <td>
        {{$module->description}}
    </td>
    <td>
        {{$module->formation->titre}}
    </td>

    @if(Auth::check())
    <td class="td_Button">
        <form action="/modules/{{ $module->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td class="td_Button">
        <form action="/modules/{{ $module->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>