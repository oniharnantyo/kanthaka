<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Domain\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

  private $userRepo;

  public function __construct(UserRepositoryInterface $userRepo)
  {
    $this->userRepo = $userRepo;
  }

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

    $email = $request->input('email');
    try {
      $this->userRepo->getByEmail($email);
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['email' => 'Email not found'])->with(['email' => $email]);
    }

    if (Auth::guard('portal')->attempt(['email' => $request->email, 'password' => $request->password])) {
      Session::put('name', $request->name);
      Session::put('email', $request->email);
      return redirect()->intended('/portal');
    }

    return redirect()->back()->withErrors(['password' => 'Invalid password']);
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
