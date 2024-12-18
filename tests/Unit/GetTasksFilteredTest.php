<?php
namespace Tests\Unit\Actions\Tasks;

use App\Actions\Tasks\GetTasksFiltered;
use App\Models\Task;
use App\Repository\Interface\TasksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Tests\TestCase;

class GetTasksFilteredTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_execute_gets_filtered_tasks()
    {
        $data = ['building_id' => 1];
        $with = ['comments'];
        $expectedCollection = new Collection([new Task()]);

        $repositoryMock = Mockery::mock(TasksRepositoryInterface::class);
        $repositoryMock->shouldReceive('getFiltered')
            ->once()
            ->with($data, $with)
            ->andReturn($expectedCollection);

        $this->app->instance(TasksRepositoryInterface::class, $repositoryMock);

        $result = GetTasksFiltered::execute($data, $with);

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertEquals($expectedCollection, $result);
    }

    public function test_execute_with_empty_filters()
    {
        $data = [];
        $with = [];
        $expectedCollection = new Collection([]);

        $repositoryMock = Mockery::mock(TasksRepositoryInterface::class);
        $repositoryMock->shouldReceive('getFiltered')
            ->once()
            ->with($data, $with)
            ->andReturn($expectedCollection);

        $this->app->instance(TasksRepositoryInterface::class, $repositoryMock);

        $result = GetTasksFiltered::execute($data);

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertEquals($expectedCollection, $result);
    }
}
