<?php

namespace Domain\RoleHasPermission;

interface RoleHasPermissionRepositoryInterface
{
  public function getByRoleID($id);
}
