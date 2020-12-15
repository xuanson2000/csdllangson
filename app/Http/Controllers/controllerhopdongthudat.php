<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoSoCapPhepKhaiThac;
use App\hoDongThueDat;
use App\duLieuMo;
use App\hoSoCapPhepPheDuyetTruLuong;



class controllerhopdongthudat extends Controller
{
	public function index(){
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
		$hopdongthuedats=hoDongThueDat::orderBy('id','DESC')->get();

		//dd($hopdongthuedats);
		return view('hopdongthuedat.index',['hopdongthuedats'=>$hopdongthuedats,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
		unset($hopdongthuedats);
		unset($hoSoCapPhepKhaiThacs);
	}

	
		public function themhopdongthuedat(Request $req){


      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_hosocapphepkhaithac);

		$hoDongThueDat = new hoDongThueDat;
		$hoDongThueDat ->idmo =$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;

		$hoDongThueDat ->id_hosocapphepkhaithac =$req ->id_hosocapphepkhaithac;
		$hoDongThueDat->soHopDong=$req ->soHopDong;
		$hoDongThueDat->ngayThue=$req ->ngayThue;
		$hoDongThueDat ->dienTich =$req ->dienTich;
		$hoDongThueDat ->chiPhi =$req ->chiPhi;
		$hoDongThueDat ->thoiGianThue =$req ->thoiGianThue;


		if($req->hasFile('image')){

			$file =$req->file('image');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;


			while(file_exists("public/tailieu/".$Hinh))
			{

				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);

			$hoDongThueDat->file=$Hinh;

		}
		


		$hoDongThueDat ->save();

		return redirect()->back()->with('messgthem','Thêm thành công');

		unset($hoDongThueDat);
	




}

 

}
