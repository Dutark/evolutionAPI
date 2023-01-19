<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/produits', [ProduitsController::class, "liste"]);
Route::get('/produits/{id}', [ProduitsController::class, "detail"]);
Route::post('/produits', [ProduitsController::class, "ajouter"]);

Route::get('/produitsEuros/{id}', [ProduitsController::class, "listeProduitsDeviseEuros"]);
Route::get('/produitsUSD/{id}', [ProduitsController::class, "listeProduitsDeviseUSD"]);
Route::get('/produitsBTC/{id}', [ProduitsController::class, "listeProduitsDeviseBTC"]);


Route::post('/commandes', [CommandeController::class, "ajouterCommande"]);
Route::get('/commandes/{idClient}', [CommandeController::class, "commandesClient"]);
Route::delete('/commandes/{idCommande}', [CommandeController::class, "supprimerCommande"]);

Route::get('/client', [ClientController::class, "listeClients"]);