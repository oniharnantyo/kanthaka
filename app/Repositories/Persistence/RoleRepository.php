<?php

namespace App\Repositories\Persistence;

use Domain\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
  protected $model;

  public function __construct(Role $role)
  {
    $this->model = $role;
  }

  public function fetchAll()
  {
    return $this->model->get();
  }

  public function getByID($id)
  {
    return $this->model->find($id);
  }

  public function create(Role $data)
  {
    $cols = [
      'name' => $data->name,
    ];

    return $this->model->create($cols);
  }

  public function update(Role $data)
  {
    $cols = [
      'id' => $data->id,
      'name' => $data->name,
      'updated_at' => 'now()',
    ];

    return $this->model->update($cols);
  }

  public function delete($id)
  {
    return $this->model->find($id)->delete();
  }
}
