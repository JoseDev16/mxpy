<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
      //

        public function camisas()
        {
            return $this->belongsToMany('App\Camisa', 'camisa_colors', 'camisas_id', 'colors_id');
        }

   
}
