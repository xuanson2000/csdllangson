<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichSuTruyCap extends Model
{
    //
    protected $table ="lichSuTruyCap";

    public function quantri(){
     	return $this->belongsTo('App\quantri','id_user','id');
     }

    
}
