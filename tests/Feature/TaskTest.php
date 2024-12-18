<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_tasks_list()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'title',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function test_can_create_task()
    {
        $user = User::factory()->create();
        $building = Building::factory()->create();

        $taskData = [
            'title' => 'Test Task',
            'user_id' => $user->id,
            'status' => 'OPEN',
            'building_id' => $building->id
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201)
            ->assertJson([
                'title' => $taskData['title'],
                'user_id' => $user->id
            ]);

        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_cannot_create_task_without_data()
    {
        $response = $this->postJson('/api/tasks', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title','user_id','status','building_id']);
    }

    public function test_cannot_create_task_status_is_not_valid()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'user_id' => 1,
            'status' => 'INVALID',
            'building_id' => 1
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['status']);
    }
}
