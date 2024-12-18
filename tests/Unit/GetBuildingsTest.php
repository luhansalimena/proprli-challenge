<?php

namespace Tests\Unit\Actions\Buildings;

use App\Actions\Buildings\GetBuildings;
use App\Models\Building;
use App\Repository\Interface\BuildingsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Tests\TestCase;

class GetBuildingsTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_execute_returns_collection()
    {
        $expectedCollection = new Collection([new Building()]);

        $repositoryMock = Mockery::mock(BuildingsRepositoryInterface::class);
        $repositoryMock->shouldReceive('getAll')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedCollection);

        $this->app->instance(BuildingsRepositoryInterface::class, $repositoryMock);

        $result = GetBuildings::execute();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertEquals($expectedCollection, $result);
    }
}
