<?php

namespace App\Repository\Interface;

use Illuminate\Support\Collection;


interface TasksRepositoryInterface
{
    public function create(array $data);
    public function getFiltered(array $data, array $with = []): Collection;
}
