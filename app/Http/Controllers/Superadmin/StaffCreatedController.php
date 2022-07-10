<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class StaffCreatedController extends Controller
{
  public function index() {
    return view('super-admin.staff.new');
  }

  public function store(UserRequest $req) {
    $body = $req->all();
    $user = User::create($body);

    $user->assignRole(User::Staff);

    return redirect()->route('super-admin.staff.home')->with('flash', 'Berhasil menambahkan staff');
  }
}
