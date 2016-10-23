<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    public function quizzes()
    {
      return $this->belongsToMany(Quiz::class);
    }
}
