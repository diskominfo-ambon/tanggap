<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TaskUpdatedController extends Controller
{
  public function __invoke(Request $req)
  {
    $req->validate([
      'id' => 'required',
      'board' => 'required', // board target.
      'statusSource' => 'required|numeric',
      'statusTarget' => 'required|numeric',
    ]);

    $taskID = (int) $req->id;
    $status = (int) $req->statusTarget;

    $task = Task::findOrFail($taskID);
    $task->status = $status;
    $task->save();

    $pivot = $task->getAssignments[0]->pivot;
    $task->getAssignments()->updateExistingPivot($pivot->id, ['created_at' => now()]);

    return new JsonResponse(['status' => __('Berhasil'), 'task' => $task ], Response::HTTP_OK);
  }
}
