<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class HomeController extends Controller
{
  public function __invoke()
  {

    $tasks = Auth::user()->assignments()->statusIn([Task::StatusDone])->select('tasks.id')->get();

    return view('staff.home', compact('tasks'));
  }
}
