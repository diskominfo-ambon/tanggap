<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

  public function __invoke(Request $req) {

    $tasks = Task::with(['user', 'getAssignments'])->statusIn([Task::StatusCreated, Task::StatusInReview, Task::StatusDone])
    ->select('tasks.*')
    ->latest()
    ->paginate(20);


    return view('super-admin.tasks.home', compact('tasks'));
  }
}
