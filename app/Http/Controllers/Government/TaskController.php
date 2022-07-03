<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
  public function __invoke()
  {
    $tasks = Task::paginate(20)
      ->appends(['q']);

    // $tasks = Task::StatusIn([Task::StatusDone])->paginate(20);
    // $tasks = Auth::user()->getAssignments()->StatusIn([Task::StatusDone])->latest()->paginate(20);

    return view('government.tasks.home', compact('tasks'));
  }
}
