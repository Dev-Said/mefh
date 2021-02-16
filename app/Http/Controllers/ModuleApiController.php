<?php

namespace App\Http\Controllers;

use App\Models\module;
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
                'modules.id as moduleId',
                'chapitres.id as chapitreId',
                'modules.titre as moduleTitre',
                'modules.description as moduleDescription',
                'chapitres.titre as chapitreTitre',
                'chapitres.description as chapitreDescription',
                'fichier_video',
                'module_id',
            )
            ->orderBy('moduleId', 'asc')
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
    public function show(module $module)
    {
        //
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
