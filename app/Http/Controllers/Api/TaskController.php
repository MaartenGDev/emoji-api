<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreTaskRequest;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends ApiController
{
    public function index(){
        return $this->respondOk(Task::all());
    }

    public function update(Task $task, StoreTaskRequest $request)
    {
        $task->position = $request->position;
        $task->save();

        return $this->respondOk($task);
    }
}
