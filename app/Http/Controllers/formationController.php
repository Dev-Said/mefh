<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormationRequest;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = formation::all();

        return view('formations.list', ['formations' => $formations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormationRequest $request)
    {
        $validated = $request->validated();

        $formation = new formation;
        $formation->titre = Arr::get($validated, 'titre');
        $formation->description = Arr::get($validated, 'description');

        $formation->save();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formations.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(formation $formation)
    {
        return $formation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reponse  $reponse
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        return view('formations.edit', ['formation' => $formation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormationRequest $request, formation $formation)
    {
        $validated = $request->validated();

        $formation->titre = Arr::get($validated, 'titre');
        $formation->description = Arr::get($validated, 'description');

        $formation->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(formation $formation)
    {
        $formation->delete();
    }
}
