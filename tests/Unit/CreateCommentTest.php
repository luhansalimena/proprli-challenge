<?php

namespace Tests\Unit\Actions\Comments;

use App\Actions\Comments\CreateComment;
use App\Models\Task;
use App\Repository\Interface\CommentsRepositoryInterface;
use Mockery;
use Tests\TestCase;

class CreateCommentTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_execute_creates_comment()
    {
        $data = ['content' => 'Test Comment'];
        $task = Mockery::mock(Task::class)->makePartial();
        $expectedTask = new Task();

        $repositoryMock = Mockery::mock(CommentsRepositoryInterface::class);
        $repositoryMock->shouldReceive('create')
            ->once()
            ->with($data, $task)
            ->andReturn($expectedTask);

        $this->app->instance(CommentsRepositoryInterface::class, $repositoryMock);

        $result = CreateComment::execute($data, $task);

        $this->assertInstanceOf(Task::class, $result);
    }

    public function test_execute_with_empty_content()
    {
        $data = ['content' => ''];
        $task = Mockery::mock(Task::class)->makePartial();
        $expectedTask = new Task();

        $repositoryMock = Mockery::mock(CommentsRepositoryInterface::class);
        $repositoryMock->shouldReceive('create')
            ->once()
            ->with($data, $task)
            ->andReturn($expectedTask);

        $this->app->instance(CommentsRepositoryInterface::class, $repositoryMock);

        $result = CreateComment::execute($data, $task);

        $this->assertInstanceOf(Task::class, $result);
    }
}
