<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Module;
use App\Models\Remember;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.list', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz = Quiz::all('module_id');
        //on envoie seulement les modules qui n'ont pas de quiz
        //pour leur en attribuer un
        $modules = Module::whereNotIn('id', $quiz)->get();
        return view('quizzes.form', ['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {
        $validated = $request->validated();

        $quiz = new quiz;
        $quiz->titre = Arr::get($validated, 'titre');
        $quiz->module_id = Arr::get($validated, 'module_id');

        $quiz->save();

        return redirect('questions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('quizzes.one', ['quiz' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $questions = $quiz->questions;

        return view('quizzes.edit', ['quiz' => $quiz, 'questions' => $questions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuizRequest $request, Quiz $quiz)
    {
        $validated = $request->validated();

        $quiz->titre = Arr::get($validated, 'titre');
        $quiz->module_id = Arr::get($validated, 'module_id');

        $quiz->save();

        return redirect('questions/create');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
       
        return redirect('/quizzes');
    }



    public function quiz($id)
    {
        $quiz = Quiz::find($id);
        return view('quizzes.quiz', ['quiz' => $quiz]);
    }

    public function quizApi($id)
    {
        // on reçoit l'id d'un module et on return
        // le quiz correspondant 
        return quiz::where('module_id', $id)
        ->with('questions.reponses')->get();        
    }



    public function quizApi2(Request $request)
    {

        dd($request);     
    }
}
