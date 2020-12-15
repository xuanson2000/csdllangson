<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tienkyquymoitruong extends Model
{
    //

     protected $table ="tienkyquymoitruong";
	public $timestamps = false;

 public function hoSoCapPhepKhaiThac(){
     	return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_khaithac','id');
     }
}
