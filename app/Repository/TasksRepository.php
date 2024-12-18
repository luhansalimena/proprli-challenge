<?php

namespace App\Repository;

use App\Filters\Tasks\AssignedUser;
use App\Filters\Tasks\BuildingId;
use App\Filters\Tasks\CreatedAt;
use App\Filters\Tasks\Status;
use App\Models\Task;
use App\Repository\Interface\TasksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TasksRepository implements TasksRepositoryInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }

    public function getFiltered(array $data, array $with = []): Collection
    {
        $tasks = Task::query()->with($with);

        if (isset($data['building_id'])) {
            $tasks = BuildingId::execute($tasks, $data['building_id']);
        }

        if (isset($data['status'])) {
            $tasks = Status::execute($tasks, $data['status']);
        }

        if (isset($data['created_at'])) {
            $tasks = CreatedAt::execute($tasks, $data['created_at']);
        }

        if (isset($data['assigned_user'])) {
            $tasks = AssignedUser::execute($tasks, $data['assigned_user']);
        }

        return $tasks->get();
    }
}
