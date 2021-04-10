<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleApiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // renvoi tous les chapitres correspondants aux modules
        // d'une formation donnée
        return DB::table('modules')
            ->select(
                'modules.id as module_id',
                'modules.ordre as module_ordre',
                'chapitres.id as id',
                'modules.titre as module_titre',
                'modules.description as module_description',
                'chapitres.titre as titre',
                'chapitres.description as description',
                'fichier_video',
                'chapitres.ordre as ordre',
                'modules.formation_id as formation_id',
                'quizzes.module_id as quiz_module_id'
            )
            ->join('chapitres', 'modules.id', '=', 'chapitres.module_id')
            ->leftJoin('quizzes', 'modules.id', '=', 'quizzes.module_id')
            ->where('formation_id', $id)
            ->orderBy('module_ordre', 'asc')
            ->orderBy('ordre', 'asc')
            ->get();

    }


}
