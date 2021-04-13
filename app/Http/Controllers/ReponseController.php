<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use App\Models\Question;
use App\Models\Remember;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReponseRequest;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $reponses = Reponse::orderBy('question_id', 'desc')->get();
        return view('reponses.list', ['reponses' => $reponses, 'questions' => $questions]);
    }

    public function indexSelect(Request $request)
    {

        $questions = Question::all();
        if ($request->question == 'all questions') {
            $reponses = Reponse::orderBy('question_id', 'asc')
                ->get();
        } else {
            $reponses =  Reponse::where('question_id', '=', $request->question)
                ->get();
        }
        return view('reponses.list', ['reponses' => $reponses, 'questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $questions = Question::all();
        return view('reponses.form', ['questions' => $questions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReponseRequest $request)
    {
        $validated = $request->validated();

        $reponse = new reponse;
        $reponse->reponse = Arr::get($validated, 'reponse');
        $reponse->is_correct = Arr::get($validated, 'is_correct');
        $reponse->question_id = Arr::get($validated, 'question_id');

        $reponse->save();

        return redirect('/reponses/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function show(Reponse $reponse)
    {
        return view('reponses.one', ['reponse' => $reponse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function edit(Reponse $reponse)
    {
        $questions = Question::all();
        return view('reponses.edit', ['questions' => $questions,
        'reponse' => $reponse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReponseRequest $request, Reponse $reponse)
    {
        $validated = $request->validated();

        $reponse = new reponse;
        $reponse->reponse = Arr::get($validated, 'reponse');
        $reponse->is_correct = Arr::get($validated, 'is_correct');
        $reponse->question_id = Arr::get($validated, 'question_id');

        $reponse->save();

        return redirect('/reponses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reponse $reponse)
    {
        $reponse->delete();

        return redirect('/reponses');
    }
}
