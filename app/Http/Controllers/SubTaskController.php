<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\SubTask;
use App\Http\Requests\StoreSubTaskRequest;
use App\Http\Requests\UpdateSubTaskRequest;

class SubTaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(Task $task)
    {
        return view('pages.tasks.subtasks.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubTaskRequest  $request
     * @param  Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(StoreSubTaskRequest $request, Task $task)
    {
        $task->subTasks()->create($request->validated());

        return redirect()->route('tasks.show', $task->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Task $task, SubTask $subTask)
    {
        return view('pages.tasks.subtasks.edit', compact('task', 'subTask'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function update(UpdateSubTaskRequest $request, Task $task,  SubTask $subTask)
    {
        $subTask->update($request->validated());

        return redirect()->route('tasks.show', $task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function destroy(Task $task, SubTask $subTask)
    {
        $subTask->delete();

        return redirect()->route('tasks.show', $task->id);
    }
}
