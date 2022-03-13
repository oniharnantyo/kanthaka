<?php

namespace Domain\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;
  protected $dateFormat = 'Y-m-d H:i:s P';

  protected $casts = [
    'id' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];
}
