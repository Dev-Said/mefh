<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use Intervention\Image\ImageManagerStatic as Image;

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
        $formationsCount = formation::all()->max('ordre') + 1;
        $formation->ordre = $formationsCount;
        if ($request->hasFile('image_formation')) {
            // si il y a un fichier image on le redimenssionne avec "intervention image" 
            // avant la sauvegarde
            $image = $request->file('image_formation');
            $filename = time() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(400, 250, function ($constraint) {
                $constraint->upsize();
            });
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formation->image_formation = 'images/' . $filename;
        }

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
    public function update(UpdateFormationRequest $request, formation $formation)
    {
        $validated = $request->validated();

        //si il y a un fichier image alors on efface l'ancien
        // et on stock le nouveau
        if ($request->hasFile('image_formation')) {
     
            Storage::delete('public/' . $formation->image_formation);
            // si il y a un fichier image on le redimenssionne avec "intervention image" 
            // avant la sauvegarde
            $image = $request->file('image_formation');
            $filename = time() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(400, 250, function ($constraint) {
                $constraint->upsize();
            });
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formation->image_formation = 'images/' . $filename;
        } else {
            $formation->image_formation = $formation->image_formation;
        }
     
        $formation->titre = Arr::get($validated, 'titre');
        $formation->description = Arr::get($validated, 'description');
        $formation->ordre = $formation->ordre;

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
        // dd($formation->image_formation);
        Storage::delete('public/' . $formation->image_formation);
        $formation->delete();

        // réctifie si besoin les valeurs du champ ordre
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
