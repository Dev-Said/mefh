<?php

namespace App\Http\Controllers;

use App\Models\chapitre;
use Illuminate\Http\Request;

class chapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return chapitre::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (chapitre::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(chapitre $chapitre)
    {
        return $chapitre;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chapitre $chapitre)
    {
        if ($chapitre->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(chapitre $chapitre)
    {
        if ($chapitre->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
