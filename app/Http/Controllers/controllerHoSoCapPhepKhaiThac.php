<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coQuanCapPhep;
use App\quanHuyen;
use App\duLieuMo;
use App\hoSoCapPhepthamdo;
use App\hoSoCapPhepPheDuyetTruLuong;
use App\hoSoCapPhepKhaiThac;
use App\hoSoBienDongKhoangSan;
use App\doanhNghiep;
use App\doanhNghiepChuyenNhuong;
use App\fileDinhKemGiayPhep;
use App\fileDinhKemBanDo;
use App\chucVu;
use App\hosocapphepkhaithacdieuchinh;
use App\nopNganSachKhoangSan;
use App\tiencapquyenkhaithac;
use App\tienkyquymoitruong;
use App\hoDongThueDat;
use App\hosothuhoitralaimo;
use DB;

class controllerHoSoCapPhepKhaiThac extends Controller
{
    //

	public function index()

	{
		$quanHuyens =quanHuyen::all();
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::orderBy('id','DESC')->get();
		//
		return view('hoSoCapPhepKhaiThac.index',['quanHuyens'=>$quanHuyens,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
		unset($quanHuyens);
		unset($hoSoCapPhepKhaiThacs);
	} 


	public function chitietcapphepkhaithac($id)
	{
		// dd($id);
		$hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($id);

		//dd($hoSoCapPhepKhaiThacid);

		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();

		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();


		return view('hoSoCapPhepKhaiThac.chitietcapphepkhaithac',['hoSoCapPhepKhaiThacid'=>$hoSoCapPhepKhaiThacid,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);

		unset($hoSoCapPhepKhaiThacid);
		unse($filedinhkemgiaypheps);
		unse($filedinhkembandos);
	} 


	public function themhosocapphepkhaithac()
	{
		$hoSoCapPhepPheDuyetTruLuongs =hoSoCapPhepPheDuyetTruLuong::get();
		$chucVus=chucVu::all();
		return view('hoSoCapPhepKhaiThac.themhosocapphepkhaithac',['hoSoCapPhepPheDuyetTruLuongs'=>$hoSoCapPhepPheDuyetTruLuongs,'chucVus'=>$chucVus]);
		unset($hoSoCapPhepPheDuyetTruLuongs);
		unset($chucVus);

		
	} 

	


	public function themhosocapphepkhaithacpost(Request $req){

		$hoSoCapPhepKhaiThac = new hoSoCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->id_hoSoCapPhepPheDuyetTruLuong =$req ->id_hoSoCapPhepPheDuyetTruLuong;

		$lapheduyet=hoSoCapPhepPheDuyetTruLuong::where('id',$req ->id_hoSoCapPhepPheDuyetTruLuong)->first();
		$hoSoCapPhepKhaiThac ->lancapphep=$lapheduyet->lanpheduyet;
		$hoSoCapPhepKhaiThac ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->ngaygiayphep =$req ->ngayGiayPhep;
		$hoSoCapPhepKhaiThac ->tenGiayPhep =$req->tenGiayPhep;
		$hoSoCapPhepKhaiThac ->nguoiKy =$req ->nguoiKy;
		$hoSoCapPhepKhaiThac ->id_chucVu =$req ->id_chucVu;
		$hoSoCapPhepKhaiThac ->thoigiancapphepkhaithac =$req ->thoiGianCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongKhaiThac =$req ->truLuongKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongDiaChat =$req ->truLuongDiaChat;
		$hoSoCapPhepKhaiThac ->congSuatKhaiThac =$req ->congSuatKhaiThac;
		//$hoSoCapPhepKhaiThac ->dienTichKhaiThac =$req ->dienTichKhaiThac;
		$hoSoCapPhepKhaiThac ->donVi =$req ->donVi;
		$hoSoCapPhepKhaiThac ->save();

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
				'id_HoSo' => $hoSoCapPhepKhaiThac->id,
				'id_loaiHoSo'=>'4',
				'tenFile'=> $tenAnhmoi
			]); 
		}
		if($req ->hasFile('fileBanDo')){
			$fileDinhKemBanDos = $req->file('fileBanDo');
			foreach ($fileDinhKemBanDos as $fileDinhKemBanDo) {
				$tenAnhBanDo = $fileDinhKemBanDo->getClientOriginalName();
				$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
				while(file_exists("public/tailieu/".$tenAnhMoiBanDo))
				{

					$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
				}
				$fileDinhKemBanDo->move("public/tailieu/",$tenAnhMoiBanDo);

				\DB::table('fileDinhKemBanDo')->insert([
					'id_HoSo' => $hoSoCapPhepKhaiThac->id,
					'id_loaiHoSo'=>'4',
					'tenFile'=> $tenAnhMoiBanDo
				]); 
			}

		}

		$hoSoPheDuyetTruLuongid=hoSoCapPhepPheDuyetTruLuong::find($req->id_hoSoCapPhepPheDuyetTruLuong);
		$hoSoPheDuyetTruLuongid->congTac=1;
		$hoSoPheDuyetTruLuongid->save();

        // $duLieuMo->id_user=Auth::guard('quantri')->user()->id;
		return redirect('khoang-san/ho-so-cap-phep-khai-thac')->with('messgthem','Thêm thành công');

		unset($hoSoCapPhepKhaiThac);
		unset($fileDinhKemGiayPheps);
		unset($fileDinhKemBanDos);
	}

	
	public function xoahosocapphepkhaithac($id){

		$hoSoCapPhepKhaiThacid = hoSoCapPhepKhaiThac::find($id);
		$hoSoCapPhepKhaiThacid->delete();



		$fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',4)->get();

		foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
			$fileDinhKemGiayPhepid->delete();
		}

		$fileDinhKemBanDoids=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',4)->get();
		foreach ( $fileDinhKemBanDoids as $fileDinhKemBanDoid) {
			$fileDinhKemBanDoid->delete();
		}

        // $lichsuxoacoquancapphep= new lichSuTruyCap;
        // $lichsuxoacoquancapphep->tenBang='cơ quan cấp phép';
        // $lichsuxoacoquancapphep->id_user=Auth::guard('quantri')->user()->id;
        // $lichsuxoacoquancapphep->ip_client=\Request::ip();
        // $lichsuxoacoquancapphep->thaoTac ='Xóa';
        // $lichsuxoacoquancapphep->tenBanGhi =$loaihinhdoanhnghiep->tenCoQuan;
         // $lichsuxoacoquancapphep->save();

		return redirect('khoang-san/ho-so-cap-phep-khai-thac')->with('messgxoa','Xóa thành công');
		unset($hoSoCapPhepKhaiThacid);
		unset($fileDinhKemGiayPhepids);
		unset($fileDinhKemBanDoids);
	}








	public function chuyendoikhaithac($id){
		$idhosokhaithac=$id;
		$hoSoCapPhepKhaiThacid =hoSoCapPhepKhaiThac::find($id);
		$chucVus=chucVu::all();
		return view('hoSoCapPhepKhaiThac.chuyendoikhaithac',['chucVus'=>$chucVus,'idhosokhaithac'=>$idhosokhaithac,'hoSoCapPhepKhaiThacid'=>$hoSoCapPhepKhaiThacid]);
		unset($chucVus);
		unset($idhosokhaithac);
		unset($hoSoCapPhepKhaiThacid);
	}




	public function dieuchinhkhaithac($idhosokhaithac,Request $req){

		$hoSoCapPhepKhaiThacid =hoSoCapPhepKhaiThac::find($idhosokhaithac);

		$hoSoCapPhepKhaiThac = new hoSoCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->id_hoSoCapPhepPheDuyetTruLuong =$hoSoCapPhepKhaiThacid ->id_hoSoCapPhepPheDuyetTruLuong;
		$hoSoCapPhepKhaiThac ->lancapphep=$hoSoCapPhepKhaiThacid->lancapphep;

		$hoSoCapPhepKhaiThac ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->ngaygiayphep =$req ->ngayGiayPhep;
		$hoSoCapPhepKhaiThac ->tenGiayPhep =$req->tenGiayPhep;
		$hoSoCapPhepKhaiThac ->nguoiKy =$req ->nguoiKy;
		$hoSoCapPhepKhaiThac ->id_chucVu =$req ->id_chucVu;
		$hoSoCapPhepKhaiThac ->thoigiancapphepkhaithac =$req ->thoiGianCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongKhaiThac =$req ->truLuongKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongDiaChat =$req ->truLuongDiaChat;
		$hoSoCapPhepKhaiThac ->congSuatKhaiThac =$req ->congSuatKhaiThac;
		
		$hoSoCapPhepKhaiThac ->donVi =$req ->donVi;
		$hoSoCapPhepKhaiThac ->note ="1";

		$hoSoCapPhepKhaiThac ->save();

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
				'id_HoSo' => $hoSoCapPhepKhaiThac->id,
				'id_loaiHoSo'=>'4',
				'tenFile'=> $tenAnhmoi
			]); 
		}
		if($req ->hasFile('fileBanDo')){
			$fileDinhKemBanDos = $req->file('fileBanDo');
			foreach ($fileDinhKemBanDos as $fileDinhKemBanDo) {
				$tenAnhBanDo = $fileDinhKemBanDo->getClientOriginalName();
				$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
				while(file_exists("public/tailieu/".$tenAnhMoiBanDo))
				{

					$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
				}
				$fileDinhKemBanDo->move("public/tailieu/",$tenAnhMoiBanDo);

				\DB::table('fileDinhKemBanDo')->insert([
					'id_HoSo' => $hoSoCapPhepKhaiThac->id,
					'id_loaiHoSo'=>'4',
					'tenFile'=> $tenAnhMoiBanDo
				]); 
			}

		}


		$hosocapphepkhaithacdieuchinh = new hosocapphepkhaithacdieuchinh;



		$hosocapphepkhaithacdieuchinh ->id_hoSoCapPhepPheDuyetTruLuong =$hoSoCapPhepKhaiThacid ->id_hoSoCapPhepPheDuyetTruLuong;

		$hosocapphepkhaithacdieuchinh ->lancapphep=$hoSoCapPhepKhaiThacid->lancapphep;

		$hosocapphepkhaithacdieuchinh ->soGiayPhepKhaiThac =$hoSoCapPhepKhaiThacid ->soGiayPhepKhaiThac;
		$hosocapphepkhaithacdieuchinh ->ngaygiayphep =$hoSoCapPhepKhaiThacid ->ngaygiayphep;
		$hosocapphepkhaithacdieuchinh ->tenGiayPhep =$hoSoCapPhepKhaiThacid->tenGiayPhep;
		$hosocapphepkhaithacdieuchinh ->nguoiKy =$hoSoCapPhepKhaiThacid ->nguoiKy;
		$hosocapphepkhaithacdieuchinh ->id_chucVu =$hoSoCapPhepKhaiThacid ->id_chucVu;
		$hosocapphepkhaithacdieuchinh ->thoigiancapphepkhaithac =$hoSoCapPhepKhaiThacid ->thoiGianCapPhepKhaiThac;
		$hosocapphepkhaithacdieuchinh ->truLuongKhaiThac =$hoSoCapPhepKhaiThacid ->truLuongKhaiThac;
		$hosocapphepkhaithacdieuchinh ->truLuongDiaChat =$hoSoCapPhepKhaiThacid ->truLuongDiaChat;
		$hosocapphepkhaithacdieuchinh ->congSuatKhaiThac =$hoSoCapPhepKhaiThacid ->congSuatKhaiThac;

		$hosocapphepkhaithacdieuchinh ->donVi =$hoSoCapPhepKhaiThacid ->donVi;

		$hosocapphepkhaithacdieuchinh ->id_khaithac =$hoSoCapPhepKhaiThac ->id;
		$hosocapphepkhaithacdieuchinh ->save();



		$filegiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();
		foreach ($filegiaypheps as $filegiayphep) {
			$filegiayphep->id_HoSo= $hosocapphepkhaithacdieuchinh ->id;
			$filegiayphep->note=1;
			$filegiayphep->save();
		}

		$fileDinhKemBanDos=fileDinhKemBanDo::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();
		foreach ($fileDinhKemBanDos as $fileDinhKemBanDo) {
			$fileDinhKemBanDo->id_HoSo= $hosocapphepkhaithacdieuchinh ->id;
			$fileDinhKemBanDo->note=1;
			$fileDinhKemBanDo->save();
		}



		$tiencapquyenkhaithacs=tiencapquyenkhaithac::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->get();
		foreach ($tiencapquyenkhaithacs as $tiencapquyenkhaithac) {
			$tiencapquyenkhaithac ->delete();

		}

		$tienkyquymoitruongs=tienkyquymoitruong::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->get();
		foreach ($tienkyquymoitruongs as $tienkyquymoitruong) {
			$tienkyquymoitruong ->delete();

		}

		$hoDongThueDats=hoDongThueDat::where('id_hosocapphepkhaithac',$hoSoCapPhepKhaiThacid->id)->get();
		foreach ($hoDongThueDats as $hoDongThueDat) {
			$hoDongThueDat ->delete();

		}


		$hoSoCapPhepKhaiThacid->delete();





		return redirect('khoang-san/ho-so-cap-phep-khai-thac')->with('messgthem','Thêm thành công');

		unset($doanhNghiepChuyenNhuong);
		unset($hoSoCapPhepKhaiThacChange);
		unset($fileDinhKemGiayPheps);

	}




	public function chuyendoikhaithacdoanhnghiep($idhosokhaithac,Request $req){

		$hoSoCapPhepKhaiThacid =hoSoCapPhepKhaiThac::find($idhosokhaithac);

		$doanhNghiepChuyenNhuong = new doanhNghiepChuyenNhuong;
		$doanhNghiepChuyenNhuong->tenDoanhNghiep=$req ->tenDoanhNghiep;
		$doanhNghiepChuyenNhuong->diaChi=$req ->diaChi;
		$doanhNghiepChuyenNhuong->soDienThoai=$req ->soDienThoai;
		$doanhNghiepChuyenNhuong->id_doanhnghiep=$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id;
		$doanhNghiepChuyenNhuong->save();


		$hoSoCapPhepKhaiThac = new hoSoCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->id_hoSoCapPhepPheDuyetTruLuong =$hoSoCapPhepKhaiThacid ->id_hoSoCapPhepPheDuyetTruLuong;
		$hoSoCapPhepKhaiThac ->lancapphep=$hoSoCapPhepKhaiThacid->lancapphep;

		$hoSoCapPhepKhaiThac ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->ngaygiayphep =$req ->ngayGiayPhep;
		$hoSoCapPhepKhaiThac ->tenGiayPhep =$req->tenGiayPhep;
		$hoSoCapPhepKhaiThac ->nguoiKy =$req ->nguoiKy;
		$hoSoCapPhepKhaiThac ->id_chucVu =$req ->id_chucVu;
		$hoSoCapPhepKhaiThac ->thoigiancapphepkhaithac =$req ->thoiGianCapPhepKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongKhaiThac =$req ->truLuongKhaiThac;
		$hoSoCapPhepKhaiThac ->truLuongDiaChat =$req ->truLuongDiaChat;
		$hoSoCapPhepKhaiThac ->congSuatKhaiThac =$req ->congSuatKhaiThac;

		$hoSoCapPhepKhaiThac ->donVi =$req ->donVi;
	$hoSoCapPhepKhaiThac ->note ="2"; //chuyển nhương khai thác

	$hoSoCapPhepKhaiThac ->save();

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
			'id_HoSo' => $hoSoCapPhepKhaiThac->id,
			'id_loaiHoSo'=>'4',
			'tenFile'=> $tenAnhmoi
		]); 
	}


	if($req ->hasFile('fileBanDo')){
		$fileDinhKemBanDos = $req->file('fileBanDo');
		foreach ($fileDinhKemBanDos as $fileDinhKemBanDo) {
			$tenAnhBanDo = $fileDinhKemBanDo->getClientOriginalName();
			$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
			while(file_exists("public/tailieu/".$tenAnhMoiBanDo))
			{

				$tenAnhMoiBanDo =str_random(4)."_".$tenAnhBanDo;
			}
			$fileDinhKemBanDo->move("public/tailieu/",$tenAnhMoiBanDo);

			\DB::table('fileDinhKemBanDo')->insert([
				'id_HoSo' => $hoSoCapPhepKhaiThac->id,
				'id_loaiHoSo'=>'4',
				'tenFile'=> $tenAnhMoiBanDo
			]); 
		}

	}



	$hosocapphepkhaithacdieuchinh = new hosocapphepkhaithacdieuchinh;

	$hosocapphepkhaithacdieuchinh ->id_hoSoCapPhepPheDuyetTruLuong =$hoSoCapPhepKhaiThacid ->id_hoSoCapPhepPheDuyetTruLuong;
	$hosocapphepkhaithacdieuchinh ->lancapphep=$hoSoCapPhepKhaiThacid->lancapphep;
	$hosocapphepkhaithacdieuchinh ->soGiayPhepKhaiThac =$hoSoCapPhepKhaiThacid ->soGiayPhepKhaiThac;
	$hosocapphepkhaithacdieuchinh ->ngaygiayphep =$hoSoCapPhepKhaiThacid ->ngaygiayphep;
	$hosocapphepkhaithacdieuchinh ->tenGiayPhep =$hoSoCapPhepKhaiThacid->tenGiayPhep;
	$hosocapphepkhaithacdieuchinh ->nguoiKy =$hoSoCapPhepKhaiThacid ->nguoiKy;
	$hosocapphepkhaithacdieuchinh ->id_chucVu =$hoSoCapPhepKhaiThacid ->id_chucVu;
	$hosocapphepkhaithacdieuchinh ->thoigiancapphepkhaithac =$hoSoCapPhepKhaiThacid ->thoiGianCapPhepKhaiThac;
	$hosocapphepkhaithacdieuchinh ->truLuongKhaiThac =$hoSoCapPhepKhaiThacid ->truLuongKhaiThac;
	$hosocapphepkhaithacdieuchinh ->truLuongDiaChat =$hoSoCapPhepKhaiThacid ->truLuongDiaChat;
	$hosocapphepkhaithacdieuchinh ->congSuatKhaiThac =$hoSoCapPhepKhaiThacid ->congSuatKhaiThac;
	$hosocapphepkhaithacdieuchinh ->donVi =$hoSoCapPhepKhaiThacid ->donVi;
	$hosocapphepkhaithacdieuchinh ->id_khaithac =$hoSoCapPhepKhaiThac ->id;
	$hosocapphepkhaithacdieuchinh ->save();


	$filegiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();
	foreach ($filegiaypheps as $filegiayphep) {
		$filegiayphep->id_HoSo= $hosocapphepkhaithacdieuchinh ->id;
		$filegiayphep->note=1;
		$filegiayphep->save();
	}

	$fileDinhKemBanDos=fileDinhKemBanDo::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();
	foreach ($fileDinhKemBanDos as $fileDinhKemBanDo) {
		$fileDinhKemBanDo->id_HoSo= $hosocapphepkhaithacdieuchinh ->id;
		$fileDinhKemBanDo->note=1;
		$fileDinhKemBanDo->save();
	}


	$tiencapquyenkhaithacs=tiencapquyenkhaithac::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->get();
	foreach ($tiencapquyenkhaithacs as $tiencapquyenkhaithac) {
		$tiencapquyenkhaithac ->delete();

	}

	$tienkyquymoitruongs=tienkyquymoitruong::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->get();
	foreach ($tienkyquymoitruongs as $tienkyquymoitruong) {
		$tienkyquymoitruong ->delete();
	}

	$hoDongThueDats=hoDongThueDat::where('id_hosocapphepkhaithac',$hoSoCapPhepKhaiThacid->id)->get();
	foreach ($hoDongThueDats as $hoDongThueDat) {
		$hoDongThueDat ->delete();
	}

	$hoSoCapPhepKhaiThacid->delete();

	return redirect('khoang-san/ho-so-cap-phep-khai-thac')->with('messgthem','Thêm thành công');

	unset($doanhNghiepChuyenNhuong);
	unset($hoSoCapPhepKhaiThacChange);
	unset($fileDinhKemGiayPheps);
	
}



public function suakhaithacindex($id){
	
	$hoSoCapPhepKhaiThacBD =  hoSoCapPhepKhaiThac::find($id);
	$chucVus=chucVu::all();

		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();

		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();


	return view('hoSoCapPhepKhaiThac.suahoso',['hoSoCapPhepKhaiThacBD'=>$hoSoCapPhepKhaiThacBD,'chucVus'=>$chucVus,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);
	unset($hoSoCapPhepKhaiThacBD);
	unset($filedinhkemgiaypheps);
	unset($filedinhkembandos);

	unset($chucVus);

}


public function suahosokhaithacpost($id,Request $req){



$hoSoCapPhepkhaithacedit=hoSoCapPhepKhaiThac::find($id);
  
        $hoSoCapPhepkhaithacedit ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
        $hoSoCapPhepkhaithacedit ->ngaygiayphep =$req ->ngaygiayphep;
        $hoSoCapPhepkhaithacedit ->tenGiayPhep =$req ->tenGiayPhep;
        $hoSoCapPhepkhaithacedit ->nguoiKy =$req ->nguoiKy;
        $hoSoCapPhepkhaithacedit ->id_chucVu =$req ->id_chucVu;
        $hoSoCapPhepkhaithacedit ->thoigiancapphepkhaithac =$req ->thoigiancapphepkhaithac;
        $hoSoCapPhepkhaithacedit ->truLuongDiaChat =$req ->truLuongDiaChat;
        $hoSoCapPhepkhaithacedit ->truLuongKhaiThac =$req ->truLuongKhaiThac;
        $hoSoCapPhepkhaithacedit ->donVi =$req ->donVi;
           $hoSoCapPhepkhaithacedit ->congSuatKhaiThac =$req ->congSuatKhaiThac;
        $hoSoCapPhepkhaithacedit ->save();

        if($req->hasFile('fileGiayPhep')){

          $filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',4)->get();

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

            \DB::table('filedinhkemgiayphep')->insert([
              'id_HoSo' => $id,
              'id_loaiHoSo'=>'4',
              'tenFile'=> $tenAnhmoi
            ]); 
          }

        }


if($req->hasFile('fileBanDo')){

          $filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',4)->get();

          foreach ( $filedinhkembandos as $filedinhkembando) {
            unlink("public/tailieu/".$filedinhkembando->tenFile);
            $filedinhkembando->delete();
          }


          $filedinhkembandos = $req->file('fileBanDo');

          foreach ($filedinhkembandos as $filedinhkembando) {
            $tenAnh = $filedinhkembando->getClientOriginalName();
            $tenAnhmoi =str_random(4)."_".$tenAnh;
            while(file_exists("public/tailieu/".$tenAnhmoi))
            {

              $tenAnhmoi =str_random(4)."_".$tenAnh;
            }
            $filedinhkembando->move("public/tailieu/",$tenAnhmoi);

            \DB::table('fileDinhKemBanDo')->insert([
              'id_HoSo' => $id,
              'id_loaiHoSo'=>'4',
              'tenFile'=> $tenAnhmoi
            ]); 
          }

        }


	return redirect('khoang-san/ho-so-cap-phep-khai-thac')->with('messgsua','sua thành công');


}


	public function chuyendoikhaithacthuhoi( Request $req,$idhosokhaithac){

	
		
		$hoSoCapPhepKhaiThacid =hoSoCapPhepKhaiThac::find($idhosokhaithac);
		$hoSoCapPhepKhaiThacid ->thuhoitralai ="1";
		$hoSoCapPhepKhaiThacid ->save();


		$hosothuhoitralaimo = new hosothuhoitralaimo();

		$hosothuhoitralaimo->soquyetdinh= $req->soquyetdinh;
		$hosothuhoitralaimo->ngayquyetdinh= $req->ngayquyetdinh;
		$hosothuhoitralaimo->lydo= $req->lydo;
		$hosothuhoitralaimo->id_khaithac= $idhosokhaithac;

		if($req->hasFile('file')){

			$file =$req->file('file');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;


			while(file_exists("public/tailieu/".$Hinh))
			{

				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);

			$hosothuhoitralaimo->file=$Hinh;

		}
    	

    	$hosothuhoitralaimo->save();

		
		
		return redirect('khoang-san/bien-dong-khoang-san')->with('messgthem','Thêm thành công');

		
		
	}


}
