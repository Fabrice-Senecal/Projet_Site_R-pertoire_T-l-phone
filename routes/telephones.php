<?php

use App\Http\Controllers\TelephoneController;
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

Route::get('/', function () {
    return view('welcome');
});
/** Vers l'index des numéros associé à un compte */
Route::get('/telephones/index-perso', [TelephoneController::class, 'indexPerso'])
    ->middleware(['auth', 'verified'])->name('telephones.indexPerso');

/** Vers l'index des numéros similaire à la recherche */
Route::get('/telephones/index-similaire', [TelephoneController::class, 'indexSimilaire']);

/** Vers la création d'un votes */
Route::resource('votes', \App\Http\Controllers\VoteController::class)->only([
    'store'
])->middleware(['auth', 'verified']);

/** Vers la création d'un commentaire */
Route::resource('commentaires', \App\Http\Controllers\CommentaireController::class)->only([
    'store'
])->middleware(['auth', 'verified']);

/** Vers supprimer un telephone */
Route::delete('/telephones/{telephone}', [TelephoneController::class, 'destroy'])->name('telephones.destroy')
    ->middleware(['auth', 'verified']);

/** Routes RESTful du telephone */
Route::resource('telephones', TelephoneController::class)->only([
    'index',
    'show',
    'create',
    'store'
])->parameters([
    'telephones' => 'telephone'
]);

/** Route associé a la recherche */
Route::get('/recherche', [TelephoneController::class, 'recherche'])->name('recherche');


