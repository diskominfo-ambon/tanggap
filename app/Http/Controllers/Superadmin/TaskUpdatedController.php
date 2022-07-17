<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Tag;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Concerns\EligiableAttachment;

class TaskUpdatedController extends Controller
{

  use EligiableAttachment;


  public function edit($id) {

    $task = Task::findOrFail($id);
    $tags = Tag::all();
    $users = User::role(User::Staff)->get();

    return view('super-admin.tasks.edit', compact('users', 'tags', 'task'));
  }

  public function update(TaskRequest $req, $id)
  {
    $tagIds = $req->tags;
    $userId = $req->user;

    $task = Task::findOrFail($id);

    $task->title = $req->title;
    $task->content = $req->content;
    $task->status = $req->status;
    $task->generateToken(); // create token for tracking task progress.

    $task->save();

    $task->tags()->sync($tagIds);


    // delegated task assignment to spesific user.
    $user = User::find($userId);

    if ($user != null ) {
      $user->assignments()->sync($task);
    }

    // tags
    $tagIds = $req->tags;
    $task->tags()->sync($tagIds);

    // attachments
    if ($req->hasFile('attachments')) {
      $files = $req->file('attachments');
      $attachments = $this->eligiable($files);

      $task->attachments()->sync($attachments);
    }

    return redirect()->route('admin.task.home')->with('flash_message', __('Berhasil menyimpan perubahan task'));
  }
}
