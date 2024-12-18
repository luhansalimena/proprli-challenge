<?php

namespace Tests\Unit\Actions\Buildings;

use App\Actions\Buildings\CreateBuilding;
use App\Models\Building;
use App\Repository\Interface\BuildingsRepositoryInterface;
use Mockery;
use Tests\TestCase;

class CreateBuildingTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_execute_creates_building()
    {
        $data = [
            'name' => 'Test Building',
            'address' => 'Rua Teste'
        ];

        $expectedBuilding = new Building();
        $expectedBuilding->name = 'Test Building';
        $expectedBuilding->address = 'Rua Teste';

        $repositoryMock = Mockery::mock(BuildingsRepositoryInterface::class);
        $repositoryMock->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn($expectedBuilding);

        $this->app->instance(BuildingsRepositoryInterface::class, $repositoryMock);

        $result = CreateBuilding::execute($data);

        $this->assertInstanceOf(Building::class, $result);
        $this->assertEquals($expectedBuilding, $result);
    }
}
