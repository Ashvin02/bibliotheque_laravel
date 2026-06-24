<?php

namespace Tests\Feature;

use Tests\TestCase;

class LivreTest extends TestCase
{
    public function test_livres_page_loads()
    {
        $response = $this->get('/livres');

        $response->assertStatus(200);
    }
}