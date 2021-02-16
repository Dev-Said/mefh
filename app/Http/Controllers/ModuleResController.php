<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\formation;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreModuleRequest;


class ModuleResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('modules.list', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = formation::all();
        $modulesCount = Module::all()->max('ordre') + 1;
        return view('modules.form', ['modulesCount' => $modulesCount,
                                    'formations' => $formations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request)
    {
        $validated = $request->validated();

        $module = new module;
        $module->titre = Arr::get($validated, 'titre');
        $module->description = Arr::get($validated, 'description');
        $module->ordre = Arr::get($validated, 'ordre');
        $module->formation_id = Arr::get($validated, 'formation_id');

        $module->save();

        return redirect('/modules');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('modules.one', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $formation = formation::find($module->formation_id);
        $formations = formation::all();
        return view('modules.edit', ['module' => $module,
                                    'formation_old' => $formation,
                                    'formations' => $formations]);
    }

    /**
     * Update the specified resource in storage.F
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(StoreModuleRequest $request, Module $module)
    { 
        $validated = $request->validated();

        $module->titre = Arr::get($validated, 'titre');
        $module->description = Arr::get($validated, 'description');
        $module->ordre = Arr::get($validated, 'ordre');
        $module->formation_id = Arr::get($validated, 'formation_id');

        $module->save();

        return redirect('/modules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return redirect('/modules');
    }
}
