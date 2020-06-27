<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  protected $guarded = [];

  protected $dates = ['published_at'];

  public function getRouteKeyName()
  {
    return 'url';
  }
  public function oradores()
  {
      return $this->hasMany(Speaker::class);
  }

  public function agenda()
  {
      return $this->hasMany(Agenda::class);
  }

  public function photos()
  {
      return $this->hasMany(Photoe::class);
  }
}
