<tr>
    <td>
        {{$faq->question}}
    </td>
    <td>
        {!! $faq->reponse !!}
    </td>
    <td>
        {{$faq->formation->titre}}
    </td>

    @if(Auth::check())
    <td class="td_Button">
        <form action="/faqs/{{ $faq->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td class="td_Button">
        <form action="/faqs/{{ $faq->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    @endif
</tr>