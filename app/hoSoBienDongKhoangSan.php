<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoSoBienDongKhoangSan extends Model
{
    //
	protected $table ="hoSoBienDongKhoangSan";
	public $timestamps = false;


	public function doanhNghiepChuyenNhuong(){
		return $this->belongsTo('App\doanhNghiepChuyenNhuong','id_doanhNghiepChuyenNhuong','id');
	}

	public function chucVu(){
		return $this->belongsTo('App\chucVu','id_chucVu','id');
	}

	public function hoSoCapPhepKhaiThac(){
		return $this->belongsTo('App\hoSoCapPhepKhaiThac','id_hoSoCapPhepKhaiThac','id');
	}
	
}
