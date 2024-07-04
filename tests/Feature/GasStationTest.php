<?php

namespace Tests\Feature;

use App\Models\GasStation;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class GasStationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user, 'api');
    }

    public function test_index_returns_gasstations()
    {
        GasStation::factory()->count(5)->create();
        $response = $this->json('GET', '/api/gasstations');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'src_id',
                        'brand_src_id',
                        'name',
                        'city',
                        'address',
                        'lat',
                        'lon',
                        'brand',
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

    public function test_show_returns_gasstation()
    {
        $gasStation = GasStation::factory()->create();

        $response = $this->json('GET', '/api/gasstations/' .$gasStation->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $gasStation->name]);
    }

    public function test_show_returns_not_found()
    {
        $response = $this->json('GET', '/api/gasstations/'. Str::uuid());

        $response->assertStatus(404);
    }

}
