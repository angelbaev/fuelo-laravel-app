<?php

namespace Tests\Feature;

use App\Models\Fuel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class FuelTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user, 'api');
    }

    public function test_index_returns_fuels()
    {
        Fuel::factory()->count(5)->create();
        $response = $this->json('GET', '/api/fuels');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'code',
                        'status',
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ]
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]);
    }

    public function test_show_returns_fuel()
    {
        $fuel = Fuel::factory()->create();

        $response = $this->json('GET', '/api/fuels/' .$fuel->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $fuel->name]);
    }

    public function test_show_returns_not_found()
    {
        $response = $this->json('GET', '/api/fuels/'. Str::uuid());

        $response->assertStatus(404);
    }
}
