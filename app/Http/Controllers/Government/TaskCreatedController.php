<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Tag;
use App\Models\Attachment;
use App\Http\Controllers\Concerns\EligiableAttachment;

class TaskCreatedController extends Controller
{

  use EligiableAttachment;

  public function index()
  {
    $tags = Tag::all();

    return view('government.tasks.new', compact('tags'));
  }


  public function store(TaskRequest $req)
  {
    $task = new Task();
    $task->title = $req->title;
    $task->content = $req->content;
    $task->user_id = 1;

    $task->save();

    // tags
    $tagIds = $req->tags;
    $task->tags()->attach($tagIds);

    // attachments
    $files = $req->file('attachments');
    $attachments = $this->eligiable($files);
    $attachmentIds = Arr::pluck($attachments, 'id');

    $task->attachments()->attach($attachmentIds);



    return redirect()->route('government.task.home')->with('flash', __('Berhasil menambahkan task baru'));
  }
}
