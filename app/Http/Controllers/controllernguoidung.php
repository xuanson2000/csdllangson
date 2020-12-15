<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\quyen;
use App\quantri;
use App\vaitro;
use App\vaitro_quyen;
use App\quantri_vaitro;


use DB;
use Hash;


class controllernguoidung extends Controller
{
    //

	public function index(){
		$nguoidungs=quantri::get();

		$vaitros=DB::table('vaitro')->get();
		$phongbans=DB::table('phongBan')->get();
		return view('phanquyen.nguoidung.index',['vaitros'=>$vaitros,'nguoidungs'=>$nguoidungs,'phongbans'=>$phongbans]);
		unset($vaitros);
		unset($nguoidungs);
		unset($phongbans);
	}


	public function themnguoidung(Request $req){

		$quantri = new quantri;
		$quantri->username= $req ->username;
		$quantri->namclass= $req ->namclass;
		$quantri->phongBan= $req ->phongBan;
		$quantri->ngaySinh= $req ->ngaySinh;

		$quantri->password= Hash::make($req->password);

		if($req->hasFile('image')){

			$file =$req->file('image');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;


			while(file_exists("public/anh/".$Hinh))
			{

				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/anh/",$Hinh);

			$quantri->anh=$Hinh;

		}
		else{

			$quantri->anh="nhanvien.jpg";

		}


		$quantri->save();

		$pe = $req->vaitro;

		foreach ($pe as $p) {
			\DB::table('quantri_vaitro')->insert([
				'qt_id'=> $quantri->id,
				'vt_id' => $p
			]); 
		} 


	return redirect()->back()->with('messgthem','Thêm thành công');



	}

	public function xoanguoidung($id){

		$nguoidung = quantri::find($id);
		$nguoidung->delete();

		$quantri_vaitros= quantri_vaitro::where('qt_id',$id)->get();
		foreach ($quantri_vaitros as $quantri_vaitro) {
			$quantri_vaitro ->delete();
		}   

		return redirect()->back()->with('messgxoa','Xóa thành công');


		unset($nguoidung);

		unset($quantri_vaitros);

	}

	


	public function suanguoidung($id){

		$nguoidung = quantri::find($id);

		$vaitros=DB::table('vaitro')->get();
		$phongbans=DB::table('phongBan')->get();
		
		return view('phanquyen.nguoidung.suanguoidung',['vaitros'=>$vaitros,'nguoidung'=>$nguoidung,'phongbans'=>$phongbans]);

		unset($nguoidung);

		

	}

	

public function suanguoidungpost(Request $req, $id){

	$nguoidungid= quantri::find($id);

	$nguoidungid->username = $req ->username ;
	$nguoidungid->namclass = $req ->namclass ;
	$nguoidungid->ngaySinh= $req ->ngaySinh;
	$nguoidungid->phongBan = $req ->phongBan ;
	
	if($req ->hasFile('image')){

		$file =$req->file('image');
		$name =$file ->getclientoriginalname();
		$Hinh =str_random(4)."_".$name;

		while(file_exists("public/anh/".$Hinh))
		{

			$Hinh =str_random(4)."_".$name;
		}
		$file->move("public/anh/",$Hinh);
		unlink("public/anh/".$nguoidungid->anh);
		$nguoidungid->anh=$Hinh;

	}

	
	$nguoidungid->save();

	$pe = $req->vaitro;

		foreach ($pe as $p) {
			\DB::table('quantri_vaitro')->where('qt_id',$id)->update([
				'qt_id'=> $id,
				'vt_id' => $p
			]); 
		} 


// 	$quantrivaitro=quantri_vaitro::where('qt_id',$nguoidung->id)->first();

// $quantrivaitro->


	return redirect('khoang-san/nguoi-dung')->with('messgsua','Sửa thành công');

}





}
