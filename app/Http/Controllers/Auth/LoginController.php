<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectTo(): string {
      $currentRole = Auth::user()->roles()->first();
      $to = "";

      switch ($currentRole->name) {
        case User::Government:
          $to = RouteServiceProvider::GovernmentHome;
          break;
        case User::Staff:
          $to = RouteServiceProvider::StaffHome;
          break;
          default:
          $to = RouteServiceProvider::SuperAdminHome;
          break;
      }

      return $to;
    }


    public function loggedOut() {
      return redirect()->route('login');
    }
}
