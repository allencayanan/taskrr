<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class SeedTaskPermissions extends Migration
{
    private $taskPermissions = [
        'view any task',
        'view tasks',
        'create tasks',
        'update tasks',
        'delete tasks',
        'force delete tasks',
    ];

    private $subTaskPermissions = [
        'view any subtask',
        'view subtasks',
        'create subtasks',
        'update subtasks',
        'delete subtasks',
        'force delete subtasks',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $editorRole = Role::updateOrCreate(['name' => Role::ROLE_EDITOR]);

        foreach (array_merge($this->taskPermissions, $this->subTaskPermissions) as $permission) {
            $editorRole->givePermissionTo(Permission::updateOrCreate([
                'name' => $permission,
            ]));
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', Role::ROLE_EDITOR)->delete();
        Permission::whereIn('name', array_merge($this->taskPermissions, $this->subTaskPermissions))->delete();
    }
}
