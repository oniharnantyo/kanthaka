<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::prefix('portal')->group(function () {
  Route::get('/', function () {
    return redirect('/portal/dashboard');
  });

  Route::get('/login',  [AuthController::class, 'login'])->middleware('guest');
  Route::post('/login',  [AuthController::class, 'postlogin']);
  Route::get('/logout',  [AuthController::class, 'logout']);

  Route::middleware(['auth:portal'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
  });
});
