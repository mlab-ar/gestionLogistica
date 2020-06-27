<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistica extends Model
{
    use SoftDeletes;

    protected $table = 'mercaderias';
    protected $dates = ['fecha_entrada'];

    protected $fillable = [
        'user_id'
    ];


    public function user()
    {
      return $this->belongsTo(User::class)->select('id','name');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function files()
    {
       return $this->hasMany(File::class);
    }
}
