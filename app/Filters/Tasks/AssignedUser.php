<?php

namespace App\Filters\Tasks;

class AssignedUser
{
    public static function execute($tasks, $userId)
    {
        return $tasks->where('user_id', $userId);
    }
}
