<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmptyResponseController extends Controller
{
    public function index(){
      return '';
    }
}
