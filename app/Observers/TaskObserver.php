<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        $task->update([
            'status' => Task::STATUS_TRASHED,
        ]);

        $task->subTasks()->delete();
    }
}
