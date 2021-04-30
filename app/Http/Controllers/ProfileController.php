<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getUser()
    {
        if (Auth::user()) {
            $user = Auth::user();

            $infos_quiz = DB::table('reponse_users')
                ->select(
                    'score',
                    'quizzes.titre as quiz_titre',
                    'formations.titre as formation_titre',
                    'modules.titre as module_titre'
                )
                ->join('quizzes', 'quizzes.id', '=', 'reponse_users.quiz_id')
                ->join('modules', 'modules.id', '=', 'quizzes.module_id')
                ->join('formations', 'formations.id', '=', 'modules.formation_id')
                ->where('reponse_users.user_id', $user->id)
                ->get();

            return view('profile', [
                'user' => Auth::user(),
                'infos_quiz' => $infos_quiz
            ]);
        }
    }
}
