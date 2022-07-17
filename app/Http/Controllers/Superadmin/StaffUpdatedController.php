<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class StaffUpdatedController extends Controller
{
  public function edit($id) {
    $user = User::findOrFail($id);

    return view('super-admin.staff.edit', compact('user'));
  }

  public function update(UserRequest $req, $id) {
    $body = $req->all();
    $user = User::findOrFail($id);


    $body['password'] = bcrypt($req->password);

    if ($req->password == null || Str::of($req->password)->trim()->isEmpty()) {
      $body['password'] = bcrypt($user->password);
    }

    $user->update($body);

    return redirect()->route('admin.staff.home')->with('flash_message', 'Berhasil mengubah staff');
  }
}
