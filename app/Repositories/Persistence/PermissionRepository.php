<?php

namespace App\Repositories\Persistence;

use Domain\Role\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
  protected $model;

  public function __construct(Permission $permission)
  {
    $this->model = $permission;
  }

  public function fetchAll()
  {
    return $this->model->get();
  }

  public function getPermissionByID($id)
  {
    return $this->model
      ->join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
      ->where("role_has_permissions.role_id", $id)
      ->get();
  }
}
