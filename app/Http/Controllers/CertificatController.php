<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Models\Certificat;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCertificatRequest;



class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificats = Certificat::all();
        return view('certificats.list', ['certificats' => $certificats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // renvoi seulement les £formations qui 
        // n'ont pas de certificat
        $certificats = Certificat::all('formation_id'); 
        
        $formations = formation::whereNotIn('id', $certificats)
        ->get();
         
        return view('certificats.form', ['formations' => $formations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificatRequest $request)
    {
        $validated = $request->validated();

        $certificat = new Certificat;
        $certificat->text = Arr::get($validated, 'text');
        $certificat->formation_id = Arr::get($validated, 'formation_id');

        $certificat->save();

        return redirect('certificats');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificat $certificat)
    {
        $formation = formation::find($certificat->formation_id);
        $formations = formation::all();
        return view('certificats.edit', [
            'certificat' => $certificat,
            'formation_old' => $formation,
            'formations' => $formations
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCertificatRequest $request, Certificat $certificat)
    {
        $validated = $request->validated();

        $certificat->text = Arr::get($validated, 'text');
        $certificat->formation_id = Arr::get($validated, 'formation_id');

        $certificat->save();

        return redirect('certificats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificat $certificat)
    {
        $certificat->delete();

        return back();
    }


}
