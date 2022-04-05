<?php

namespace Domain\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Blog extends Model
{
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = [
    'author_id',
    'title',
    'thumbnail',
    'slug',
    'content',
  ];

  protected $casts = [
    'id' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($blog) {
      $blog->id = Uuid::uuid4()->toString();
      $blog->slug = Str::slug($blog->title);
    });
  }
}
