<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $validated = $request->validated();

        $user = new User;
        $user->nom = Arr::get($validated, 'nom');
        $user->prenom = Arr::get($validated, 'prenom');
        $user->sexe = Arr::get($validated, 'sexe');
        $user->admin = Arr::get($validated, 'admin');
        $user->email = Arr::get($validated, 'email');
        $user->password = Hash::make(Arr::get($validated, 'password'));

        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.one', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {

        $validated = $request->validated();

        $user->nom = Arr::get($validated, 'nom');
        $user->prenom = Arr::get($validated, 'prenom');
        $user->sexe = Arr::get($validated, 'sexe');
        $user->admin = Arr::get($validated, 'admin');
        $user->email = Arr::get($validated, 'email');
        $user->password = Hash::make(Arr::get($validated, 'password'));

        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }


    public function user($id)
    {
        $user = User::find($id);
        return view('users.profile', ['user' => $user]);
    }


    public function reponseUser(Request $request)
    {
        // dd($request);
        // $user = User::find(Auth::id());

        // $user = User::find(6);
        // $reponses = Reponse::find($request->except('_token', 'quiz_id'));
        // $user->reponses()->sync($reponses);

        // //on fait un sync mais sans supprimer les quiz qui ont déjà été fait par un user
        // $user->quizzes()->syncWithoutDetaching($request->input('quiz_id'));

        // return redirect('/quizzes');
        return json_encode('salut');
    }
}
