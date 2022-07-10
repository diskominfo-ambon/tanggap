<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index() {
    $tasks = Auth::user()->getAssignments()->get('id');

    return view('staff.home', compact('tasks'));
  }
}
