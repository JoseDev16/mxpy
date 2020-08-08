<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camisa extends Model
{
    //
    public function coleccion()
    {
        return $this->belongsTo('App\Coleccion', 'coleccions_id');
    }
    
    public function colores()
    {
        return $this->belongsToMany('App\Color', 'camisa_colors', 'camisas_id','colors_id');
    }



 
   
}
