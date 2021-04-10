<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ModuleApiController;
use App\Http\Controllers\ModuleResController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\CertificatController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



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

Route::get('/drag', function () {
    return view('drag');
});


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'visitors']
], function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/', function () {
        return view('accueil', ['lang' => Lang::locale()]);
    });

    Route::get('/formations-liste', function () {
        return view('formations', [
            'formations' => DB::table('formations')->orderBy('ordre')->get(),
            'langue' => 'Toutes les formations'
        ]);
    });


    Route::view('/contact', 'contact');

    Route::get('/vie-privee', function () {
        return View('legale.viePrivee');
    });

    Route::get('/cookies', function () {
        return View('legale.cookies');
    });

    Route::get('/cu', function () {
        return View('legale.conditionsUtilisation');
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });


    Route::get('/formation/{id}', function () {
        return view('indexFormations', ['id' => request('id')]);
    });

    Route::get('/formationsLangue', [FormationController::class, 'formationsLangue']);
});


Route::get('visitor', [VisitorController::class, 'visit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//checker les pages CORS


// Route::resource('modulesApi', ModuleApiController::class);
Route::resource('modulesApi', ModuleResController::class);


Route::group(['middleware' => 'checkAdmin'], function () {
    Route::resource('formations', FormationController::class);
    Route::resource('chapitres', ChapitreController::class);
    Route::resource('modules', ModuleResController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('quizzes', QuizController::class);
    Route::resource('reponses', ReponseController::class);
    Route::resource('users', UserController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('ressources', RessourceController::class);
    Route::resource('certificats', CertificatController::class);
});






Route::get('/quizzes/quiz/{id}', [QuizController::class, 'quiz']);
Route::get('/quizzes/quizApi/{id}', [QuizController::class, 'quizApi']);
Route::post('/reponses_user', [UserController::class, 'reponseUser']);
Route::get('/users/profile/{id}', [UserController::class, 'user']);
Route::post('/checkUser', [UserController::class, 'checkUser']);
Route::get('/dashboard', [DashboardController::class, 'entry']);
Route::post('/usersFromQuizForm', [UserController::class, 'store2']);
Route::post('/chapitreSuivi', [ChapitreController::class, 'suivi']);
Route::get('/chapitreSuiviList', [ChapitreController::class, 'list']);
Route::get('/ressourcesRes/{params}', [RessourceController::class, 'getRessources']);
Route::get('/certificatsRes/{params}', [CertificatController::class, 'getCertificat']);
Route::get('/faqChange', [FaqController::class, 'getChange']);
Route::get('/faqIndex/{params}', [FaqController::class, 'faqIndex']);
Route::get('/changeOrdre', [ModuleResController::class, 'changeOrdre']);

// Route::get('/getLang/{param}', [LangController::class, 'getLang']);



Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
