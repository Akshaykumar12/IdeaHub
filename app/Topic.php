<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function ideas()
    {
      return $this->hasMany('App\Idea');
    }
  
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
