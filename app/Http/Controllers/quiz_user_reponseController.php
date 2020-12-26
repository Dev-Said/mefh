<?php

namespace App\Http\Controllers;

use App\Models\quiz_user_reponse;
use Illuminate\Http\Request;

class quiz_user_reponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return quiz_user_reponse::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (quiz_user_reponse::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz_user_reponse  $quiz_user_reponse
     * @return \Illuminate\Http\Response
     */
    public function show(quiz_user_reponse $quiz_user_reponse)
    {
        return $quiz_user_reponse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz_user_reponse  $quiz_user_reponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quiz_user_reponse $quiz_user_reponse)
    {
        if ($quiz_user_reponse->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz_user_reponse  $quiz_user_reponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz_user_reponse $quiz_user_reponse)
    {
        if ($quiz_user_reponse->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
