<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\chapitre;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateChapitreRequest;
use App\Http\Requests\StorePostChapitreRequest;


class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapitres = chapitre::all();
        return view('chapitres.list', ['chapitres' => $chapitres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $chapitresCount = Chapitre::all()->max('ordre') + 1;
        return view('chapitres.form', ['chapitresCount' => $chapitresCount]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostChapitreRequest $request)
    {
        $validated = $request->validated();

        $chapitre = new chapitre;
        $chapitre->titre = Arr::get($validated, 'titre');
        $chapitre->description = Arr::get($validated, 'description');
        $chapitresCount = chapitre::all()->max('ordre') + 1;
        $chapitre->ordre = $chapitresCount;
        $chapitre->module_id = Arr::get($validated, 'module_id');
        if ($request->hasFile('fichier_video')) {
            $chapitre->fichier_video = $request->fichier_video->store('fichier_video', 'public');
        }
        $chapitre->save();

        return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Chapitre
     */
    public function edit(Chapitre $chapitre)
    {
        $modules = module::all();

        return view('chapitres.edit', [
            'chapitre' => $chapitre,
            'modules' => $modules
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChapitreRequest $request, chapitre $chapitre)
    {

        $validated = $request->validated();
        //si il y a un fichier vidéo alors on efface l'ancien
        if ($request->hasFile('fichier_video')) {
            Storage::delete('public/' . $chapitre->fichier_video);
        } else {
            $chapitre->fichier_video = $chapitre->fichier_video;
        }

        //$validate est un tableau d'où on récupère chaque champ validé
        $chapitre->titre = Arr::get($validated, 'titre');
        $chapitre->description = Arr::get($validated, 'description');
        $chapitre->ordre = $chapitre->ordre;
        $chapitre->module_id = Arr::get($validated, 'module_id');

        // si il y a un fichier vidéo alors on le stock dans storage et on 
        //récupère son chemin
        if ($request->hasFile('fichier_video')) {
            $chapitre->fichier_video = $request->fichier_video->store('fichier_video', 'public');
        }

        $chapitre->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(chapitre $chapitre)
    {
        $moduleId = $chapitre->module_id;
        Storage::delete('public/' . $chapitre->fichier_video);
        $chapitre->delete();

        // pour les chapitres d'un module donné
        // réctifie si besoin les valeurs de ordre
        // pour garder la continuité et supprimer les trous
        $chapitres = chapitre::where('module_id', $moduleId)
            ->orderBy('ordre', 'asc')
            ->get();

        $i = 1;
        foreach ($chapitres  as $chapitre) {
            if ($chapitre !== $i) {
                $chapitre->ordre = $i;
                $chapitre->save();
                $i++;
            } else {
                $i++;
            }
        }

        return back();
    }
}
