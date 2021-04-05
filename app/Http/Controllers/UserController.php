<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use Illuminate\Support\Arr;
use App\Models\Reponse_user;
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

    // crée un nouvel utilisateur via un formulaire proposé
    // quand on veut sauvegarder les résultats d'un quiz et 
    // qu'on est pas déjà inscrit
    public function store2(Request $request)
    {

        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->sexe = $request->sexe;
        $user->admin = $request->admin;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return json_encode($user->id);
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


    // sauve le score d'un quiz et efface le précédent socre
    // s'il existe
    public function reponseUser(Request $request)
    {
        Reponse_user::where('quiz_id', $request->quiz_id)
            ->where('user_id', $request->id)
            ->delete();

        $reponse_user = new Reponse_user;
        $reponse_user->score = $request->resultat;
        $reponse_user->user_id = $request->id;
        $reponse_user->quiz_id = $request->quiz_id;
        $reponse_user->save();

        return json_encode('success');
    }

    // vérifie si user existe et que le password est ok
    public function checkUser(Request $request)
    {
        
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return  Auth::id();
            }

            return 'user not exist';

    }
}
