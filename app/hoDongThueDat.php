<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class hoDongThueDat extends Model
{
    //
	protected $table ="hoDongThueDat";
	public $timestamps = false;

 public function hoSoCapPhepKhaiThac(){
     	return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_hosocapphepkhaithac','id');
     }



}
