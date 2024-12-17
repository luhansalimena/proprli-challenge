<?php

namespace App\Actions\Tasks\Filters;

use App\Models\Task;

class BuildingId
{
    public static function execute($tasks, $buildingId)
    {
        return $tasks->where('building_id', $buildingId);
    }
}
