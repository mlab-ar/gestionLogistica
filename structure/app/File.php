<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
  protected $guarded = [];

  protected static function boot()
  {
    parent::boot();

    static::deleting(function($file){

      Storage::disk('public')->delete($file->url);
    });
  }
}
