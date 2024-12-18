<?php

namespace App\Repository;

use App\Models\Task;
use App\Repository\Interface\CommentsRepositoryInterface;

class CommentsRepository implements CommentsRepositoryInterface
{
    public function create(array $data, Task $task): Task
    {
        $task->comments()->create($data);
        return $task->load('comments');
    }
}
