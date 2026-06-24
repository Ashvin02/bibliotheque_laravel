<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livre;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Dashboard admin
    public function dashboard()
    {
        $stats = [
            'total_livres'    => Livre::count(),
            'livres_dispo'    => Livre::where('disponible', true)->count(),
            'livres_empruntes'=> Livre::where('disponible', false)->count(),
            'total_users'     => User::where('role', 'user')->count(),
            'total_emprunts'  => Emprunt::count(),
            'emprunts_encours'=> Emprunt::whereNull('date_retour')->count(),
        ];

        $derniers_emprunts = Emprunt::with(['user', 'livre'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'derniers_emprunts'));
    }

    // Liste des utilisateurs
    public function users()
    {
        $users = User::withCount('emprunts')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    // Modifier le rôle d'un utilisateur
    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|in:admin,user']);
        $user->update(['role' => $request->role]);
        return back()->with('success', "Rôle de {$user->name} mis à jour.");
    }

    // Supprimer un utilisateur
    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé.');
    }

    // Liste des livres (CRUD)
    public function livres()
    {
        $livres = Livre::orderBy('titre')->paginate(20);
        return view('admin.livres', compact('livres'));
    }

    // Créer un livre
    public function storeLivre(Request $request)
    {
        $request->validate([
            'titre'  => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
        ]);

        Livre::create([
            'titre'      => $request->titre,
            'auteur'     => $request->auteur,
            'disponible' => true,
        ]);

        return back()->with('success', 'Livre ajouté avec succès.');
    }

    // Modifier un livre
    public function updateLivre(Request $request, Livre $livre)
    {
        $request->validate([
            'titre'  => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
        ]);

        $livre->update([
            'titre'  => $request->titre,
            'auteur' => $request->auteur,
        ]);

        return back()->with('success', 'Livre modifié.');
    }

    // Supprimer un livre
    public function destroyLivre(Livre $livre)
    {
        if ($livre->emprunts()->whereNull('date_retour')->exists()) {
            return back()->with('error', 'Impossible de supprimer un livre actuellement emprunté.');
        }
        $livre->delete();
        return back()->with('success', 'Livre supprimé.');
    }

    // Liste de tous les emprunts
    public function emprunts()
    {
        $emprunts = Emprunt::with(['user', 'livre'])
            ->latest()
            ->paginate(20);
        return view('admin.emprunts', compact('emprunts'));
    }

    // Forcer le retour d'un livre
    public function forcerRetour(Emprunt $emprunt)
    {
        $emprunt->update(['date_retour' => now()]);
        $emprunt->livre->update(['disponible' => true]);
        return back()->with('success', 'Retour enregistré par l\'admin.');
    }
}