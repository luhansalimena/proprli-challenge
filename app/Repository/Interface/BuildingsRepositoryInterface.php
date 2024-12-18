<?php

namespace App\Repository\Interface;

use App\Models\Building;
use Illuminate\Database\Eloquent\Collection;

interface BuildingsRepositoryInterface
{
    public function getAll(): Collection;
    public function create(array $data): Building;
}
