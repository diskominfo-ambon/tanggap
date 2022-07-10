<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskShowController extends Controller
{
  public function __invoke($slug)
  {
    $task = Task::findSlug($slug)->first();

    abort_unless($task != null, Response::HTTP_NOT_FOUND);

    return view('government.tasks.show', compact('task'));
  }
}
