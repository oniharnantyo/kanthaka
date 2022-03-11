<?php
namespace Domain\User;

interface UserRepositoryInterface {
  public function GetByID($id): User;
}
