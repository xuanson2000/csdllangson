<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hosothuhoitralaimo extends Model
{
    //
    protected $table ="hosothuhoitralaimo";
	public $timestamps = false;

	public function hoSoCapPhepKhaiThac(){
		return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_khaithac','id');
	}
}
