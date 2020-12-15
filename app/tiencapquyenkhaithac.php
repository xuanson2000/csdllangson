<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiencapquyenkhaithac extends Model
{
    //
    protected $table ="tiencapquyenkhaithac";
	public $timestamps = false;

 public function hoSoCapPhepKhaiThac(){
     	return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_khaithac','id');
     }



}
