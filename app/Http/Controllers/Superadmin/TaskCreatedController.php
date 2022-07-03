<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskCreatedController extends Controller
{
  public function __invoke(TaskRequest $req)
  {
    $tagIds = $req->tags;
    $userId = $req->user;

    $task = new Task();

    $task->title = $req->title;
    $task->content = $req->content;
    $task->status = Task::StatusBacklog;
    $task->generateToken(); // create token for tracking task progress.

    $task->save();

    $task->getTags()->attach($tagIds);


    // delegated task assignment to spesific user.
    $user = User::find($userId);

    if ($user != null ) {
      $user->getAssignments()->attach($task);
    }

    return redirect()->route('')->with('flash_message', __('Berhasil menambahkan task baru'));
  }
}
