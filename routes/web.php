<?php


use Illuminate\Support\Facades\DB;
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
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\FormationResController;

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

Route::get('/formations-liste', function () {
    return view('formations', ['formations' => DB::table('formations')->orderBy('ordre')->get()]);
});


Route::view('/contact', 'contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//checker les pages CORS

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
Route::resource('modulesApi', ModuleApiController::class);


Route::group(['middleware' => ['auth']], function () {
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
        'create', 'store', 'edit', 'update', 'delete',
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
    Route::resource('faqs', FaqController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]);
    Route::resource('ressources', RessourceController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]); 
    Route::resource('certificats', CertificatController::class)->only([
        'create', 'store', 'edit', 'update', 'delete'
    ]); 
});


Route::get('/quizzes/quiz/{id}', [QuizController::class, 'quiz']);
Route::get('/quizzes/quizApi/{id}', [QuizController::class, 'quizApi']);
Route::post('/reponses_user', [UserController::class, 'reponseUser']);
Route::get('/users/profile/{id}', [UserController::class, 'user']);
Route::get('/dashboard', [DashboardController::class, 'entry']);
Route::post('/usersFromQuizForm', [UserController::class, 'store2']);
Route::post('/chapitreSuivi', [ChapitreController::class, 'suivi']);
Route::get('/chapitreSuiviList', [ChapitreController::class, 'list']);
Route::get('/ressourcesRes/{params}', [RessourceController::class, 'getRessources']);
Route::get('/certificatsRes/{params}', [CertificatController::class, 'getCertificat']);
Route::get('/faqChange', [FaqController::class, 'getChange']);
Route::get('/faqIndex/{params}', [FaqController::class, 'faqIndex']);
Route::post('/formationsLangue', [FormationController::class, 'formationsLangue']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Route::get('/formation/{id}', function () {
    return view('indexFormations', ['id' => request('id')]);
});

Route::get('/questionsEssentielles', function () {
    return view('questionsEssentielles');
});


Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


