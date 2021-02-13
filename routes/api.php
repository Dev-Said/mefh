<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\quizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\quiz_questionController;
use App\Http\Controllers\quiz_user_reponseController;
use App\Http\Controllers\quiz_reponse_optionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//si champ api_token dans table users
Route::middleware('auth:api')->group(function () {

});

// Route::apiResource('chapitre', chapitreController::class);
// Route::apiResource('formation', formationController::class);
// Route::apiResource('module', moduleController::class);
// Route::apiResource('quiz', quizController::class);
// Route::apiResource('user', UserController::class);