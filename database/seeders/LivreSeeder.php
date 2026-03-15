<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livres')->insert([
    [
    'titre' => 'Le Petit Prince',
    'auteur' => 'Antoine de Saint-Exupéry',
    'disponible' => true
    ],
    [
    'titre' => 'Harry Potter',
    'auteur' => 'J.K Rowling',
    'disponible' => true
    ],
    [
    'titre' => '1984',
    'auteur' => 'George Orwell',
    'disponible' => true
    ],
    [
    'titre' => 'Le Seigneur des Anneaux',
    'auteur' => 'J.R.R Tolkien',
    'disponible' => true
    ],
    [
    'titre' => 'Le Comte de Monte-Cristo',
    'auteur' => 'Alexandre Dumas',
    'disponible' => true
    ],
    [
    'titre' => 'L\ Étranger',
    'auteur' => 'Albert Camus',
    'disponible' => true
    ]
    ]);
    }
}
