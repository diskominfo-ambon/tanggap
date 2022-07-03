<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gift;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
  public function __invoke()
  {
    $user = Auth::user();
    $gifts = Gift::from($user)->latest()->paginate(20);

    return view('super-admin.gifts.home', compact('gifts'));
  }
}
