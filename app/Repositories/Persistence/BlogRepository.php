<?php

namespace App\Repositories\Persistence;

use Domain\Blog\Blog;
use Domain\Blog\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface {
  protected $model;

  public function __construct(Blog $blog)
  {
      $this->model = $blog;
  }

  public function FindAll() {
    return $this->model->all();
  }
}