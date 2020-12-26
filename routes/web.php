<?php

use App\Models\module;
use Illuminate\Support\Facades\Route;

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
