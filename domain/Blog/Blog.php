<?php
namespace Domain\Blog;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Blog extends Model {
  protected $dateFormat = 'Y-m-d H:i:s P';

  protected $casts = [
	  'id' => 'uuid',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];
}
