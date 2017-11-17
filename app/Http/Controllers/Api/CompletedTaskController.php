<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompletedTaskController extends Controller
{
    public function index(){

        return response()->json(Group::with('tasks')->get());
    }
}
