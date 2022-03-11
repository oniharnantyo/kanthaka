<?php 

namespace App\Repositories\Persistence;

use Domain\User\User;
use Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
  
  protected $model;

  public function __construct(User $user)
  {
      $this->model = $user;
  }
  
  public function GetById($id): User {
    return $this->model->find($id);
  }
}