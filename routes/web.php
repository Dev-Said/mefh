<?php

use App\Models\module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
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

Route::get('/modules', function () {
    return view('modules');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('modules', ModuleResController::class);
Route::resource('questions', QuestionController::class);
Route::resource('quizzes', QuizController::class);
Route::resource('reponses', ReponseController::class);
Route::resource('users', UserController::class);


Route::group(['middleware' => ['auth']], function () {

    Route::resource('modules', ModuleResController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('questions', QuestionController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('quizzes', QuizController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('reponses', ReponseController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('users', UserController::class)->only([
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

});