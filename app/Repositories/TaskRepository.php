<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function create($data)
    {
        return Task::create($data);
    }

    public function update($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function getPending()
    {
        return Task::where('is_completed', false)->get();
    }
}