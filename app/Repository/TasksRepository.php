<?php

namespace App\Repository;

use App\Models\Task;
use App\Repository\Interface\TasksRepositoryInterface;

class TasksRepository implements TasksRepositoryInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }
}
