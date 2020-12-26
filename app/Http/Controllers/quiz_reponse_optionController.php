<?php

namespace App\Http\Controllers;

use App\Models\quiz_reponse_option;
use Illuminate\Http\Request;

class quiz_reponse_optionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return quiz_reponse_option::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (quiz_reponse_option::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz_reponse_option  $quiz_reponse_option
     * @return \Illuminate\Http\Response
     */
    public function show(quiz_reponse_option $quiz_reponse_option)
    {
        return $quiz_reponse_option;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz_reponse_option  $quiz_reponse_option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quiz_reponse_option $quiz_reponse_option)
    {
        if ($quiz_reponse_option->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz_reponse_option  $quiz_reponse_option
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz_reponse_option $quiz_reponse_option)
    {
        if ($quiz_reponse_option->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
