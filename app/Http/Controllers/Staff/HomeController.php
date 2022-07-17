<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function __invoke()
  {

    $tasks = Auth::user()->assignments()->select('tasks.id')->get();

    return view('staff.home', compact('tasks'));
  }
}
