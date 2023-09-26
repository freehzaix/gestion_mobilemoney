<?php

use App\Http\Controllers\PageController;
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


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/a-propos', [PageController::class, 'apropos'])->name('apropos');
Route::get('/tarif', [PageController::class, 'tarif'])->name('tarif');
Route::get('/nous-contacter', [PageController::class, 'nouscontacter'])->name('nouscontacter');
Route::get('/signup_free', [PageController::class, 'signup_free'])->name('signup_free');
Route::post('/signup_free', [PageController::class, 'signup_free_post'])->name('signup_free_post');