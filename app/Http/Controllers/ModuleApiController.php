<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Module::all();


        return DB::table('modules')
            ->join('chapitres', 'modules.id', '=', 'chapitres.module_id')
            ->select(
                'modules.id as module_id',
                'chapitres.id as id',
                'modules.titre as module_titre',
                'modules.description as module_description',
                'chapitres.titre as titre',
                'chapitres.description as description',
                'fichier_video',
                'chapitres.ordre as ordre',
            )
            ->orderBy('module_id', 'asc')
            ->orderBy('ordre', 'asc')
            ->get();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // return  module::find($id)->chapitres;

        return DB::table('modules')
            ->selectRaw(
                'modules.id as module_id,
                modules.titre as module_titre,
                chapitres.id as id,
                chapitres.titre as titre,
                chapitres.description as description,
                chapitres.fichier_video as fichier_video,
                chapitres.ordre as ordre'
            )
            ->join('chapitres', 'modules.id', '=', 'chapitres.module_id')
            ->where('modules.id', $id)
            ->orderBy('chapitres.ordre', 'asc')
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(module $module)
    {
        //
    }
}
