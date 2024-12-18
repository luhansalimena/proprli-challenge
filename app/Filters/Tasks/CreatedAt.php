<?php

namespace App\Filters\Tasks;
class CreatedAt
{
    public static function execute($tasks, $dates)
    {
        return $tasks->whereBetween('created_at', $dates);
    }
}
