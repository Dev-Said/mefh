<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;

class FormationResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $formations = DB::table('formations')->orderBy('ordre')->get();
        $formations = formation::all();
        return view('formationsR.list', ['formations' => $formations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formationsR.form');
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
        $formationsCount = formation::all()->max('ordre') + 1;
        $formation->ordre = $formationsCount;
        if ($request->hasFile('image_formation')) {
            $formation->image_formation = $request->image_formation->store('images', 'public');
        }
        $formation->save();

        return back();
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
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        //  dd($formation);
        return view('formationsR.edit', ['formation' => $formation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormationRequest $request, formation $formation)
    {
        $validated = $request->validated();
        dd($formation);
        //si il y a un fichier image alors on efface l'ancien
        // et on stock le nouveau
        if ($request->hasFile('image_formation')) {
            Storage::delete('public/' . $formation->image_formation);
        } else {
            $formation->image_formation = $formation->image_formation;
        }
        $formation->titre = Arr::get($validated, 'titre');
        $formation->description = Arr::get($validated, 'description');
        $formation->ordre = $formation->ordre;

        // si il y a un fichier image alors on le stock dans storage et on 
        // récupère son chemin
        if ($request->hasFile('image_formation')) {
            $formation->image_formation = $request->image_formation->store('images', 'public');
        }

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
        Storage::delete('public/' . $formation->image_formation);
        $formation->delete();

        // réctifie si besoin les valeurs de ordre
        // pour garder la continuité et supprimer les trous
        $formations = formation::all();
        $i = 1;
        foreach ($formations  as $formation) {
            if ($formation !== $i) {
                $formation->ordre = $i;
                $formation->save();
                $i++;
            } else {
                $i++;
            }
        }
        return back();
    }
}
