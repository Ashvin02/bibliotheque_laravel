<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    // Affichage de la liste des livres disponibles
public function index()
{
    $livres = Livre::where('disponible', true)
                   ->orderBy('titre')
                   ->paginate(15); // 15 livres par page

    // Emprunts en cours de l'utilisateur connecté (pour info)
    $empruntsEnCours = Emprunt::where('user_id', Auth::id())
                               ->whereNull('date_retour')
                               ->with('livre')
                               ->get();

    return view('emprunts.index', compact('livres', 'empruntsEnCours'));
}

// Emprunter un livre
public function store(Request $request)
{
    $request->validate([
        'livre_id' => 'required|exists:livres,id',
    ]);

    $livre = Livre::findOrFail($request->livre_id);

    // Vérifier que le livre est toujours disponible
    if (!$livre->disponible) {
        return back()->with('error', 'Ce livre n\'est plus disponible.');
    }

    // Créer l'emprunt
    Emprunt::create([
        'user_id'      => Auth::id(),
        'livre_id'     => $livre->id,
        'date_emprunt' => Carbon::today(),
    ]);

    // Marquer le livre comme indisponible
    $livre->update(['disponible' => false]);

    return back()->with('success', "\"$livre->titre\" emprunté avec succès.");
}
}
