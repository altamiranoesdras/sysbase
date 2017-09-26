<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes;

    protected $fillable = [
      "descripcion"
    ];

    public function usuarios(){
        $this->belongsToMany(User::class);
    }


}
