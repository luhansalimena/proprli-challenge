<?php

namespace App\Repository\Interface;

use Illuminate\Database\Eloquent\Collection;

interface BuildingsRepositoryInterface
{
    public function getAll(): Collection;
}
