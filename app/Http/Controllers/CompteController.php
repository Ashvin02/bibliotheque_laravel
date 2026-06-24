<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;

class CompteController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $empruntsEnCours = Emprunt::with('livre')
            ->where('user_id', $user->id)
            ->whereNull('date_retour')
            ->latest()
            ->get();

        $historique = Emprunt::with('livre')
            ->where('user_id', $user->id)
            ->whereNotNull('date_retour')
            ->latest()
            ->get();

        return view('compte', compact('empruntsEnCours', 'historique'));
    }
}