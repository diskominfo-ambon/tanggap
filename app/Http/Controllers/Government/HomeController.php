<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
  public function __invoke()
  {
    $tasks = Task::StatusIn([Task::StatusDone])->get();


    // $tasks = Auth::user()->getAssignments()->StatusIn([Task::StatusDone])->latest()->get();

    return view('government.home', compact('tasks'));
  }
}
