<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Task;


class TaskController extends Controller
{
  public function __invoke()
  {
    $user =  Auth::user();
    // $tasks = $user->getAssignments()->greaterThan(Task::StatusCreated)->latest();
    $tasks = Task::with(['user', 'tags', 'replies.id'])->greaterThan(Task::StatusCreated)->latest()->get();



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
