<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\xaPhuong;
use App\quanHuyen;
use App\loaiHinhKhoangSan;

class AjaxController extends Controller
{
  public function getxaphuong($idquanHuyen){

	  	$xaphuongs=DB::table('xaPhuong')->where('id_quanHuyen',$idquanHuyen)->get();

		foreach ($xaphuongs as $xaphuong) {
			echo "<option value='".$xaphuong->id."'>".$xaphuong->tenXaPhuong."</option>";
		}
	}


  public function getxaphuongseach($idtenQuanHuyenseach){

	  $xaphuongseachs=DB::table('xaPhuong')->where('id_quanHuyen',$idtenQuanHuyenseach)->get();

		foreach ($xaphuongseachs as $xaphuongseach) {
			echo "<option value='".$xaphuongseach->id."'>".$xaphuongseach->tenXaPhuong."</option>";
		}
	
	}


 public function getloaihinhkhoangsan($idNhomKS){

	  	$xaphuongs=DB::table('loaiHinhKhoangSan')->where('id_nhomKhoangSan',$idNhomKS)->get();

		foreach ($xaphuongs as $xaphuong) {
			echo "<option value='".$xaphuong->id."'>".$xaphuong->tenLoaiHinhKS."</option>";
		}
	}


	
}
