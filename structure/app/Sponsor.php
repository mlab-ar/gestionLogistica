<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
  {
    return 'id';
  }
  public function photos()
  {
      return $this->hasMany(Foto::class);
  }

  public function evento()
  {
    return $this->belongsTo(Evento::class);
  }
}
