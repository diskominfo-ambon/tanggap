<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
  public function __invoke() {
    $users = User::role(User::Staff)->latest()->paginate(20);

    return view('super-admin.staff.home', compact('users'));
  }
}
