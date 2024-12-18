<?php

namespace Tests\Unit\Actions\Tasks;

use App\Actions\Tasks\CreateTask;
use App\Models\Task;
use App\Repository\Interface\TasksRepositoryInterface;
use Mockery;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_execute_creates_task()
    {
        $data = ['title' => 'Test Task'];
        $expectedTask = new Task();
        $expectedTask->title = 'Test Task';

        $repositoryMock = Mockery::mock(TasksRepositoryInterface::class);
        $repositoryMock->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn($expectedTask);

        $action = new CreateTask($repositoryMock);

        $result = $action->handle($data);

        $this->assertInstanceOf(Task::class, $result);
        $this->assertEquals('Test Task', $result->title);
    }
}
