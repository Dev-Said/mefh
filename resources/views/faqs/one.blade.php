<tr>
    <td>
        {{$faq->question}}
    </td>
    <td>
        {{$faq->reponse}}
    </td>

    @if(Auth::check())
    <td>
        <form action="/faqs/{{ $faq->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/faqs/{{ $faq->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>