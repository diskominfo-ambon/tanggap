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
      'id' => 'required|numeric',
      'status' => 'required|numeric'
    ]);

    $taskID = $req->id;
    $status = $req->status;

    $task = Task::findOrFail($taskID);
    $task->update(
      compact('status')
    );

    return new JsonResponse(['status' => __('Berhasil')], Response::HTTP_OK);
  }
}
