<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;

class LivreSeeder extends Seeder
{
    public function run(): void
    {
        $livres = [
            // Classiques français
            ['titre' => 'Le Petit Prince',                'auteur' => 'Antoine de Saint-Exupéry', 'disponible' => true],
            ['titre' => 'Les Misérables',                 'auteur' => 'Victor Hugo',               'disponible' => true],
            ['titre' => 'Notre-Dame de Paris',            'auteur' => 'Victor Hugo',               'disponible' => true],
            ['titre' => 'Le Comte de Monte-Cristo',       'auteur' => 'Alexandre Dumas',           'disponible' => true],
            ['titre' => 'Les Trois Mousquetaires',        'auteur' => 'Alexandre Dumas',           'disponible' => true],
            ['titre' => "L'Étranger",                     'auteur' => 'Albert Camus',              'disponible' => true],
            ['titre' => 'La Peste',                       'auteur' => 'Albert Camus',              'disponible' => true],
            ['titre' => 'Germinal',                       'auteur' => 'Émile Zola',                'disponible' => true],
            ['titre' => 'Madame Bovary',                  'auteur' => 'Gustave Flaubert',          'disponible' => true],
            ['titre' => 'Candide',                        'auteur' => 'Voltaire',                  'disponible' => true],

            // Littérature mondiale
            ['titre' => 'Harry Potter à l\'école des sorciers', 'auteur' => 'J.K. Rowling',       'disponible' => true],
            ['titre' => 'Harry Potter et la Chambre des secrets','auteur' => 'J.K. Rowling',       'disponible' => true],
            ['titre' => '1984',                           'auteur' => 'George Orwell',             'disponible' => true],
            ['titre' => 'La Ferme des animaux',           'auteur' => 'George Orwell',             'disponible' => true],
            ['titre' => 'Le Seigneur des Anneaux',        'auteur' => 'J.R.R. Tolkien',           'disponible' => true],
            ['titre' => 'Le Hobbit',                      'auteur' => 'J.R.R. Tolkien',           'disponible' => true],
            ['titre' => 'Dune',                           'auteur' => 'Frank Herbert',             'disponible' => true],
            ['titre' => 'Fondation',                      'auteur' => 'Isaac Asimov',              'disponible' => true],
            ['titre' => 'Fahrenheit 451',                 'auteur' => 'Ray Bradbury',              'disponible' => true],
            ['titre' => 'Brave New World',                'auteur' => 'Aldous Huxley',             'disponible' => true],

            // Romans populaires
            ['titre' => 'Da Vinci Code',                  'auteur' => 'Dan Brown',                 'disponible' => true],
            ['titre' => 'Inferno',                        'auteur' => 'Dan Brown',                 'disponible' => true],
            ['titre' => 'Twilight',                       'auteur' => 'Stephenie Meyer',           'disponible' => true],
            ['titre' => 'Hunger Games',                   'auteur' => 'Suzanne Collins',           'disponible' => true],
            ['titre' => 'Divergente',                     'auteur' => 'Veronica Roth',             'disponible' => true],
            ['titre' => 'La Vérité sur l\'affaire Harry Quebert', 'auteur' => 'Joël Dicker',      'disponible' => true],
            ['titre' => 'La Disparition de Stephanie Mailer',     'auteur' => 'Joël Dicker',      'disponible' => true],
            ['titre' => 'Gone Girl',                      'auteur' => 'Gillian Flynn',             'disponible' => true],
            ['titre' => 'The Girl with the Dragon Tattoo','auteur' => 'Stieg Larsson',            'disponible' => true],
            ['titre' => 'Millenium',                      'auteur' => 'Stieg Larsson',             'disponible' => true],

            // Développement personnel / essais
            ['titre' => 'L\'Art de la guerre',            'auteur' => 'Sun Tzu',                   'disponible' => true],
            ['titre' => 'Le Prince',                      'auteur' => 'Machiavel',                 'disponible' => true],
            ['titre' => 'Réfléchissez et devenez riche',  'auteur' => 'Napoleon Hill',             'disponible' => true],
            ['titre' => 'Les 7 habitudes',                'auteur' => 'Stephen Covey',             'disponible' => true],
            ['titre' => 'Père riche, père pauvre',        'auteur' => 'Robert Kiyosaki',           'disponible' => true],

            // Sciences / Informatique
            ['titre' => 'Le Gène égoïste',                'auteur' => 'Richard Dawkins',           'disponible' => true],
            ['titre' => 'Une brève histoire du temps',    'auteur' => 'Stephen Hawking',           'disponible' => true],
            ['titre' => 'Clean Code',                     'auteur' => 'Robert C. Martin',          'disponible' => true],
            ['titre' => 'The Pragmatic Programmer',       'auteur' => 'Andrew Hunt',               'disponible' => true],
            ['titre' => 'Design Patterns',                'auteur' => 'Gang of Four',              'disponible' => true],

            // Littérature jeunesse / BD
            ['titre' => 'Astérix le Gaulois',             'auteur' => 'René Goscinny',             'disponible' => true],
            ['titre' => 'Tintin au Tibet',                'auteur' => 'Hergé',                     'disponible' => true],
            ['titre' => 'Le Petit Nicolas',               'auteur' => 'René Goscinny',             'disponible' => true],
            ['titre' => 'Martine à la ferme',             'auteur' => 'Marcel Marlier',            'disponible' => true],
            ['titre' => 'Roald Dahl - Matilda',           'auteur' => 'Roald Dahl',                'disponible' => true],

            // Romans historiques
            ['titre' => 'Le Nom de la rose',              'auteur' => 'Umberto Eco',               'disponible' => true],
            ['titre' => 'Quo Vadis',                      'auteur' => 'Henryk Sienkiewicz',        'disponible' => true],
            ['titre' => 'Ben-Hur',                        'auteur' => 'Lew Wallace',               'disponible' => true],
            ['titre' => 'Les Piliers de la terre',        'auteur' => 'Ken Follett',               'disponible' => true],
            ['titre' => 'L\'Alchimiste',                  'auteur' => 'Paulo Coelho',              'disponible' => true],
        ];

        foreach ($livres as $livre) {
            Livre::create($livre);
        }
    }
}