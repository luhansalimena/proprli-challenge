<?php

namespace App\Actions\Tasks;

use App\Models\Task;


class CreateComment
{
    public static function execute(array $data, Task $task): Task
    {
        $task->comments()->create($data);
        return $task->load('comments');
    }
}
