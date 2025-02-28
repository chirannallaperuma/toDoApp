<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends BaseService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        parent::__construct($taskRepository);
        $this->taskRepository = $taskRepository;
    }

    public function getTasks()
    {
        return $this->taskRepository->getRecentTasks();
    }

    public function completeTask($id)
    {
        return $this->taskRepository->markAsCompleted($id);
    }
}
