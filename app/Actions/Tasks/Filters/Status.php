<?php

namespace App\Actions\Tasks\Filters;

class Status
{
    public static function execute($tasks, $status)
    {
        return $tasks->where('status', $status);
    }
}
