<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Traits\RespondsWithHttpStatus;
use Domain\ModelHasRoles\ModelHasRolesRepositoryInterface;
use Domain\Role\RoleRepositoryInterface;
use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Datatables;

class UserController extends Controller
{
  use RespondsWithHttpStatus;

  protected $userRepo, $roleRepo, $modelHasRolesRepo;

  public function __construct(
    UserRepositoryInterface $userRepo,
    RoleRepositoryInterface $roleRepo,
    ModelHasRolesRepositoryInterface $modelHasRolesRepo,
  ) {
    $this->userRepo = $userRepo;
    $this->roleRepo = $roleRepo;
    $this->modelHasRolesRepo = $modelHasRolesRepo;

    $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
    $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:user-edit', ['only' => ['show', 'update']]);
    $this->middleware('permission:user-delete', ['only' => ['delete']]);
  }

  private $data  = array(
    "page" => "users",
    "title" => "Users"
  );

  public function index(Request $request)
  {
    $data  = $this->data;
    return view('portal.users.list', compact('data'));
  }


  public function datatables(Request $request)
  {
    return Datatables::of($this->userRepo->fetchDatatables())
      ->addIndexColumn()
      ->make(true);
  }

  public function create()
  {
    $data = $this->data;
    $roles = $this->roleRepo->fetchAll();
    return view('portal.users.create', compact('data', 'roles'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|same:confirm-password',
      'role' => 'required'
    ]);

    $input = $request->all();

    $user = new User();
    $user->name = $input['name'];
    $user->email = $input['email'];
    $user->password = Hash::make($input['password']);

    $user = $this->userRepo->create($user);
    $user->assignRole($request->input('role'));

    return redirect()->route('portal.users.list')
      ->with([
        'result' => 'User created successfully',
      ]);
  }

  public function show($id)
  {
    $data  = $this->data;

    $user = $this->userRepo->getByID($id);
    $roles = $this->roleRepo->fetchAll();
    $userRoles = $this->modelHasRolesRepo->getByModelID($id);
    return view('portal.users.detail', compact('data', 'user', 'roles', 'userRoles'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'same:confirm-password',
      'role' => 'required'
    ]);

    $user = $this->userRepo->getByID($id);
    $user->name = $request->name;
    $user->email = $request->email;

    if (!empty($input['password'])) {
      $user->password = Hash::make($request->password);
    }

    $user = $this->userRepo->update($user);
    $this->modelHasRolesRepo->deleteByModelID($id);
    $user->assignRole($request->input('role'));

    return redirect()->route('portal.users.detail', $id)
      ->with(['result' => 'User updated successfully']);
  }

  public function delete($id)
  {
    $this->userRepo->delete($id);
    return response()->json([
      'success' => 'User deleted successfully!'
    ]);
  }
}
