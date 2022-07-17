<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
  public function __invoke()
  {
    $status = [Task::StatusDone];

    if (Auth::user()->hasRole(User::Government)) {
      $status = [Task::StatusCreated, Task::StatusDone];
    }


    $tasks = Auth::user()->assignments()
      ->statusIn($status)
      ->latest()
      ->paginate(20);


    return view('tasks.home', compact('tasks'));
  }
}
