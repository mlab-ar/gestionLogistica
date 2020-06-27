<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
      return 'url';
    }

    // public function category()
    // {
    //   return $this->belongsTo(Category::class);
    // }
    //
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    public function evento()
    {
      return $this->belongsTo(Evento::class);
    }


    public function photos()
    {
        return $this->hasMany(Photop::class);
    }

}
