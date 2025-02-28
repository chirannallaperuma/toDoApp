<?php

namespace App\Repositories;

use App\Models\TaskModel;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(TaskModel $model)
    {
        parent::__construct($model);
    }

    public function getRecentTasks()
    {
        return $this->model->where('completed', false)->latest()->take(5)->get();
    }

    public function markAsCompleted($id)
    {
        return $this->model->where('id', $id)->update(['completed' => true]);
    }
}
