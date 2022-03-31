<?php

namespace Domain\ModelHasRoles;

interface ModelHasRolesRepositoryInterface
{
  public function getByModelID($id);
  public function deleteByModelID($id);
}
