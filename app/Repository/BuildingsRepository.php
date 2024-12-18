<?php

namespace App\Repository;

use App\Models\Building;
use App\Repository\Interface\BuildingsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BuildingsRepository implements BuildingsRepositoryInterface
{
    public function getAll(): Collection
    {
        return Building::all();
    }

    public function create(array $data): Building
    {
        return Building::create($data);
    }
}
