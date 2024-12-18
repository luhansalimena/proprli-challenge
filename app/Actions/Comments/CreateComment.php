<?php

namespace App\Actions\Comments;

use App\Models\Task;
use App\Repository\Interface\CommentsRepositoryInterface;

class CreateComment
{
    private CommentsRepositoryInterface $repository;

    public function __construct(CommentsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public static function execute(array $data, Task $task): Task
    {
        return app(self::class)->handle($data, $task);
    }

    public function handle(array $data, Task $task): Task
    {
        return $this->repository->create($data, $task);
    }
}
