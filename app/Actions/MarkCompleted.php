<?php

namespace App\Actions;

use App\Enums\TaskState;
use App\Models\Task;

class MarkCompleted
{
    /**
     * Mark the task as completed.
     * @param Task $task
     * @return void
     */
    public function handle(Task $task): void
    {
        $task->state = TaskState::COMPLETED;
        $task->save();
    }
}
