<?php

namespace App\Repositories\Persistence;

use Domain\Blog\Blog;
use Domain\Blog\BlogRepositoryInterface;
use Ramsey\Uuid\Uuid;

class BlogRepository implements BlogRepositoryInterface
{
  protected $model;

  public function __construct(Blog $blog)
  {
    $this->model = $blog;
  }

  public function fetchDatatables()
  {
    return $this->model->select('blogs.id', 'blogs.title', 'blogs.slug', 'users.name', 'blogs.created_at', 'blogs.updated_at')
      ->join('users', 'users.id', '=', 'blogs.author_id')
      ->orderBy('blogs.title');
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

  public function fetchCursor($limit, $cursor, $search)
  {
    $res = $this->model
      ->where('created_at', '<', $cursor)
      ->orderBy('created_at', 'DESC')
      ->limit($limit);

    if ($search !== '') {
      $search = '%' . trim($search) . '%';
      $res->where('name', 'ILIKE', $search);
    }

    return $res;
  }

  public function getByID($id)
  {
    return $this->model->find($id);
  }

  public function create(Blog $data)
  {
    $cols = [
      'id' => $data->id,
      'author_id' => $data->author_id,
      'title' => $data->title,
      'thumbnail' => $data->thumbnail,
      'slug' => $data->slug,
      'content' => $data->content,
      'created_at' => 'now()',
      'updated_at' => 'now()',
    ];

    return $this->model->create($cols);
  }

  public function update(Blog $data)
  {
    $cols = [
      'author_id' => $data->author_id,
      'title' => $data->title,
      'thumbnail' => $data->thumbnail,
      'slug' => $data->slug,
      'content' => $data->content,
      'updated_at' => 'now()',
    ];
    $this->model->whereId($data->id)->update($cols);

    return $this->model->find($data->id);
  }

  public function delete($id)
  {
    return $this->model->find($id)->delete();
  }
}
