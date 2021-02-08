<tr>
    <td>
        {{$question->question}}
    </td>
    <td>
        {{$question->num}}
    </td>
    <td>
        {{$question->quiz_id}}
    </td>

    @if(Auth::check())
    <td>
        <form action="/questions/{{ $question->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/questions/{{ $question->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>