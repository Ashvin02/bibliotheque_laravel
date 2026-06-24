<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivreTest extends TestCase
{
    use RefreshDatabase;
    public function test_livres_page_loads()
    {
        $response = $this->get('/livres');

        $response->assertStatus(200);
    }
}