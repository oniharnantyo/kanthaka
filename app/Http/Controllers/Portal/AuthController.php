<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
  public function login()
  {
    return view('portal.login');
  }

  public function postLogin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::guard('portal')->attempt(['email' => $request->email, 'password' => $request->password])) {
      Session::put('name', $request->name);
      Session::put('email', $request->email);
      return redirect()->intended('/portal');
    }

    return redirect()->back()->with(['login' => 'Password Invalid / Inactive Users']);
  }

  public function logout()
  {
    if (Auth::guard('portal')->check()) {
      Auth::guard('portal')->logout();
    }

    Session::flush();

    return redirect('/portal');
  }
}
