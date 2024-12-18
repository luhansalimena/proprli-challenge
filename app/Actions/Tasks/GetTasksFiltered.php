<?php

namespace App\Actions\Tasks;

use App\Repository\Interface\TasksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetTasksFiltered
{
    private TasksRepositoryInterface $repository;

    public function __construct(TasksRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public static function execute(array $data, array $with = []): Collection
    {
        return app(self::class)->handle($data, $with);
    }

    public function handle(array $data, array $with = []): Collection
    {
        return $this->repository->getFiltered($data, $with);
    }
}
