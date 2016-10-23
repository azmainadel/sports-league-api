<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];

    public function replies()
    {
      return $this->hasMany(Reply::class);
    }
}
