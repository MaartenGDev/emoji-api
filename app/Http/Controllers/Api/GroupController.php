<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends ApiController
{
    public function index(){
        return $this->respondOk(Group::all());
    }
}
