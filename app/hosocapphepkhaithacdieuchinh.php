<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hosocapphepkhaithacdieuchinh extends Model
{
   
	protected $table ="hosocapphepkhaithacdieuchinh";
	public $timestamps = false;

	public function hoSoCapPhepKhaiThac(){
		return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_khaithac','id');
	}

}
