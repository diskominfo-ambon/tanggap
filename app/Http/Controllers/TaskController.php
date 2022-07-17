<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
  public function __invoke()
  {

    $tasks = Auth::user()
      ->assignments()
      ->with(['user', 'tags', 'replies.id'])
      ->statusIn([Task::StatusBacklog, Task::StatusOnProgress, Task::StatusInReview])
      ->latest()
      ->get();


    return new JsonResponse(
      [
        'data' => [
          'tasks' => $tasks,
          'link_to_updated' => route('task.updated'),
          'link_to_show' => '',
        ],
      ]
      , Response::HTTP_OK);
  }
}
