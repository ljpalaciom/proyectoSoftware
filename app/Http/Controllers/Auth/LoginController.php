<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
  /*
  |----------------------------------------------------------Utions.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');

  }

  protected function authenticated(Request $request, User $user) {
    if($user){
      $baseUrl = $user->getBaseUrl();
      if ($baseUrl){
        return redirect($baseUrl);
      }
    }
    return redirect()->intended($this->redirectPath());
  }
}
