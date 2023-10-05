<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
Route::get('/a-propos', [PageController::class, 'apropos'])->name('apropos');
Route::get('/tarif', [PageController::class, 'tarif'])->name('tarif');
Route::get('/nous-contacter', [PageController::class, 'nouscontacter'])->name('nouscontacter');
Route::get('/signup_free', [PageController::class, 'signup_free'])->name('signup_free');
Route::post('/signup_free', [PageController::class, 'signup_free_post'])->name('signup_free_post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/monprofil', [AuthController::class, 'monprofil'])->name('monprofil');
Route::post('/monprofil', [AuthController::class, 'monprofil_update'])->name('monprofil');
Route::get('/supprimermoncompte', [AuthController::class, 'supprimermoncompte'])->name('supprimermoncompte');
Route::get('/abonnement', [AuthController::class, 'abonnement'])->name('abonnement');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
