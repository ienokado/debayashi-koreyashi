<?php

namespace Tests\Feature\Http\Controllers\Debayashi;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RankingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouting()
    {
        $response = $this->get('/debayashi/ranking');

        $response->assertStatus(200);
    }
}
