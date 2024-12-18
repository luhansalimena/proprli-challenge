<?php

namespace App\Repository\Interface;

use App\Models\Task;


interface CommentsRepositoryInterface
{
    public function create(array $data, Task $task): Task;
}
