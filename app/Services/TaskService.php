<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;

class TaskService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data) : Task
    {
        $task = Task::create($data);
        return $task;
    }

    public function get() : Collection
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function update(Task $task, array $data) : Task
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task) : void
    {
        $task->delete();
        return;
    }

    public function complete(Task $task) : Task
    {
        $task->is_completed = true;
        $task->save();
        return $task;
    }

    public function incomplete(Task $task) : Task
    {
        $task->is_completed = false;
        $task->save();
        return $task;
    }

    public function getInCompleted() : Collection
    {
        $tasks = Task::where('is_completed', false)->get();
        return $tasks;
    }
}
