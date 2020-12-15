<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\duLieuDieuTraDanhGiaKhoangSan;
use App\fileDinhKemGiayPhep;

class controllerduLieuDieuTraDanhGiaKhoangSan extends Controller
{
    //
	public function indexdulieudieutradanhgiakhoangsan(){

	 // $duLieuDieuTraDanhGiaKhoangSans = duLieuDieuTraDanhGiaKhoangSan::orderBy('id','DESC')->paginate(10);
		$duLieuDieuTraDanhGiaKhoangSans = duLieuDieuTraDanhGiaKhoangSan::orderBy('id','DESC')->get();

	   return view('dulieudieutrakhoangsan.index',['duLieuDieuTraDanhGiaKhoangSans'=>$duLieuDieuTraDanhGiaKhoangSans]);
	   unset($duLieuDieuTraDanhGiaKhoangSans);
	}


public function themdulieudieutradanhgiaks(Request $req){

	$duLieuDieuTraDanhGiaKhoangSan = new duLieuDieuTraDanhGiaKhoangSan;
	$duLieuDieuTraDanhGiaKhoangSan->tenBaoCao= $req ->tenBaoCao;
	$duLieuDieuTraDanhGiaKhoangSan->chuNhiem= $req ->chuNhiem;
	$duLieuDieuTraDanhGiaKhoangSan->tenDoanhNghiep= $req ->tenDoanhNghiep;
	$duLieuDieuTraDanhGiaKhoangSan->mucDo= $req ->mucDo;
	$duLieuDieuTraDanhGiaKhoangSan->soKyHieuLuuTru= $req ->soKyHieuLuuTru;
	$duLieuDieuTraDanhGiaKhoangSan->soQuyetDinhPheDuyet= $req ->soQuyetDinhPheDuyet;
	$duLieuDieuTraDanhGiaKhoangSan->dienTichThucHien= $req ->dienTichThucHien;
	$duLieuDieuTraDanhGiaKhoangSan->nam= $req ->nam;
	$duLieuDieuTraDanhGiaKhoangSan->ghiChu= $req ->ghiChu;
	$duLieuDieuTraDanhGiaKhoangSan->save();
	

	if($req ->hasFile('fileGiayPhep')){

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
				'id_HoSo' => $duLieuDieuTraDanhGiaKhoangSan->id,
				'id_loaiHoSo'=>'111',
				'tenFile'=> $tenAnhmoi
			]); 
		}
		
	}


	return redirect('khoang-san/du-lieu-dieu-tra-danh-gia-khoang-san')->with('messgthem','Thêm thành công');

	unset($duLieuDieuTraDanhGiaKhoangSan);
}



public function chitietdieutrakhoangsan($id){

		$duLieuDieuTraDanhGiaKhoangSanid = duLieuDieuTraDanhGiaKhoangSan::find($id);
			$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','111')->get();

		return view('dulieudieutrakhoangsan.chitietdieutrakhoangsan',['duLieuDieuTraDanhGiaKhoangSanid'=>$duLieuDieuTraDanhGiaKhoangSanid,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps]);
		unset($duLieuDieuTraDanhGiaKhoangSanid);
		unset($filedinhkemgiaypheps);
    }


    public function xoadulieudieutrakhoangsan($id){

    	$duLieuDieuTraDanhGiaKhoangSandelete = duLieuDieuTraDanhGiaKhoangSan::find($id);
    	$duLieuDieuTraDanhGiaKhoangSandelete->delete();
    	$fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',111)->get();

    	foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
    		$fileDinhKemGiayPhepid->delete();
    	}

    	return redirect('khoang-san/du-lieu-dieu-tra-danh-gia-khoang-san')->with('messgxoa','Xóa thành công');
    	unset($duLieuDieuTraDanhGiaKhoangSandelete);
    	unset($fileDinhKemGiayPhepids);
    }


    

    public function suadulieudieutrakhoangsan($id){

    	$duLieuDieuTraDanhGiaKhoangSanEdit = duLieuDieuTraDanhGiaKhoangSan::find($id);


    	return view('dulieudieutrakhoangsan.suadulieudieutrakhoangsan',['duLieuDieuTraDanhGiaKhoangSanEdit'=>$duLieuDieuTraDanhGiaKhoangSanEdit]);
    	unset($duLieuDieuTraDanhGiaKhoangSanEdit);
    }

	
	public function suadulieudieutrakhoangsanpost(Request $req, $id){

	$duLieuDieuTraDanhGiaKhoangSanPost = duLieuDieuTraDanhGiaKhoangSan::find($id);
	$duLieuDieuTraDanhGiaKhoangSanPost->tenBaoCao= $req ->tenBaoCao;
	$duLieuDieuTraDanhGiaKhoangSanPost->chuNhiem= $req ->chuNhiem;
	$duLieuDieuTraDanhGiaKhoangSanPost->tenDoanhNghiep= $req ->tenDoanhNghiep;
	$duLieuDieuTraDanhGiaKhoangSanPost->mucDo= $req ->mucDo;
	$duLieuDieuTraDanhGiaKhoangSanPost->soKyHieuLuuTru= $req ->soKyHieuLuuTru;
	$duLieuDieuTraDanhGiaKhoangSanPost->soQuyetDinhPheDuyet= $req ->soQuyetDinhPheDuyet;
	$duLieuDieuTraDanhGiaKhoangSanPost->dienTichThucHien= $req ->dienTichThucHien;
	$duLieuDieuTraDanhGiaKhoangSanPost->nam= $req ->nam;
	$duLieuDieuTraDanhGiaKhoangSanPost->ghiChu= $req ->ghiChu;
	$duLieuDieuTraDanhGiaKhoangSanPost->save();


if($req ->hasFile('fileGiayPhep')){

	$fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',111)->get();

	foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
			unlink("public/tailieu/".$fileDinhKemGiayPhepid->tenFile);
		    $fileDinhKemGiayPhepid->delete();
	}


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
			'id_HoSo' => $duLieuDieuTraDanhGiaKhoangSanPost->id,
			'id_loaiHoSo'=>'111',
			'tenFile'=> $tenAnhmoi
		]); 
	}

}



	return redirect('khoang-san/du-lieu-dieu-tra-danh-gia-khoang-san')->with('messgsua','Sửa thành công');

	unset($duLieuDieuTraDanhGiaKhoangSanPost);
	unset($fileDinhKemGiayPheps);
}




}
