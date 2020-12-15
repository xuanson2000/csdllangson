<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nopNganSachKhoangSan;
use App\duLieuMo;
use App\hoSoCapPhepPheDuyetTruLuong;
use App\truLuongKhaiThac;
use App\hoSoCapPhepKhaiThac;

class controllerbaocaokhaithachangnam extends Controller
{
   
  	public function index()
	{

		$hoSoCapPhepKhaiThacs =hoSoCapPhepKhaiThac::all();
		$dulieumos=duLieuMo::all();
		return view('baocaokhaithackhoangsan.index',['hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs,'dulieumos'=>$dulieumos]);
		unset($hoSoCapPhepKhaiThacs);
			unset($dulieumos);
	} 


 	public function chitietbaokhaothachangnam($id)
	{

		// $hoSoCapPhepKhaiThacs =hoSoCapPhepKhaiThac::all();
		// $dulieumos=duLieuMo::all();

		$nopNganSachKhoangSans =nopNganSachKhoangSan::where('id_mo',$id)->get();
		$tenmo=duLieuMo::select('tenMo')->find($id);
      

		return view('baocaokhaithackhoangsan.chitietbaokhaothachangnam',['nopNganSachKhoangSans'=>$nopNganSachKhoangSans,'tenmo'=>$tenmo]);
		unset($nopNganSachKhoangSans);
		
	} 

	

	public function xoabaocaokhoangsanhangnam($id){

		$nopNganSachKhoangSandelete = nopNganSachKhoangSan::find($id);
		$nopNganSachKhoangSandelete->delete();
	
		unlink("public/tailieu/".$nopNganSachKhoangSandelete->file);
		

		return redirect()->back()->with('messgxoa','Xóa thành công');
		unset($nopNganSachKhoangSandelete);
	
		
	}



	public function thembaocaokhaithachangnam(Request $req){


      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_giayPhepKhaiThac);
		$nopNganSachKhoangSan = new nopNganSachKhoangSan;
		$nopNganSachKhoangSan ->id_mo =$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;
		$nopNganSachKhoangSan ->nam =$req ->nam;
		$nopNganSachKhoangSan->truLuongKhaiThac=$req ->truLuongKhaiThac;
		$nopNganSachKhoangSan->donVi=$req ->donVi;
		$nopNganSachKhoangSan ->thueTaiNguyen =$req ->thueTaiNguyen;
		$nopNganSachKhoangSan ->phiBaoVeMoiTruong =$req ->phiBaoVeMoiTruong;
		$nopNganSachKhoangSan ->thueGiaTriGiaTang =$req ->thueGiaTriGiaTang;
		$nopNganSachKhoangSan ->thueThueDat =$req ->thueThueDat;

		if($req->hasFile('image')){

			$file =$req->file('image');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;


			while(file_exists("public/tailieu/".$Hinh))
			{

				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);

			$nopNganSachKhoangSan->file=$Hinh;

		}
		else{

			$nopNganSachKhoangSan->anh="error.png";

		}

		$nopNganSachKhoangSan ->save();

		// $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_giayPhepKhaiThac);

		// $truLuongKhaiThac= new truLuongKhaiThac;
		// $truLuongKhaiThac->namKhaiThac=$req ->nam;
		// $truLuongKhaiThac->id_mo=$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;
		// $truLuongKhaiThac->truLuongKhaiThac=$req ->truLuongKhaiThac;
		// $truLuongKhaiThac->donVi=$req ->donVi;
		// $truLuongKhaiThac->save();

		return redirect('khoang-san/bao-cao-ket-qua-khai-thac-khoang-san-hang-nam')->with('messgthem','Thêm thành công');

		unset($nopNganSachKhoangSan);
	




}
}
