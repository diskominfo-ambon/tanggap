<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;

class TaskUpdatedController extends Controller
{
  public function index($id) {
    $task = Task::findOrFail($id);

    return view('government.tasks.edit', compact('task'));
  }

  public function update(TaskRequest $req, $id)
  {
    $tags = $req->tags;
    $task = Task::findOrFail($id);

    if ($task->status != Task::StatusBacklog) {
      return Redirect::back()->with('flash', 'Task tidak dapat edit karna sudah ditinjau oleh admin');
    }

    $task->title = $req->title;
    $task->content = $req->content;
    $task->save();
    // tags
    $task->tags()->sync($tags);

    // attachments
    $files = $req->file('attachments');
    $attachments = $this->eligiable($files);

    $task->attachments()->sync($attachments);

    return Redirect::route('government.home');
  }
}
