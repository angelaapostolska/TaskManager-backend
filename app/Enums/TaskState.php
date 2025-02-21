<?php

namespace App\Enums;

enum TaskState :string
{
    case PENDING = "pending";
    case COMPLETED = "completed";
    case DELETED = "deleted";
}
