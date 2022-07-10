<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;

class TaskCreatedController extends Controller
{

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

    // $tagIds = $req->tags;
    // $task->getTags()->attach($tagIds);

    return redirect()->route('government.tasks.home')->with('flash', __('Berhasil menambahkan task baru'));
  }
}
