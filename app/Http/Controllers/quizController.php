<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Module;
use App\Models\Remember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $quiz = new Quiz;
        $quiz->titre = $request->has('titre') &&
            strlen($request->titre) ? $request->titre : 'unknown';
        $quiz->module_id = $request->has('module_id') &&
            strlen($request->module_id) ? $request->module_id : 'unknown';

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
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->titre = $request->has('titre') &&
            strlen($request->titre) ? $request->titre : $quiz->titre;
        // $quiz->module_id = $request->has('module_id') &&
        //     strlen($request->module_id) ? $request->module_id : $quiz->module_id;

        $quiz->save();

        return redirect('questions/edit');
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
}
