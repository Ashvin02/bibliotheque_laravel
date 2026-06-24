<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin principal
        User::create([
            'name'     => 'Administrateur',
            'email'    => 'admin@bibliotek.fr',
            'password' => Hash::make('admin1234'),
            'role'     => 'admin',
        ]);

        // Bibliothécaire
        User::create([
            'name'     => 'Sophie Martin',
            'email'    => 'sophie@bibliotek.fr',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Utilisateurs normaux
        $users = [
            ['name' => 'Jean Dupont',       'email' => 'jean@mail.fr'],
            ['name' => 'Marie Curie',       'email' => 'marie@mail.fr'],
            ['name' => 'Lucas Bernard',     'email' => 'lucas@mail.fr'],
            ['name' => 'Emma Petit',        'email' => 'emma@mail.fr'],
            ['name' => 'Noah Thomas',       'email' => 'noah@mail.fr'],
            ['name' => 'Chloé Richard',     'email' => 'chloe@mail.fr'],
            ['name' => 'Hugo Moreau',       'email' => 'hugo@mail.fr'],
            ['name' => 'Inès Simon',        'email' => 'ines@mail.fr'],
            ['name' => 'Théo Laurent',      'email' => 'theo@mail.fr'],
            ['name' => 'Camille Lefebvre',  'email' => 'camille@mail.fr'],
            ['name' => 'Utilisateur Test',  'email' => 'user@bibliotek.fr'],
        ];

        foreach ($users as $user) {
            User::create([
                'name'     => $user['name'],
                'email'    => $user['email'],
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]);
        }
    }
}