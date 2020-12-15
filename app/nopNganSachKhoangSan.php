<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nopNganSachKhoangSan extends Model
{
    //
    protected $table ="nopNganSachKhoangSan";
     public $timestamps = false;

        public function hoSoCapPhepKhaiThac(){
     	return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_giayPhepKhaiThac','id');
     }

}
