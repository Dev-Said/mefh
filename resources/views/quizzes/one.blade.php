<tr>
    <td>
        {{$quiz->titre}}
    </td>
    <td>
        {{$quiz->module_id}}
    </td>

    @if(Auth::check())
    <td>
        <form action="/quizzes/{{ $quiz->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" name="delete" class="supp">
        </form>
    </td>
    <td>
        <form action="/quizzes/{{ $quiz->id }}/edit" method="get">
            @csrf
            <input type="submit" value="Modifier" name="update" class="modif">
        </form>
    </td>
    <td>
        <form action="/quizzes/quiz/{{ $quiz->id }}" method="get">
            @csrf
            <input type="submit" value="Faire le quiz" name="update" class="gris">
        </form>
    </td>
    @endif
    
    @foreach($quiz->users as $user)
    <td>{{ $user->nom }}</td>
    @endforeach
</tr>