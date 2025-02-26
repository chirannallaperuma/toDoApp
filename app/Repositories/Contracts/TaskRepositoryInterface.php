<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface extends BaseRepositoryInterface
{
    public function getRecentTasks();

    public function markAsCompleted($id);
}
