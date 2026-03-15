<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\EmpruntController;
use App\Models\Livre;

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

Route::get('/', function () {
    return view('accueil');
});

Route::get('/livres', [LivreController::class, 'index']);

Route::get('/emprunt', [EmpruntController::class, 'index']);

Route::post('/emprunt', [EmpruntController::class, 'store']);

Route::get('/retour',  function () {

    $livres = Livre::where('disponible', false)->get();

    return view('retour', compact('livres'));

});

Route::post('/retour', [EmpruntController::class, 'storeRetour']);

Route::get('/compte', function () {
    return view('compte');
});
