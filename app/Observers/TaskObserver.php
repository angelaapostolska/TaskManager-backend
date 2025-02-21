<?php

namespace App\Observers;

use App\Enums\TaskState;
use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "creating" event.
     */
    public function creating(Task $task): void
    {
        $task->state = TaskState::PENDING;
        $task->save();
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
