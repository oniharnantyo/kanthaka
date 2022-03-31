<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Domain\Permission\PermissionRepositoryInterface;
use Domain\Role\RoleRepositoryInterface;
use Domain\RoleHasPermission\RoleHasPermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Datatables;

class RoleController extends Controller
{

  protected $roleRepo, $permissionRepo,  $roleHasPermissionRepo;

  public function __construct(
    RoleRepositoryInterface $roleRepo,
    PermissionRepositoryInterface $permissionRepo,
    RoleHasPermissionRepositoryInterface $roleHasPermissionRepo
  ) {
    $this->roleRepo = $roleRepo;
    $this->permissionRepo = $permissionRepo;
    $this->roleHasPermissionRepo = $roleHasPermissionRepo;

    $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'show']]);
    $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:role-edit', ['only' => ['show', 'update']]);
    $this->middleware('permission:role-delete', ['only' => ['delete']]);
  }


  private $data  = array(
    "page" => "roles",
    "title" => "Roles"
  );

  public function index(Request $request)
  {
    $data  = $this->data;
    return view('portal.roles.list', compact('data'));
  }


  public function datatables(Request $request)
  {
    return DataTables::of($this->roleRepo->fetchAll())
      ->addIndexColumn()
      ->make(true);
  }

  public function create()
  {
    $data  = $this->data;
    $permissions = $this->permissionRepo->fetchAll();
    return view('portal.roles.create', compact('data', 'permissions'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|unique:roles,name',
      'permission' => 'required',
    ]);

    $role = new Role();
    $role->name = $request->input('name');;

    $role = $this->roleRepo->create($role);
    $role->syncPermissions($request->input('permission'));

    return redirect()->route('portal.roles.list')
      ->with([
        'result' => 'Role created successfully',
        'role' => $role,
      ]);
  }

  public function show($id)
  {
    $data  = $this->data;

    $role = $this->roleRepo->getByID($id);
    $permissions = $this->permissionRepo->fetchAll();
    $roleHasPermissions = $this->roleHasPermissionRepo->getByRoleID($role->id);

    return view('portal.roles.detail', compact('data', 'role', 'permissions', 'roleHasPermissions'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'permission' => 'required',
    ]);

    $role = $this->roleRepo->getByID($id);
    $role->name = $request->input('name');

    $this->roleRepo->update($role);
    $role->syncPermissions($request->input('permission'));

    return redirect()->route('portal.roles.detail', $id)
      ->with(['result' => 'Role updated successfully']);
  }

  public function delete($id)
  {
    $this->roleRepo->delete($id);
    return response()->json([
      'success' => 'Role deleted successfully!'
    ]);
  }
}
