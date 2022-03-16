<?php

namespace App\Repositories\Persistence;

use Domain\User\User;
use Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

  protected $model;

  public function __construct(User $user)
  {
    $this->model = $user;
  }

  public function fetchDatatables()
  {
    return $this->model->orderByDesc('name');
  }

  public function fetch($limit, $offset, $search)
  {
    $res = $this->model
      ->orderBy('name', 'ASC')
      ->limit($limit)
      ->offset($offset)
      ->paginate();

    if ($search !== '') {
      $search = '%' . trim($search) . '%';
      $res->where('name', 'ILIKE', $search);
    }

    return $res;
  }


  public function getById($id)
  {
    return $this->model->find($id);
  }

  public function create($data)
  {
    $this->model->create($data);
  }

  public function update($id, $data)
  {
    return $this->model->whereId($id)->update($data);
  }

  public function delete($id)
  {
    return $this->model->destroy($id);
  }
}
