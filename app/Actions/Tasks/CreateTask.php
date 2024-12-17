<?php

namespace App\Actions\Tasks;

use App\Models\Task;


class CreateTask
{
    public static function execute(array $data): Task
    {
        return Task::create($data);
    }
}
