<?php

namespace App\Filters\Tasks;

class Status
{
    public static function execute($tasks, $status)
    {
        return $tasks->where('status', $status);
    }
}
