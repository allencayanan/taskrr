<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $search = $request->input('search');
        $sortBy = $request->input('sortBy', 'asc');

        if (! in_array($sortBy, ['asc', 'desc'])) {
            $sortBy = 'asc';
        }

        $tasks = Task::where('user_id', $user->id)
            ->with('subTasks')
            ->withCount('subTasks')
            ->when(! empty($search), function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->when($request->input('withTrashed'), function ($query) {
                $query->withTrashed();
            })
            ->orderBy('created_at', $sortBy)
            ->get();

        return view('pages.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('pages.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(StoreTaskRequest $request)
    {
        $user = $request->user();

        $data = array_merge($request->validated(), [
            'user_id' => $user->id,
        ]);

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Task $task)
    {
        $task->load([
            'subTasks' => function ($query) { $query->withTrashed(); }
        ]);

        return view('pages.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Task $task)
    {
        return view('pages.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.show', $task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function destroy(Task $task)
    {
        if ($task->trashed()) {
            $task->subTasks()->forceDelete();
            $task->forceDelete();
        } else {
            $task->delete();
        }

        return redirect()->route('tasks.index');
    }
}
