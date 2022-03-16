<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Traits\RespondsWithHttpStatus;
use Domain\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Datatables;

class UserController extends Controller
{
  use RespondsWithHttpStatus;

  protected $userRepo;

  public function __construct(UserRepositoryInterface $userRepo)
  {
    $this->userRepo = $userRepo;
  }

  public function index(Request $request)
  {
    $data  = array(
      "page" => "users",
      "title" => "Users"
    );

    return view('portal.users.list', compact('data'));
  }


  public function datatables(Request $request)
  {
    return Datatables::of($this->userRepo->fetchDatatables())
      ->make(true);
  }

  public function create()
  {
    return view('portal.users.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|same:confirm-password',
    ]);

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);

    $user = $this->userRepo->create($input);

    return redirect()->route('portal.user.list')
      ->with($this->success("User created successfully", $user));
  }

  public function show($id)
  {
    $user = $this->userRepo->getByID($id);
    return view('portal.users.detail', compact('user'));
  }

  public function edit($id)
  {
    $user = $this->userRepo->getByID($id);
    return view('portal.users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'same:confirm-password',
    ]);

    $input = $request->all();
    if (!empty($input['password'])) {
      $input['password'] = Hash::make($input['password']);
    } else {
      $input = Arr::except($input, array('password'));
    }

    $user = $this->userRepo->getByID($id);
    $this->userRepo->update($user->id, $user);

    return redirect()->route('portal.users.list')
      ->with($this->success("User updated successfully", $user));
  }

  public function destroy($id)
  {
    $this->userRepo->delete($id);
    return redirect()->route('portal.users.list')
      ->with($this->success("User deleted successfully"));
  }
}
