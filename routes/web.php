<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\OperateurController;
use App\Models\Abonnement;

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


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/signup', [PageController::class, 'signup_free'])->name('signup');
Route::post('/signup_free', [PageController::class, 'signup_free_post'])->name('signup_post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/monprofil', [AuthController::class, 'monprofil'])->name('monprofil');
    Route::post('/monprofil', [AuthController::class, 'monprofil_update'])->name('monprofil');
    Route::post('/modifierimageprofil', [AuthController::class, 'modifierimageprofil'])->name('modifierimageprofil');
    Route::post('/modifiermotdepasse', [AuthController::class, 'modifiermotdepasse'])->name('modifiermotdepasse');

    Route::get('/supprimermoncompte', [AuthController::class, 'supprimermoncompte'])->name('supprimermoncompte');
    
    Route::get('/abonnement', [AuthController::class, 'abonnement'])->name('abonnement');
    Route::get('/abonnement/upgrade', [AbonnementController::class, 'upgrade'])->name('upgrade');

    Route::get('/operateur', [OperateurController::class, 'index'])->name('operateur.index');
    Route::get('/operateur/add', [OperateurController::class, 'add'])->name('operateur.add');
    Route::post('/operateur/add', [OperateurController::class, 'add_post'])->name('operateur.add.post');
    
    Route::get('/caisse', [CaisseController::class, 'index'])->name('caisse.index');
    Route::get('/caisse/add', [CaisseController::class, 'add'])->name('caisse.add');
    Route::post('/caisse/add', [CaisseController::class, 'add_post'])->name('caisse.add.post');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

