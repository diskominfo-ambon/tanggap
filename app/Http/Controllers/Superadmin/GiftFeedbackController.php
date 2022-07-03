<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftFeedbackController extends Controller
{
  public function __invoke(GiftRequest $req) {
    $userIds = $req->user;

    $gift = new Gift();

  }
}
