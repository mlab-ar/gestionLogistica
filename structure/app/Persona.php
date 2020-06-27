<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
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
}
