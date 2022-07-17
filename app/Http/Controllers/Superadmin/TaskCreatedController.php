<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Concerns\EligiableAttachment;
use App\Models\Tag;

class TaskCreatedController extends Controller
{

  use EligiableAttachment;


  public function index() {
    $tags = Tag::all();
    $users = User::role(User::Staff)->get();

    return view('super-admin.tasks.new', compact('tags', 'users'));
  }

  public function store(TaskRequest $req)
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
      $user->assignments()->attach($task);
    }

    // tags
    $tagIds = $req->tags;
    $task->tags()->attach($tagIds);

    // attachments
    $files = $req->file('attachments');
    $attachments = $this->eligiable($files);

    $task->attachments()->attach($attachments);

    return redirect()->route('admin.task.home')->with('flash_message', __('Berhasil menambahkan task baru'));
  }
}
