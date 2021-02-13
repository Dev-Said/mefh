<tr>
    <td>
        {{$chapitre->titre}}
    </td>
    <td>
        {{$chapitre->description}}
    </td>

    @if(Auth::check())
    <td>
        <form action="/chapitres/{{ $chapitre->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/chapitres/{{ $chapitre->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>