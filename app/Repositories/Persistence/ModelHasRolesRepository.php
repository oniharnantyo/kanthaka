<?php

namespace App\Repositories\Persistence;

use Domain\ModelHasRoles\ModelHasRolesRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ModelHasRolesRepository implements ModelHasRolesRepositoryInterface
{
  public function getByModelID($id)
  {
    return DB::table('model_has_roles')->where('model_id', $id)->get();
  }

  public function deleteByModelID($id)
  {
    return DB::table('model_has_roles')->where('model_id', $id)->delete();
  }
}
