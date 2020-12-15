<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KsVungCamHanChe;
use App\fileDinhKemGiayPhep;

use App\xaPhuong;
use App\quanHuyen;

class controllerKsVungCamHanChe extends Controller
{
    //
   
	public function index(){
    $quanHuyens=quanHuyen::get();
		$controllerKsVungCamHanChes = KsVungCamHanChe::orderBy('id','DESC')->get();
		return view('vungcamhanchekhaithac.index',['controllerKsVungCamHanChes'=>$controllerKsVungCamHanChes,'quanHuyens'=>$quanHuyens]);
		unset($controllerKsVungCamHanChes);
		unset($quanHuyens);
	}


	
	public function themdulieuvungcamhanche(Request $req){

	$KsVungCamHanChe = new KsVungCamHanChe;
	$KsVungCamHanChe->tenKhuVuc= $req ->tenKhuVuc;
	$KsVungCamHanChe->id_xa= $req ->id_xa;
	$KsVungCamHanChe->lyDoCam= $req ->lyDoCam;
	$KsVungCamHanChe->dienTich= $req ->dienTich;
	$KsVungCamHanChe->save();

	$fileDinhKemGiayPheps = $req->file('fileGiayPhep');
	foreach ($fileDinhKemGiayPheps as $fileDinhKemGiayPhep) {
		$tenAnh = $fileDinhKemGiayPhep->getClientOriginalName();
		$tenAnhmoi =str_random(4)."_".$tenAnh;
		while(file_exists("public/tailieu/".$tenAnhmoi))
		{

			$tenAnhmoi =str_random(4)."_".$tenAnh;
		}
		$fileDinhKemGiayPhep->move("public/tailieu/",$tenAnhmoi);

		\DB::table('fileDinhKemGiayPhep')->insert([
			'id_HoSo' => $KsVungCamHanChe->id,
			'id_loaiHoSo'=>'222',
			'tenFile'=> $tenAnhmoi
		]); 
	}

	return redirect('khoang-san/du-lieu-vung-cam-han-che-khai-thac')->with('messgthem','Thêm thành công');

	unset($KsVungCamHanChe);
}




public function xoadulieucamhanchekhaithac($id){

		$KsVungCamHanCheid = KsVungCamHanChe::find($id);
		$KsVungCamHanCheid->delete();
		$fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',222)->get();

		foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
			$fileDinhKemGiayPhepid->delete();
		unlink("public/tailieu/".$fileDinhKemGiayPhepid->tenFile);
		}

		return redirect('khoang-san/du-lieu-vung-cam-han-che-khai-thac')->with('messgxoa','Xóa thành công');
		unset($KsVungCamHanCheid);
		unset($fileDinhKemGiayPhepids);
		
	}


}
