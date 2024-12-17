<?php

namespace App\Enum;

enum TasksStatusesEnum: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';
}
