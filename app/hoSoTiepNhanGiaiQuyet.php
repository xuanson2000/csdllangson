<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoSoTiepNhanGiaiQuyet extends Model
{
    //

    protected $table ="hoSoTiepNhanGiaiQuyet";
	public $timestamps = false;


	public function quantri(){
     	return $this->belongsTo('App\quantri','canBoTiepNhan','id');
     }


}
