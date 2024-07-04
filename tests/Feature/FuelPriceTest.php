<?php

namespace Tests\Feature;

use App\Models\FuelPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class FuelPriceTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user, 'api');
    }

    public function test_index_returns_prices()
    {
        FuelPrice::factory()->count(5)->create();
        $response = $this->json('GET', '/api/prices');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'fuel',
                        'dimension',
                        'price',
                        'date',
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

    public function test_show_returns_price()
    {
        $fuelPrice = FuelPrice::factory()->create();

        $response = $this->json('GET', '/api/prices/' .$fuelPrice->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['price' => $fuelPrice->price]);
    }

    public function test_show_returns_not_found()
    {
        $response = $this->json('GET', '/api/prices/'. Str::uuid());

        $response->assertStatus(404);
    }
}
