<?php

namespace Domain\Blog;

interface BlogRepositoryInterface
{
  public function fetchDatatables();
  public function fetch($limit, $offset, $search);
  public function fetchCursor($limit, $cursor, $search);
  public function getByID($id);
  public function create(Blog $data);
  public function update(Blog $data);
  public function delete($id);
}
