<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class InfosUsersFormations implements FromCollection, WithHeadings
{

    protected $formation_id;

    function __construct($formation_id)
    {
        $this->formation_id = $formation_id;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $chapitres_suivis = DB::table('chapitre_suivis')
        ->select(
            // 'chapitre_suivis.chapitre_id as chapitres_suivis_id',
            // 'chapitre_suivis.user_id as chapitres_suivis_user_id',
            'users.nom as user_name',
            'users.email as user_email',
            'chapitre_suivis.created_at as chapitres_suivis_date',
            // 'chapitre_suivis.created_at as chapitres_suivis_date_last',
            'chapitres.titre as chapitre_titre',
            'modules.titre as module_titre',
            // 'formations.titre as formation_titre',
        )
        ->join('chapitres', 'chapitres.id', '=', 'chapitre_suivis.chapitre_id')
        ->join('users', 'users.id', '=', 'chapitre_suivis.user_id')
        ->join('modules', 'modules.id', '=', 'chapitres.module_id')
        ->join('formations', 'formations.id', '=', 'modules.formation_id')
        ->where('formation_id', $this->formation_id)
        ->orderBy('user_name', 'asc')
        ->orderBy('chapitres_suivis_date', 'asc')
        ->get();

        return $chapitres_suivis;
    }




    public function headings(): array
    {
        return ["Nom", "Email", "Date", "Chapitre", "Module"];
    }

}
