<?php

namespace App\Http\Controllers;
    
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InfosUsersFormations;

class ExcellExport extends Controller
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function importExportView()
    // {
    //    return view('import');
    // }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        return Excel::download(new InfosUsersFormations($request->formation_id), 'InfosUsersFormations.xlsx');
    }
     
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function import() 
    // {
    //     Excel::import(new InfosUsersFormations,request()->file('file'));
             
    //     return back();
    // }
}