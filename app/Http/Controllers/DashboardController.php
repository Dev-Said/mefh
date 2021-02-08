<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Module;
use App\Models\Reponse;
use App\Models\Question;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function entry(){    
        $modulesCount = Module::all()->count();
        $modulesLast = Module::all()->last()->titre;
        $questionsCount = Question::all()->count();
        $questionsLast = Question::all()->last()->question;
        $quizzesCount = Quiz::all()->count();
        $quizzesLast = Quiz::all()->last()->titre;
        $reponsesCount = Reponse::all()->count();
        $reponsesLast = Reponse::all()->last()->reponse;
        $usersCount = User::all()->count();
        $usersLast = User::all()->last()->nom;

        return view('Dashboard', ['modulesCount' => $modulesCount,
                                'modulesLast' => $modulesLast,
                                'questionsCount' => $questionsCount,
                                'questionsLast' => $questionsLast,
                                'quizzesCount' => $quizzesCount,
                                'quizzesLast' => $quizzesLast,
                                'reponsesCount' => $reponsesCount,
                                'reponsesLast' => $reponsesLast,
                                'usersCount' => $usersCount,
                                'usersLast' => $usersLast,
                                ]);
    }

}
