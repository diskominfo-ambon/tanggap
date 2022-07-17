<?php

namespace App\Http\Controllers\Concerns;

use App\Models\Attachment;

trait EligiableAttachment {

  public function eligiable(array $files): array {
    // attachments store temp
    $data = [];

    foreach ($files as $file) {
      $path = $file->store('uploaded', ['disk' => 'public']);

      $data[] = [
        'name' => $file->getClientOriginalName(),
        'type' => $file->getClientOriginalExtension(),
        'path' => $path,
        'size' => $file->getSize()
      ];
    }

    $attachments = Attachment::insert($data);

    return $attachments;
  }
}
