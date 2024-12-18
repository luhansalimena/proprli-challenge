<?php

namespace Tests\Feature;

use App\Models\Building;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BuildingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_buildings_list()
    {
        Building::factory()->count(3)->create();

        $response = $this->getJson('/api/buildings');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function test_can_create_building()
    {
        $buildingData = [
            'name' => 'Test Building',
        ];

        $response = $this->postJson('/api/buildings', $buildingData);

        $response->assertStatus(201)
            ->assertJsonFragment($buildingData);
    }

    public function test_cannot_create_building_name_is_required()
    {
        $response = $this->postJson('/api/buildings');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
