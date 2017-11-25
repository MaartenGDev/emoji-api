<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreGroupTaskRequest;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GroupTaskController extends ApiController
{
    public function index()
    {
        return $this->respondOk(Group::with('tasks')->get());
    }

    public function update(Task $task, StoreGroupTaskRequest $request)
    {
        $task->position = $request->position;
        $task->save();

        return $this->respondOk($task);
    }
}
