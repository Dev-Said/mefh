<?php

namespace App\Http\Controllers;

use App\Models\quiz_question;
use Illuminate\Http\Request;

class quiz_questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return quiz_question::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (quiz_question::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz_question  $quiz_question
     * @return \Illuminate\Http\Response
     */
    public function show(quiz_question $quiz_question)
    {
        return $quiz_question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz_question  $quiz_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quiz_question $quiz_question)
    {
        if ($quiz_question->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz_question  $quiz_question
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz_question $quiz_question)
    {
        if ($quiz_question->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
