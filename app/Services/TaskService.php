<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function create($data)
    {
        $task = $this->taskRepository->create($data);
        return [
            'title' => $task->title,
            'is_complete' => $task->is_complete,
            'created_at' => $task->created_at
        ];
    }

    public function update($id, $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function getPending()
    {
        return $this->taskRepository->getPending();
    }
}