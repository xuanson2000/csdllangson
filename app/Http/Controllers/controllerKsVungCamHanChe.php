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
	$KsVungCamHanChe->id_huyen= $req ->tenQuanHuyen;
	$KsVungCamHanChe->lyDoCam= $req ->lyDoCam;
	$KsVungCamHanChe->dienTich= $req ->dienTich;
	$KsVungCamHanChe->save();

    if($req->hasFile('fileGiayPhep')){
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

	
	public function suadulieucamhanchekhaithac($id){
		$quanHuyens=quanHuyen::get();
		$KsVungCamHanCheedit = KsVungCamHanChe::find($id);
		return view('vungcamhanchekhaithac.suadulieucamhanchekhaithac',['KsVungCamHanCheedit'=>$KsVungCamHanCheedit,'quanHuyens'=>$quanHuyens]);
		unset($KsVungCamHanCheedit);
		unset($quanHuyens);
	}
	
	
	public function suadulieucamhanchekhaithacpost($id,Request $req){
		$quanHuyens=quanHuyen::get();
		$KsVungCamHanCheeditpost = KsVungCamHanChe::find($id);

		$KsVungCamHanCheeditpost ->tenKhuVuc =$req->tenKhuVuc;
		$KsVungCamHanCheeditpost->id_huyen=$req ->tenQuanHuyen;

		$KsVungCamHanCheeditpost ->lyDoCam =$req ->lyDoCam;
		$KsVungCamHanCheeditpost ->dienTich =$req ->dienTich;

		if($req->hasFile('fileGiayPhep')){

			$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',222)->get();

			foreach ( $filedinhkemgiaypheps as $filedinhkemgiayphep) {
				unlink("public/tailieu/".$filedinhkemgiayphep->tenFile);
				$filedinhkemgiayphep->delete();
			}


			$filedinhkemgiaypheps = $req->file('fileGiayPhep');

			foreach ($filedinhkemgiaypheps as $filedinhkemgiayphep) {
				$tenAnh = $filedinhkemgiayphep->getClientOriginalName();
				$tenAnhmoi =str_random(4)."_".$tenAnh;
				while(file_exists("public/tailieu/".$tenAnhmoi))
				{

					$tenAnhmoi =str_random(4)."_".$tenAnh;
				}
				$filedinhkemgiayphep->move("public/tailieu/",$tenAnhmoi);

				\DB::table('fileDinhKemGiayPhep')->insert([
					'id_HoSo' => $id,
					'id_loaiHoSo'=>'222',
					'tenFile'=> $tenAnhmoi
				]); 

				
			}

		}


		$KsVungCamHanCheeditpost->save();
		
	return redirect('khoang-san/du-lieu-vung-cam-han-che-khai-thac')->with('messgsua','Sửa thành công');
	}

}
