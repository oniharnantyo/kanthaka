<?php

namespace App\Repositories\Persistence;

use Domain\RoleHasPermission\RoleHasPermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionRepository implements RoleHasPermissionRepositoryInterface
{
  public function getByRoleID($id)
  {
    return DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
      ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
      ->all();
  }
}
