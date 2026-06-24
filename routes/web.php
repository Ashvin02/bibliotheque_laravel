<?php

use Illuminate\Support\Facades\Route;
use App\Models\Livre;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('accueil');
});

Route::get('/livres', function () {
    $livres = Livre::all();
    return view('livres', compact('livres'));
})->name('livres');

Route::get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/compte', [CompteController::class, 'index'])->name('compte');
    Route::get('/emprunt', function () {
        $livres = Livre::where('disponible', true)->get();
        return view('emprunt', compact('livres'));
    })->name('emprunt');
    Route::post('/emprunt', [App\Http\Controllers\EmpruntController::class, 'store'])->name('emprunt.store');
    Route::get('/retour', function () {
        $livres = Livre::all();
        return view('retour', compact('livres'));
    })->name('retour');
    Route::post('/retour', [App\Http\Controllers\EmpruntController::class, 'storeRetour'])->name('retour.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.role');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/livres', [AdminController::class, 'livres'])->name('livres');
    Route::post('/livres', [AdminController::class, 'storeLivre'])->name('livres.store');
    Route::patch('/livres/{livre}', [AdminController::class, 'updateLivre'])->name('livres.update');
    Route::delete('/livres/{livre}', [AdminController::class, 'destroyLivre'])->name('livres.destroy');
    Route::get('/emprunts', [AdminController::class, 'emprunts'])->name('emprunts');
    Route::patch('/emprunts/{emprunt}/retour', [AdminController::class, 'forcerRetour'])->name('emprunts.retour');
});

require __DIR__.'/auth.php';