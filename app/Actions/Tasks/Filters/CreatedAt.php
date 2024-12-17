<?php

namespace App\Actions\Tasks\Filters;

class CreatedAt
{
    public static function execute($tasks, $dates)
    {
        return $tasks->whereBetween('created_at', $dates);
    }
}
