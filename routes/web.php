<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlateformController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Accueil
Route::get('/', [HomeController::class, 'index']);

// CRUD Plateformes
Route::get('/plateformes', [PlateformController::class, 'index']);
// Afficher le formulaire
Route::get('/plateformes/creer', [PlateformController::class, 'create']);
// Traiter le formulaire
Route::post('/plateformes/creer', [PlateformController::class, 'store']);

//CRUD JEUX VIDEOS

Route::get('/jeux',[GameController::class, 'index']);
Route::get('/jeux/creer',[GameController::class, 'create']);
Route::get('/jeu/{id}',[GameController::class, 'show']);
Route::post('/jeux/creer',[GameController::class, 'store']);
Route::get('/jeu/{id}/modifier',[GameController::class, 'edit'])->middleware('auth');
Route::post('/jeu/{id}/modifier',[GameController::class, 'update'])->middleware('auth');
Route::get('/jeu/{id}/supprimer',[GameController::class, 'destroy'])->middleware('auth');

//Connexion Déconnexion
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

//Inscription
Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'RegisterController@register');




