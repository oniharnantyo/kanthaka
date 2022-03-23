<?php

namespace Domain\User;

interface UserRepositoryInterface
{
  public function fetchDatatables();
  public function fetch($limit, $offset, $search);
  public function getByID($id);
  public function getByEmail($email);
  public function create(User $data);
  public function update(User $data);
  public function delete($id);
}
