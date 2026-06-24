<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emprunt;
use App\Models\User;
use App\Models\Livre;
use Carbon\Carbon;

class EmpruntSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les users normaux (pas les admins)
        $users = User::where('role', 'user')->get();
        // Récupérer les livres indisponibles pour créer des emprunts actifs
        $livresIndisponibles = Livre::where('disponible', false)->get();

        // Créer un emprunt actif pour chaque livre indisponible
        foreach ($livresIndisponibles as $index => $livre) {
            $user = $users[$index % $users->count()];
            Emprunt::create([
                'user_id'      => $user->id,
                'livre_id'     => $livre->id,
                'date_emprunt' => Carbon::now()->subDays(rand(1, 20)),
                'date_retour'  => null,
            ]);
        }

        // Créer des emprunts passés (retournés)
        $livresDisponibles = Livre::where('disponible', true)->take(15)->get();
        foreach ($livresDisponibles as $index => $livre) {
            $user = $users[$index % $users->count()];
            $dateEmprunt = Carbon::now()->subDays(rand(30, 90));
            Emprunt::create([
                'user_id'      => $user->id,
                'livre_id'     => $livre->id,
                'date_emprunt' => $dateEmprunt,
                'date_retour'  => $dateEmprunt->copy()->addDays(rand(5, 21)),
            ]);
        }
    }
}