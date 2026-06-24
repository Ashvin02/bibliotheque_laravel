<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Livre;

class EmpruntTest extends TestCase
{
    public function test_book_exists()
    {
        $livre = Livre::first();

        $this->assertNotNull($livre);
    }
}