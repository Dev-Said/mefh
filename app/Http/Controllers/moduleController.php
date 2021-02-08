<?php

namespace App\Http\Controllers;

use App\Models\module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class moduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return module::all();

        // $modulesAll = module::all();

        // $chapitresAll = chapitre::all()->groupBy('modules_id');

        // return ['modulesAll' => $modulesAll, 'chapitresAll' => $chapitresAll ];

        $data = DB::table('modules')
        ->join('chapitres', 'modules.id', '=', 'chapitres.modules_id')
        ->select('modules.titre as modtitre','modules.id as modid', 'chapitres.*')
        ->orderBy('modules.id', 'asc')
        ->orderBy('chapitres.id', 'asc')
        ->get();


        return $data->groupBy('modules_id');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (module::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(module $module)
    {
        return $module;
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
        if ($module->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(module $module)
    {
        if ($module->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
