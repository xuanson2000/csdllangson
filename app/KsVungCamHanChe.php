<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KsVungCamHanChe extends Model
{
    //

    protected $table ="KsVungCamHanChe";
	public $timestamps = false;


      public function xaPhuong(){
     	return $this->belongsTo('App\xaPhuong','id_xa','id');
     }

}
