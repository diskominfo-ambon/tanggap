<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
  public function __invoke()
  {
    $tasks = Auth::user()->getAssignments()->statusIn([Task::StatusDone])->latest()->paginate(20);

    return view('staff.tasks.home', compact('tasks'));
  }
}

