<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadedController extends Controller
{
  public function __invoke(Request $req) {

    $req->validate([
      'upload' => 'required'
    ]);

    $file = $req->file('upload');
    $path = $file->store('uploaded', ['disk' => 'public']);

    // save on db.
    $attachment = Attachment::create([
      'name' => $file->getClientOriginalName(),
      'path' => $path,
      'type' => $file->getClientOriginalExtension(),
      'size' => $file->getSize()
    ]);

    return new JsonResponse([
      'url' => $attachment->fullPath,
      // 'error' => ['message' => '']
      ],
      Response::HTTP_OK
    );
  }
}
