<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\duLieuMo;
use App\toaDo;
use App\xaPhuong;
use App\quanHuyen;
use App\hoSoCapPhepPheDuyetTruLuong;
use App\nhomKhoangSan;
use App\loaiHinhKhoangSan;
use App\coQuanCapPhep;
use App\nopNganSachKhoangSan;
use App\sanpham;
use App\hoSoCapPhepthamdo;
use App\hoSoCapPhepKhaiThac;
use App\duLieuDieuTraDanhGiaKhoangSan;
use Auth;
use DB;
use Carbon\Carbon;

class controllerBaocaothongke extends Controller
{
    //

	public function index(){

		return view('baocaothongke.index');

	}

		public function test(){

		//	$test=hoSoCapPhepKhaiThac::get();
			$test = duLieuDieuTraDanhGiaKhoangSan::orderBy('id','DESC')->get();
			//dd($test);

		return view('baocaothongke.test',['test'=>$test]);

	}



	public function baocaotheohoso(){

		return view('baocaothongke.baocaohoso');

	}



	public function thongkehoso(Request $req){

		$txtthongkehosos=null;


		$loaihoso=$req->loaihoso;


		if($req->loaihoso==1){
			$txtthongkehosos=hoSoCapPhepthamdo::whereYear('ngayGiayPhep',$req->nam)->get();
		} else if($req->loaihoso==2){
			$txtthongkehosos=hoSoCapPhepPheDuyetTruLuong::whereYear('ngayGiayPhep',$req->nam)->get();
		}else if($req->loaihoso==3){
			$txtthongkehosos=hoSoCapPhepKhaiThac::whereYear('ngaygiayphep',$req->nam)->get();
		}

//dd($txtthongkehosos);

		return view('baocaothongke.baocaohoso',['txtthongkehosos'=>$txtthongkehosos,'loaihoso'=>$loaihoso]);

	}

	public function baocaonamkhaithac(){

		return view('baocaothongke.baocaonamkhaithac');

	}

	public function kqbaocaonamkhaithac(Request $req){
		$namnow= Carbon::now()->year;
		$sonam=$req->nam;

		$products= hoSoCapPhepKhaiThac::whereRaw(" thoigiancapphepkhaithac-($namnow - date_part('year',ngaygiayphep))<$sonam")->get();



                    


		return view('baocaothongke.baocaonamkhaithac',['products'=>$products,'sonam'=>$sonam]);

	}


}
