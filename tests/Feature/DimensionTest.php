<?php

namespace Tests\Feature;

use App\Models\Dimension;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class DimensionTest extends TestCase
{

    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user, 'api');
    }


    public function test_index_returns_dimensions()
    {
        Dimension::factory()->count(5)->create();
        $response = $this->json('GET', '/api/dimensions');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'name',
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

    public function test_show_returns_dimension()
    {
        $dimension = Dimension::factory()->create();

        $response = $this->json('GET', '/api/dimensions/' .$dimension->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $dimension->name]);
    }

    public function test_show_returns_not_found()
    {
        $response = $this->json('GET', '/api/dimensions/'. Str::uuid());

        $response->assertStatus(404);
    }

}
