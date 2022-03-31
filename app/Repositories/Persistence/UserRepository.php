<?php

namespace App\Repositories\Persistence;

use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{

  protected $model;

  public function __construct(User $user)
  {
    $this->model = $user;
  }

  public function fetchDatatables()
  {
    return $this->model->orderBy('name');
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

  public function getByEmail($email)
  {
    return $this->model->where('email', $email)->firstOrFail();
  }

  public function create(User $data)
  {
    $cols = [
      'name' => $data->name,
      'email' => $data->email,
      'password' => $data->password,
      'created_at' => 'now()',
      'updated_at' => 'now()',
    ];

    return $this->model->create($cols);
  }

  public function update(User $data)
  {
    $cols = [
      'name' => $data->name,
      'email' => $data->email,
      'updated_at' => 'now()',
    ];

    if ($data->password != '') {
      $cols['password'] = $data->password;
    }

    $this->model->whereId($data->id)->update($cols);

    return $this->model->find($data->id);
  }

  public function delete($id)
  {
    return $this->model->find($id)->delete();
  }
}
