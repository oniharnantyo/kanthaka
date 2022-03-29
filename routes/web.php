<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\RoleController;
use App\Http\Controllers\Portal\UserController;

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

    Route::prefix('users')->group(function () {
      Route::get('/', [UserController::class, 'index'])->name('portal.users.list');
      Route::get('/datatables', [UserController::class, 'datatables']);
      Route::get('/create', [UserController::class, 'create'])->name('portal.users.create');
      Route::post('/create', [UserController::class, 'store'])->name('portal.users.create.post');
      Route::get('/{id}', [UserController::class, 'show'])->name('portal.users.detail');
      Route::post('/{id}', [UserController::class, 'update'])->name('portal.users.update');
      Route::delete('/{id}', [UserController::class, 'delete'])->name('portal.users.delete');
    });

    Route::prefix('roles')->group(function () {
      Route::get('/', [RoleController::class, 'index'])->name('portal.roles.list');
      Route::get('/datatables', [RoleController::class, 'datatables']);
      Route::get('/create', [RoleController::class, 'create'])->name('portal.roles.create');
      Route::post('/create', [RoleController::class, 'store'])->name('portal.roles.create.post');
      Route::get('/{id}', [RoleController::class, 'show'])->name('portal.roles.detail');
      Route::post('/{id}', [RoleController::class, 'update'])->name('portal.roles.update');
      Route::delete('/{id}', [RoleController::class, 'delete'])->name('portal.roles.delete');
    });
  });
});
