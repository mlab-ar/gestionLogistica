<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
  protected $guarded = [];

  protected static function boot()
  {
    parent::boot();

    static::deleting(function($photo){

      Storage::disk('public')->delete($photo->url);
    });
  }
}
