<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controller::class, 'homeview'])->name('Home');
Route::get('/inscription', [UserController::class, 'returnviewinscription'])->name('Inscription');
Route::post('/inscription', [UserController::class, 'inscription'])->name('Inscription.post');


Route::get('/connexion', [UserController::class, 'returnviewconnexion'])->name('Connexion');
Route::post('/connexion', [UserController::class, 'connexion'])->name('Connexion.post');
Route::get('/deconnexion', [Usercontroller::class, 'deconnexion'])->name('Deconnexion');

Route::get('/landing', [LandingController::class, 'returnview'])->name('Landing')->middleware('auth');
Route::post('/landing', [LandingController::class, 'code_validated'])->name('code_validate')->middleware('auth');

Route::get('/information', [InformationController::class, 'returnview'])->middleware('auth')->name('Information');
Route::post('/information', [InformationController::class, 'modification'])->middleware('auth')->name('Information.modification');


Route::get('/budget', [BudgetController::class, 'budgetview'])->name('Budget')->middleware('auth');

Route::post('/formulaire', [LandingController::class, 'formulaire'])->name('Formulaire')->middleware('auth');

Route::get('/suppression/{id}', [LandingController::class, 'suppression'])->name('Suppression')->middleware('auth');

Route::get('/suppression2/{id}', [LandingController::class, 'suppression2'])->name('Suppression2')->middleware('auth');
