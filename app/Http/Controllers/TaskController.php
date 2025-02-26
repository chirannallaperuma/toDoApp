<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index() {
        return response()->json($this->taskService->getTasks());
    }

    public function store(Request $request) {
        return response()->json($this->taskService->create($request->all()));
    }

    public function update($id) {
        return response()->json($this->taskService->completeTask($id));
    }
}
