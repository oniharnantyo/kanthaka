<?php

namespace Domain\Role;

use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
  public function fetchAll();
  public function getByID($id);
  public function create(Role $data);
  public function update(Role $data);
  public function delete($id);
}
