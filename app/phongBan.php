<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phongBan extends Model
{
    //

     protected $table ="phongBan";
     public $timestamps = false;



 public function quantri(){
     	return $this->hasManey('App\quantri','phongBan','id');
     }

}
