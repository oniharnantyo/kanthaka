<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
  public function login()
  {
    return view('portal.login');
  }
}
