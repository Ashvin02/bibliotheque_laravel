<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Livre;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpruntTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_exists()
    {
        Livre::create([
            'titre' => 'Le Petit Prince',
            'auteur' => 'Antoine de Saint-Exupéry',
            'disponible' => true,
        ]);

        $livre = Livre::first();

        $this->assertNotNull($livre);
    }
}