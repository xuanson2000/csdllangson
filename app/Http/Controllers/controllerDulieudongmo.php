<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\duLieuMo;
use App\nopNganSachKhoangSan;
use App\quanHuyen;
class controllerDulieudongmo extends Controller
{
    //

	public function index(){

		$dulieudongmos= duLieuMo::where('hienTrang','0')->get();
		
		$quanHuyens=quanHuyen::get();
		
		return view('dulieukhoangsan.dulieudongmo.index',['dulieudongmos'=>$dulieudongmos,'quanHuyens'=>$quanHuyens]);
		unset($dulieudongmos);
		unset($quanHuyens);
		

	}

	


	public function chitietdulieumodongcua($id){

		$chitietdulieumodongcuas= duLieuMo::find($id);
    $nopNganSachKhoangSans =nopNganSachKhoangSan::where('id_mo',$id)->get();

    return view('dulieukhoangsan.dulieudongmo.chitietdongcumo',['nopNganSachKhoangSans'=>$nopNganSachKhoangSans,'chitietdulieumodongcuas'=>$chitietdulieumodongcuas]);
    unset($nopNganSachKhoangSans);
    unset($chitietdulieumodongcuas);

	}



	

	


}
