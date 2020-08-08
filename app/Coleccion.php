<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    //
    public function camisas()
    {
        return $this->hasMany('App\Camisa');
    }
}
