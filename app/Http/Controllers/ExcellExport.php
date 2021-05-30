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
    // public function export(Request $request) 
    // {
    //     return Excel::download(new InfosUsersFormations($request->formation_id, $request->date), 'InfosUsersFormations.xlsx');
    // }

    public function storeExcel(Request $request) 
    {
        // dd($request);
        // Store on default disk
        Excel::store(new InfosUsersFormations($request->formation_id, $request->date), 'monexcell.xlsx');
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