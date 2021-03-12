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


	public function suahopdongthuedat($id){
		
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
		$suahopdongthuedat=hoDongThueDat::find($id);
		return view('hopdongthuedat.suahopdongthuedat',['hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs,'suahopdongthuedat'=>$suahopdongthuedat]);
	}



	public function suahopdongthuedatpost($id,Request $req){
		

		$hoDongThueDatpost=hoDongThueDat::find($id);

		$hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_khaithac);

		$hoDongThueDatpost->idmo = $hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;

		$hoDongThueDatpost ->id_hosocapphepkhaithac =$req->id_khaithac;
		$hoDongThueDatpost->soHopDong=$req ->soHopDong;
		$hoDongThueDatpost->ngayThue=$req ->ngayThue;
		$hoDongThueDatpost ->dienTich =$req ->dienTich;
		$hoDongThueDatpost ->chiPhi =$req ->chiPhi;
		$hoDongThueDatpost ->thoiGianThue =$req ->thoiGianThue;

		$hoDongThueDatpost->save();

		return redirect('khoang-san/hop-dong-thue-dat')->with('messgsua','Sửa thành công');



	}
	
	public function xoahopdongthuedat($id,Request $req){

		$hoDongThueDatdelete = hoDongThueDat::find($id);



		// $lichsuxoadoanhnghiep= new lichSuTruyCap;
		// $lichsuxoadoanhnghiep->tenBang='loại hình doanh nghiệp';
		// $lichsuxoadoanhnghiep->id_user=auth::guard('quantri')->user()->id;
		// $lichsuxoadoanhnghiep->ip_client=$req->ip();
		// $lichsuxoadoanhnghiep->thaoTac ='xóa';
		// $lichsuxoadoanhnghiep->tenBanGhi =$loaihinhdoanhnghiep->tenloaihinh;


		// $lichsuxoadoanhnghiep->save();
		$hoDongThueDatdelete->delete();

		return redirect('khoang-san/hop-dong-thue-dat')->with('messgxoa','xóa thành công');
		
	}

 

}
