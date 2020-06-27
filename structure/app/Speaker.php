<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
  {
    return 'id';
  }

  public function evento()
  {
    return $this->belongsTo(Evento::class);
  }

  // public function agenda()
  // {
  //   return $this->belongsTo(Agenda::class);
  // }

  public function photos()
  {
      return $this->hasMany(Photo::class);
  }

}
