<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_comment_for_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $commentData = ['content' => 'Test Comment','user_id' => $user->id];

        $response = $this->actingAs($user)
            ->postJson("/api/tasks/{$task->id}/comments", $commentData);

        $response->assertStatus(200)
            ->assertJson(Task::find($task->id)->toArray());

        $this->assertDatabaseHas('comments', [
            'task_id' => $task->id,
            'content' => $commentData['content']
        ]);
    }

    public function test_cannot_create_empty_comment()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)
            ->postJson("/api/tasks/{$task->id}/comments", ['content' => '']);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['content']);
    }

    public function test_cannot_create_comment_for_nonexistent_task()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/tasks/999/comments', ['content' => 'Test Comment']);

        $response->assertStatus(404);
    }
}
