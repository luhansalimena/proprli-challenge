<?php

namespace App\Actions\Tasks;

use App\Models\Task;
use App\Repository\Interface\TasksRepositoryInterface;

class CreateTask
{
    private TasksRepositoryInterface $repository;

    public function __construct(TasksRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public static function execute(array $data): Task
    {
        $instance = app()->make(self::class);
        return $instance->handle($data);
    }

    public function handle(array $data): Task
    {
        return $this->repository->create($data);
    }
}
