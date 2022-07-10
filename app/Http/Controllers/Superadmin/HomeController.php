<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
  public function __invoke() {
    $tasks = Task::all('id');

    return view('super-admin.home', compact('tasks'));
  }
}
