<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // if (Auth::check()) {
        //     return view('users.form');
        // } else {
        //     return redirect('/login');
        // }
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->nom = $request->has('nom') &&
            strlen($request->nom) ? $request->nom : 'unknown';
        $user->prenom = $request->has('prenom') &&
            strlen($request->prenom) ? $request->prenom : 'unknown';
        $user->sexe = $request->has('sexe') &&
            strlen($request->sexe) ? $request->sexe : 'unknown';
        $user->admin = $request->has('admin') &&
            strlen($request->admin) ? $request->admin : 'unknown';
        $user->email = $request->has('email') &&
            strlen($request->email) ? $request->email : 'unknown';
        $user->password = $request->has('password') &&
            strlen($request->password) ? $request->password : 'unknown';

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
    public function update(Request $request, User $user)
    {
        $user->nom = $request->has('nom') &&
            strlen($request->nom) ? $request->nom : $user->nom;
        $user->prenom = $request->has('prenom') &&
            strlen($request->prenom) ? $request->prenom : $user->prenom;
        $user->sexe = $request->has('sexe') &&
            strlen($request->sexe) ? $request->sexe : $user->sexe;
        $user->admin = $request->has('admin') &&
            strlen($request->admin) ? $request->admin : $user->admin;
        $user->email = $request->has('email') &&
            strlen($request->email) ? $request->email : $user->email;
        $user->password = $request->has('password') &&
            strlen($request->password) ? $request->password : $user->password;

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
        //on récupère les id des questions du quiz dont l'id est = à quiz_id
        //va me servir pour la suite
        // $questions_id = Quiz::find($request->input('quiz_id'))->questions()->get('id');

        $user = User::find(Auth::id());
        $reponses = Reponse::find($request->except('_token', 'quiz_id'));
        $user->reponses()->sync($reponses);

        //on fait un sync mais sans supprimer les quiz qui ont déjà été fait par un user
        $user->quizzes()->syncWithoutDetaching($request->input('quiz_id'));

        return redirect('/quizzes');
    }
}
