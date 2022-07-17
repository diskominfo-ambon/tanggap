<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function __invoke()
  {
    $tasks = Auth::user()->getAssignments()
      ->StatusIn([Task::StatusCreated, Task::StatusDone])
      ->latest()
      ->paginate(20);

    return view('government.tasks.home', compact('tasks'));
  }
}
