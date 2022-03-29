<?php

namespace Domain\Permission;

interface PermissionRepositoryInterface
{
  public function fetchAll();
  public function getByRoleID($roleID);
}
