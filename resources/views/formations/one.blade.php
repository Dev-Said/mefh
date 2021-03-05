<tr>
    <td>
        {{$formation->titre}}
    </td>
    <td>
        {{$formation->description}}
    </td>

    @if(Auth::check())
    <td>
        <form action="/formations/{{ $formation->id }}" method="post">
        @dump($formation->titre)
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/formations/{{ $formation->id }}/edit" method="get">
        @dump($formation->titre)
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>