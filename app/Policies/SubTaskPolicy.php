<?php

namespace App\Policies;

use App\Models\SubTask;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubTaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view any subtask');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SubTask $subTask)
    {
        return $user->can('view subtasks') && optional($subTask->task)->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create subtasks');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SubTask $subTask)
    {
        return $user->can('update subtasks') && optional($subTask->task)->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SubTask $subTask)
    {
        return $user->can('dekete subtasks') && optional($subTask->task)->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SubTask $subTask)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubTask  $subTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SubTask $subTask)
    {
        return $user->can('force delete subtasks') && optional($subTask->task)->user_id === $user->id;
    }
}
