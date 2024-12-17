<?php

namespace App\Actions\Tasks\Filters;

class AssignedUser
{
    public static function execute($tasks, $userId)
    {
        return $tasks->where('user_id', $userId);
    }
}
