<?php

use App\Http\Controllers\AchatfournisseurController;
use App\Http\Controllers\CategorieController;
use \App\Http\Controllers\ClientcarteController;
use \App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('achatfournisseur', AchatfournisseurController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('clientcarte',ClientcarteController::class);
Route::resource('commande',CommandeController::class);
Route::resource('expedition',\App\Http\Controllers\ExpeditionController::class);
Route::resource('facture', \App\Http\Controllers\FactureController::class);
Route::resource('fournisseur', \App\Http\Controllers\FournisseurController::class);
Route::resource('gestionnaire', \App\Http\Controllers\GestionnaireController::class);
Route::resource('gestionstock',\App\Http\Controllers\GestionstockController::class);
Route::resource('influenceur',\App\Http\Controllers\InfluenceurController::class);
Route::resource('lignecarte',\App\Http\Controllers\LignecarteController::class);
Route::resource('lignecommande',\App\Http\Controllers\LignecommandeController::class);
Route::resource('lignefacture',\App\Http\Controllers\LignefactureController::class);
Route::resource('messagerie',\App\Http\Controllers\MessagerieController::class);
Route::resource('paieinfluenceur',\App\Http\Controllers\PaieinfluenceurController::class);
Route::resource('photo',\App\Http\Controllers\PhotoController::class);
Route::resource('produit', ProduitController::class);
Route::resource('tontine',\App\Http\Controllers\TontineController::class);
Route::resource('ville',\App\Http\Controllers\VilleController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
