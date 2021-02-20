<?php

use App\Models\module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqResController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ModuleApiController;
use App\Http\Controllers\ModuleResController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('accueil');
});

Route::get('/formation', function () {
    return view('formation', ['modules' => module::all()]);
});
Route::view('/questions', 'questions');
Route::view('/resources', 'resources');
Route::view('/certificat', 'certificat');
Route::view('/contact', 'contact');
Route::view('/connexion', 'connexion');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//checker les pages CORS
Route::resource('formations', FormationController::class);
Route::resource('chapitres', ChapitreController::class);
Route::resource('modules', ModuleResController::class);
// Route::resource('questions', QuestionController::class);
Route::resource('quizzes', QuizController::class);
Route::resource('reponses', ReponseController::class);
Route::resource('users', UserController::class);
Route::resource('faqs', FaqController::class);
Route::resource('faqsres', FaqResController::class);
Route::resource('modulesApi', ModuleApiController::class);


Route::group(['middleware' => ['auth']], function () 
{
    Route::resource('formations', FormationController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('chapitres', ChapitreController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('modules', ModuleResController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('modulesApi', ModuleApiController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    // Route::resource('questions', QuestionController::class)->only([
    //     'create', 'store', 'edit', 'update', 'delete'
    // ]);
    Route::resource('quizzes', QuizController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('reponses', ReponseController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('users', UserController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('faqs', FaqController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('faqsres', FaqResController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);

    Route::get('/quizzes/quiz/{id}', [QuizController::class, 'quiz']);
    Route::post('/reponses_user', [UserController::class, 'reponseUser']);
    Route::get('/users/profile/{id}', [UserController::class, 'user']);
    Route::get('/dashboard', [DashboardController::class, 'entry']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/users');
    });

    Route::get('/indexFormations', function () {
        return view('indexFormations');
    });  
   
    Route::get('/questions', function () {
        return view('questions');
    });  
});

