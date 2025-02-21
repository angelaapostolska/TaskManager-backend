<?php

namespace App\Enums;

enum TaskCategory :string
{
    case URGENT  = "urgent";
    case MID = "mid";
    case LEAST_URGENT = "least urgent";
}
