<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthComposer
{

    public function compose(View $view)
    {
        //si Auth alors on envoi nom et prenom de Auth sinon on envoi 0
        //à la vue indexFormation

        Auth::check() ? 
        $view->with('auth', [Auth::user()->nom, Auth::user()->prenom]) : 
        $view->with('auth', '0');
    }
}
