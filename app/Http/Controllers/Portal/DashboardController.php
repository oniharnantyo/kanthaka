<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index()
  {
    $data  = array(
      "page" => "dashboard",
      "title" => "Dashboard"
    );
    return view('portal.dashboard', compact('data'));
  }
}
