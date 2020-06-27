<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
  {
    return 'id';
  }
  public function photos()
  {
      return $this->hasMany(Movie::class);
  }

  public function evento()
  {
    return $this->belongsTo(Evento::class);
  }
}
