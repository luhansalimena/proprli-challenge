<?php

namespace App\Filters\Tasks;

use App\Models\Task;

class BuildingId
{
    public static function execute($tasks, $buildingId)
    {
        return $tasks->where('building_id', $buildingId);
    }
}
