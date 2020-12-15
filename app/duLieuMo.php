<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class duLieuMo extends Model
{
    //

	protected $table ="duLieuMo";
	public $timestamps = false;

    public function quanHuyen(){
     	return $this->belongsTo('App\quanHuyen','viTriHuyen','id');
     }

      public function xaPhuong(){
     	return $this->belongsTo('App\xaPhuong','viTriXa','id');
     }

    public function loaiHinhKhoangSan(){
     	return $this->belongsTo('App\loaiHinhKhoangSan','loaiKhoangSan','id');
     }
    

    public function coQuanCapPhep(){
     	return $this->belongsTo('App\coQuanCapPhep','coQuanPheDuyet','id');
     }

   public function hoSoCapPhepthamdo(){
        return $this->hasManey('App\hoSoCapPhepthamdo','id_mo','id');
     }
     public function chucVu(){
        return $this->belongsTo('App\chucVu','id_chucVu','id');
    }

}
