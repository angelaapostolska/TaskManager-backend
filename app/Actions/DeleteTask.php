<?php

namespace App\Actions;

use App\Enums\TaskState;
use App\Models\Task;

class DeleteTask
{
    /**
     * Mark the task as deleted.
     * @param Task $task
     * @return void
     */
    public function handle(Task $task)
    {
        $task->state = TaskState::DELETED;
        $task->save();
    }
}
