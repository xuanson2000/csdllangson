<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KsVungCamHanChe extends Model
{
    //

    protected $table ="KsVungCamHanChe";
	public $timestamps = false;


      public function quanHuyen(){
     	return $this->belongsTo('App\quanHuyen','id_huyen','id');
     }

}
