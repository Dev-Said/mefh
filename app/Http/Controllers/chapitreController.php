<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\chapitre;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
// use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Facades\Storage;


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
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $chapitre = new chapitre;
        $chapitre->titre = Arr::get($validated, 'titre');
        $chapitre->description = Arr::get($validated, 'description');
        $chapitre->ordre = Arr::get($validated, 'ordre');
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
        // $chapitre = chapitre::where('id', '10');
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
        // dd($chapitre->module_id);
        $modules = module::all();
        // dd($module);
        return view('chapitres.edit', ['chapitre' => $chapitre, 
                                        'modules' => $modules]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, chapitre $chapitre)
    {
        $chapitre->update($request->all());

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
        $chapitre->delete();

        return back();
    }

}
