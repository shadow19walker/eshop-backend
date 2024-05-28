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

Route::apiResource('achatfournisseur', AchatfournisseurController::class);
Route::apiResource('categorie', CategorieController::class);
Route::apiResource('clientcarte',ClientcarteController::class);
Route::apiResource('commande',CommandeController::class);
Route::apiResource('expedition',\App\Http\Controllers\ExpeditionController::class);
Route::apiResource('facture', \App\Http\Controllers\FactureController::class);
Route::apiResource('fournisseur', \App\Http\Controllers\FournisseurController::class);
Route::apiResource('gestionnaire', \App\Http\Controllers\GestionnaireController::class);
Route::apiResource('gestionstock',\App\Http\Controllers\GestionstockController::class);
Route::apiResource('influenceur',\App\Http\Controllers\InfluenceurController::class);
Route::apiResource('lignecarte',\App\Http\Controllers\LignecarteController::class);
Route::apiResource('lignecommande',\App\Http\Controllers\LignecommandeController::class);
Route::apiResource('lignefacture',\App\Http\Controllers\LignefactureController::class);
Route::apiResource('messagerie',\App\Http\Controllers\MessagerieController::class);
Route::apiResource('paieinfluenceur',\App\Http\Controllers\PaieinfluenceurController::class);
Route::apiResource('photo',\App\Http\Controllers\PhotoController::class);
Route::apiResource('produit', ProduitController::class);
Route::apiResource('tontine',\App\Http\Controllers\TontineController::class);
Route::apiResource('ville',\App\Http\Controllers\VilleController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
