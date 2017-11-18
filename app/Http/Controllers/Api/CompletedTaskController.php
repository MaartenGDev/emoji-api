<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\ApiController;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompletedTaskController extends ApiController
{
    public function index(){
        return $this->respondOk(Group::with('tasks')->get());
    }
}
