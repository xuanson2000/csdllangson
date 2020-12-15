<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoSoCapPhepKhaiThac;
use App\tienkyquymoitruong;

class controllertienkyquyphuchoimoitruong extends Controller
{
    //

    public function index(){
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
		$tienkyquymoitruongs=tienkyquymoitruong::orderBy('id','DESC')->get();
	

		//dd($hopdongthuedats);
		return view('quyphuchoimoitruong.index',['tienkyquymoitruongs'=>$tienkyquymoitruongs,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
		unset($tienkyquymoitruongs);
		unset($hoSoCapPhepKhaiThacs);
	}



public function themphuchoimoitruong(Request $req){


      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_khaithac);

		$tienkyquymoitruong = new tienkyquymoitruong;
		$tienkyquymoitruong ->id_mo =$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;
		$tienkyquymoitruong ->id_khaithac =$req ->id_khaithac;
		$tienkyquymoitruong->soqd=$req ->soqd;
		$tienkyquymoitruong->tongtien=$req ->tongtien;
		$tienkyquymoitruong ->ngayquyetdinh =$req ->ngayquyetdinh;
		$tienkyquymoitruong ->tiennoplandau =$req ->tiennoplandau;
		$tienkyquymoitruong ->tiennoplanhai =$req ->tiennoplanhai;
		$tienkyquymoitruong ->solannop =$req ->solannop;


		// if($req->hasFile('image')){

		// 	$file =$req->file('image');

		// 	$name =$file ->getclientoriginalname();
		// 	$Hinh =str_random(4)."_".$name;


		// 	while(file_exists("public/tailieu/".$Hinh))
		// 	{

		// 		$Hinh =str_random(4)."_".$name;
		// 	}
		// 	$file->move("public/tailieu/",$Hinh);

		// 	$hoDongThueDat->file=$Hinh;

		// }
		


		$tienkyquymoitruong ->save();

		return redirect()->back()->with('messgthem','Thêm thành công');

		unset($tienkyquymoitruong);
	




}

 public function suaquyphuchoimoitruong($id){

	    $hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
        $tienkyquymoitruongedit=tienkyquymoitruong::find($id);
        return view('quyphuchoimoitruong.suaquyphuchoimoitruong',['tienkyquymoitruongedit'=>$tienkyquymoitruongedit,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
        unset($tienkyquymoitruongedit);
               unset($hoSoCapPhepKhaiThacs);


    }


public function suaquyphuchoimoitruongpost($id, Request $req){


	$tienkyquymoitruongedit=tienkyquymoitruong::find($id);

	$hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_khaithac);

	$tienkyquymoitruongedit->id_mo = $hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;

	$tienkyquymoitruongedit ->id_khaithac =$req->id_khaithac;
	$tienkyquymoitruongedit->soqd=$req ->soqd;
	$tienkyquymoitruongedit->tongtien=$req ->tongtien;
	$tienkyquymoitruongedit ->ngayquyetdinh =$req ->ngayquyetdinh;
	$tienkyquymoitruongedit ->tiennoplandau =$req ->tiennoplandau;
	$tienkyquymoitruongedit ->solannop =$req ->solannop;
	$tienkyquymoitruongedit ->tiennoplanhai =$req ->tiennoplanhai;

	$tienkyquymoitruongedit->save();

	return redirect('khoang-san/tien-ky-quy-phuc-hoi-moi-truong')->with('messgsua','Sửa thành công');

}


}
