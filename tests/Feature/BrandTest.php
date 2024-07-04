<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user, 'api');
    }

    public function test_index_returns_brands()
    {
        Brand::factory()->count(5)->create();
        $response = $this->json('GET', '/api/brands');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'logo',
                        'src_id',
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

    public function test_store_creates_brand()
    {
        $data = [
            'name' => 'Test Brand',
            'logo' => 'logo.jpg',
            'src_id' => 1,
            'status' => Brand::STATUS_ACTIVE
        ];

        $response =$this->json('POST', '/api/brands', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Test Brand']);

        $this->assertDatabaseHas('brands', ['name' => 'Test Brand']);
    }

    public function test_store_creates_validation_brand()
    {
        $data = [
            'name' => 'Test Brand',
            'logo' => 'logo.jpg',
            'src_id' => 1
        ];

        $response =$this->json('POST', '/api/brands', $data);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['status']);
    }

    public function test_show_returns_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->json('GET', '/api/brands/' .$brand->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $brand->name]);
    }

    public function test_show_returns_not_found()
    {
        $response = $this->json('GET', '/api/brands/'. Str::uuid());

        $response->assertStatus(404);
    }


    public function test_update_modifies_brand()
    {
        $brand = Brand::factory()->create();

        $data = [
            'name' => 'Updated Brand',
            'logo' => $brand->logo,
            'src_id' => $brand->src_id,
            'status' => $brand->status
        ];

        $response = $this->json('PUT', '/api/brands/' .$brand->id, $data);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated Brand']);

        $this->assertDatabaseHas('brands', ['id' => $brand->id, 'name' => 'Updated Brand']);
    }

    public function test_destroy_deletes_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->json('DELETE', '/api/brands/' .$brand->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('brands', ['id' => $brand->id]);
    }
}
