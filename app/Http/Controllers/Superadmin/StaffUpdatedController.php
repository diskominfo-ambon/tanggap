<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class StaffUpdatedController extends Controller
{
  public function index($id) {
    $user = User::findOrFail($id);

    return view('super-admin.staff.edit', compact('user'));
  }

  public function update(UserRequest $req, $id) {
    $body = $req->all();
    $user = User::findOrFail($id);
    $user->update($body);

    return redirect()->route('super-admin.staff.home')->with('flash', 'Berhasil mengubah staff');
  }
}
