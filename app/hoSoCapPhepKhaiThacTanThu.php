<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoSoCapPhepKhaiThacTanThu extends Model
{
    //

    protected $table ="hoSoCapPhepKhaiThacTanThu";
	public $timestamps = false;

	public function chucVu(){
		return $this->belongsTo('App\chucVu','id_chucVu','id');
	}
	public function duLieuMo(){
		return $this->belongsTo('App\duLieuMo','id_mo','id');
	}

	public function doanhNghiep(){
		return $this->belongsTo('App\doanhNghiep','id_doanhNghiep','id');
	}


}
