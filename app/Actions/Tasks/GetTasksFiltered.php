<?php

namespace App\Actions\Tasks;

use App\Models\Task;


class GetTasksFiltered
{
    public static function execute(array $data)
    {
        $tasks = Task::query();

        if (isset($data['building_id'])) {
            $tasks = Filters\BuildingId::execute($tasks, $data['building_id']);
        }

        if (isset($data['status'])) {
            $tasks = Filters\Status::execute($tasks, $data['status']);
        }

        if (isset($data['created_at'])) {
            $tasks = Filters\CreatedAt::execute($tasks, $data['created_at']);
        }

        return $tasks->get();
    }
}
