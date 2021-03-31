<tr>
    <td>
        {!! $certificat->text !!}
    </td>
    <td>
        {{$certificat->formation->titre}}
    </td>

    @if(Auth::check())
    <td class="td_Button">
        <form action="/certificats/{{ $certificat->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td class="td_Button">
        <form action="/certificats/{{ $certificat->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>