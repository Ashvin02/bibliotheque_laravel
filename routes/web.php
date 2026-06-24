<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/livres', function () {

    $livres = Livre::all();

    return view('livres', compact('livres'));

})->name('livres');

Route::get('/compte', function () {
    return view('compte');
})->name('compte');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/emprunt', function () {
     $livres = Livre::all();
    return view('emprunt', compact('livres'));
})->name('emprunt');

Route::get('/retour', function () {
     $livres = Livre::all();
    return view('retour', compact('livres'));
})->name('retour');

Route::get('/template', function () {
    return view('template');
})->name('template');
