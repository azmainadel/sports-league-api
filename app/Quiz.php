<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function problems()
    {
      return $this->belongsToMany(Problem::class);
    }
}
