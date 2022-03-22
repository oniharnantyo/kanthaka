<?php

namespace Domain\User;

interface UserRepositoryInterface
{
  public function fetchDatatables();
  public function fetch($limit, $offset, $search);
  public function getByID($id);
  public function getByEmail($email);
  public function create($data);
  public function update($id, $data);
  public function delete($id);
}
