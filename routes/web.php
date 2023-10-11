<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OperateurController;
use App\Http\Controllers\TransactionController;
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
    Route::get('/operateur/edit/{id}', [OperateurController::class, 'show'])->name('operateur.show');
    Route::post('/operateur/update', [OperateurController::class, 'update'])->name('operateur.update');
    Route::get('/operateur/delete/{id}', [OperateurController::class, 'delete'])->name('operateur.delete');
    
    Route::get('/caisse', [CaisseController::class, 'index'])->name('caisse.index');
    Route::get('/caisse/add', [CaisseController::class, 'add'])->name('caisse.add');
    Route::post('/caisse/add', [CaisseController::class, 'add_post'])->name('caisse.add.post');
    Route::get('/caisse/edit/{id}', [CaisseController::class, 'show'])->name('caisse.show');
    Route::post('/caisse/update', [CaisseController::class, 'update'])->name('caisse.update');
    Route::get('/caisse/delete/{id}', [CaisseController::class, 'delete'])->name('caisse.delete');

    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/add', [ClientController::class, 'add'])->name('client.add');
    Route::post('/client/add', [ClientController::class, 'add_post'])->name('client.add.post');
    Route::get('/client/edit/{id}', [ClientController::class, 'show'])->name('client.show');
    Route::post('/client/update', [ClientController::class, 'update'])->name('client.update');
    Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
    
    Route::get('/client/rechercher-client', [ClientController::class, 'rechercherClient'])->name('rechercher-client');

    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/add', [TransactionController::class, 'add'])->name('transaction.add');
    Route::post('/transaction/add/post', [TransactionController::class, 'add_post'])->name('transaction.add.post');
    Route::get('/transaction/edit/{id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/transaction/update', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/delete/{id}', [TransactionController::class, 'delete'])->name('transaction.delete');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

