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
            ['name' => 'Jean Dupont',       'email' => 'jean@mail.fr', 'password' => Hash::make('jdupont'), 'role' => 'user'],
            ['name' => 'Marie Curie',       'email' => 'marie@mail.fr', 'password' => Hash::make('mcurie'), 'role' => 'user'],
            ['name' => 'Lucas Bernard',     'email' => 'lucas@mail.fr', 'password' => Hash::make('lbernard'), 'role' => 'user'],
            ['name' => 'Emma Petit',        'email' => 'emma@mail.fr', 'password' => Hash::make('epetit'), 'role' => 'user'],
            ['name' => 'Noah Thomas',       'email' => 'noah@mail.fr', 'password' => Hash::make('nthomas'), 'role' => 'user'],
            ['name' => 'Chloé Richard',     'email' => 'chloe@mail.fr', 'password' => Hash::make('crichard'), 'role' => 'user'],
            ['name' => 'Hugo Moreau',       'email' => 'hugo@mail.fr', 'password' => Hash::make('hmoreau'), 'role' => 'user'],
            ['name' => 'Inès Simon',        'email' => 'ines@mail.fr', 'password' => Hash::make('isimon'), 'role' => 'user'],
            ['name' => 'Théo Laurent',      'email' => 'theo@mail.fr', 'password' => Hash::make('tlaurent'), 'role' => 'user'],
            ['name' => 'Camille Lefebvre',  'email' => 'camille@mail.fr', 'password' => Hash::make('clefebvre'), 'role' => 'user'],
            ['name' => 'Utilisateur Test',  'email' => 'user@bibliotek.fr', 'password' => Hash::make('utest'), 'role' => 'user'],
        ];

        foreach ($users as $user) {
            User::create([
                'name'     => $user['name'],
                'email'    => $user['email'],
                'password' => Hash::make('password'),
                'role'     => $user['role'],
            ]);
        }
    }
}