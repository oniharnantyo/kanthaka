<?php

namespace Domain\Role;

interface PermissionRepositoryInterface
{
  public function fetchAll();
  public function getPermissionByID($id);
}
