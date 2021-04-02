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
use App\nhomKhoangSan;
use App\hosocapphepkhaithacdieuchinh;
use App\nopNganSachKhoangSan;
use App\tiencapquyenkhaithac;
use App\tienkyquymoitruong;
use App\hoDongThueDat;
use App\hosothuhoitralaimo;
use App\hoSoCapPhepKhaiThacTanThu;
use DB;


class controllerHoSoCapPhepKhaiThacTanThu extends Controller
{
    //

	public function index()


	{
		$hoSoCapPhepKhaiThacTanThu=hoSoCapPhepKhaiThacTanThu::orderBy('id','DESC')->get();

		// $quanHuyens =quanHuyen::all();
		// $hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::where('thuhoitralai','=',null)->orderBy('id','DESC')->get();
		// //
		return view('hosocapphepkhaithactanthu.index',['hoSoCapPhepKhaiThacTanThu'=>$hoSoCapPhepKhaiThacTanThu]);
		// unset($quanHuyens);
		// unset($hoSoCapPhepKhaiThacs);
	} 
	

	public function add(){
	$quanHuyens=quanHuyen::get();
		$nhomKhoangSans=nhomKhoangSan::get();
		$coQuanCapPheps=coQuanCapPhep::get();
	
		$chucVus=chucVu::all();
		return view('hosocapphepkhaithactanthu.add',['chucVus'=>$chucVus,'quanHuyens'=>$quanHuyens,'nhomKhoangSans'=>$nhomKhoangSans,'coQuanCapPheps'=>$coQuanCapPheps]);
		unset($chucVus);
		
		
	} 



	public function addpost(Request $req){


		$duLieuMo = new duLieuMo;

		$duLieuMo->tenMo= $req ->tenMo;
		$duLieuMo->loaiKhoangSan= $req ->loaiKhoangSan;
		$duLieuMo->viTriXa= $req ->viTriXa;
		$duLieuMo->truLuong= $req ->truLuong;
		$duLieuMo->kyHieuMo= $req ->kyHieuMo;
		$duLieuMo->nguonGoc= $req ->nguonGoc;
		$duLieuMo->quyMo= $req ->quyMo;
		$duLieuMo->dieuKienKhaiThac= $req ->dieuKienKhaiThac;
		$duLieuMo->dinhHuong= $req ->dinhHuong;
		$duLieuMo->dacDiemDiaChat= $req ->dacDiemDiaChat;
		$duLieuMo->congTacTienHanh= $req ->congTacTienHanh;
		$duLieuMo->dacdiemKhoang= $req ->dacdiemKhoang;
		$duLieuMo->coQuanPheDuyet= $req ->coQuanPheDuyet;
		$duLieuMo->donVi= $req ->donVi;
		$duLieuMo->hienTrang=1;
		// $duLieuMo->id_user=Auth::guard('quantri')->user()->id;

		$duLieuMo->save();


		$doanhNghiep = new doanhNghiep; 
		$doanhNghiep->tenDoanhNghiep = $req->tenDoanhNghiep;
		$doanhNghiep->soDienThoai = $req->soDienThoai;
		$doanhNghiep->diaChi = $req->diaChi;
		$doanhNghiep ->save();


		$hoSoCapPhepKhaiThacTanThu = new hoSoCapPhepKhaiThacTanThu;
	
		$hoSoCapPhepKhaiThacTanThu ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
		$hoSoCapPhepKhaiThacTanThu ->ngaygiayphep =$req ->ngayGiayPhep;
		$hoSoCapPhepKhaiThacTanThu ->tenGiayPhep =$req->tenGiayPhep;
		$hoSoCapPhepKhaiThacTanThu ->nguoiKy =$req ->nguoiKy;
		$hoSoCapPhepKhaiThacTanThu ->id_chucVu =$req ->id_chucVu;
		$hoSoCapPhepKhaiThacTanThu ->thoigiancapphepkhaithac =$req ->thoiGianCapPhepKhaiThac;
		$hoSoCapPhepKhaiThacTanThu ->truLuongKhaiThac =$req ->truLuongKhaiThac;
		$hoSoCapPhepKhaiThacTanThu ->truLuongDiaChat =$req ->truLuongDiaChat;
		$hoSoCapPhepKhaiThacTanThu ->congSuatKhaiThac =$req ->congSuatKhaiThac;
		//$hoSoCapPhepKhaiThac ->dienTichKhaiThac =$req ->dienTichKhaiThac;
		$hoSoCapPhepKhaiThacTanThu ->donVi =$req ->donVi;
		$hoSoCapPhepKhaiThacTanThu ->id_mo=$duLieuMo->id;
		$hoSoCapPhepKhaiThacTanThu ->id_mo=$duLieuMo->id;
		$hoSoCapPhepKhaiThacTanThu->id_doanhNghiep=	$doanhNghiep->id;
		$hoSoCapPhepKhaiThacTanThu ->save();

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
				'id_HoSo' => $hoSoCapPhepKhaiThacTanThu->id,
				'id_loaiHoSo'=>'05',
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
					'id_HoSo' => $hoSoCapPhepKhaiThacTanThu->id,
					'id_loaiHoSo'=>'05',
					'tenFile'=> $tenAnhMoiBanDo
				]); 
			}

		}

		
        $taodoxs = $req->toadox;
        $taodoys = $req->toadoy; 
        if($taodoxs!=null && $taodoys!=null ){

         foreach (array_combine($taodoxs, $taodoys) as $taodox => $taodoy) {

            \DB::table('toaDo')->insert([
                'id_loaihoso'=>'3',
                'id_hoso'=> $hoSoCapPhepKhaiThacTanThu->id,
                'toadox' => $taodox,
                'toadoy' => $taodoy,
                
            ]); 

        }
    }


		

		return redirect('khoang-san/ho-so-cap-phep-khai-thac-tan-thu')->with('messgthem','Thêm thành công');

	


	}

	
	public function chitiet($id)
	{
	
		$hoSoCapPhepKhaiThacTanThu=hoSoCapPhepKhaiThacTanThu::find($id);
		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','05')->get();
		
		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','05')->get();

		return view('hosocapphepkhaithactanthu.chitiet',['hoSoCapPhepKhaiThacTanThu'=>$hoSoCapPhepKhaiThacTanThu,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);
		unset($hoSoCapPhepKhaiThacTanThu);
		unse($filedinhkemgiaypheps);
		unse($filedinhkembandos);
	} 

	

	public function delete($id){

		$hoSoCapPhepKhaiThacTanThudelete = hoSoCapPhepKhaiThacTanThu::find($id);
		
		
		$doanhngghiepid=doanhNghiep::find($hoSoCapPhepKhaiThacTanThudelete->id_doanhNghiep);
		$doanhngghiepid->delete();
		$hoSoCapPhepKhaiThacTanThudelete->delete();

		$fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',05)->get();

		foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
			$fileDinhKemGiayPhepid->delete();

		}

		$fileDinhKemBanDoids=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',05)->get();
		foreach ( $fileDinhKemBanDoids as $fileDinhKemBanDoid) {
			$fileDinhKemBanDoid->delete();
		}

		return redirect('khoang-san/ho-so-cap-phep-khai-thac-tan-thu')->with('messgxoa','Xóa thành công');
		
	}



public function edit($id){
	
	$hoSoCapPhepKhaiThacTanThuedit =  hoSoCapPhepKhaiThacTanThu::find($id);
	$chucVus=chucVu::all();

		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','05')->get();

		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','05')->get();
		$toaDoEdits=DB::table('toaDo')->where('id_loaihoso',3)->where('id_hoso',$id)->get();


	return view('hosocapphepkhaithactanthu.edit',['hoSoCapPhepKhaiThacTanThuedit'=>$hoSoCapPhepKhaiThacTanThuedit,'chucVus'=>$chucVus,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos,'toaDoEdits'=>$toaDoEdits]);
	unset($hoSoCapPhepKhaiThacTanThuedit);
	unset($filedinhkemgiaypheps);
	unset($filedinhkembandos);
	unset($chucVus);

}



public function editpost($id,Request $req){

	$hoSoCapPhepKhaiThacTanThuedit=hoSoCapPhepKhaiThacTanThu::find($id);

	$hoSoCapPhepKhaiThacTanThuedit ->soGiayPhepKhaiThac =$req ->soGiayPhepKhaiThac;
	$hoSoCapPhepKhaiThacTanThuedit ->ngaygiayphep =$req ->ngaygiayphep;
	$hoSoCapPhepKhaiThacTanThuedit ->tenGiayPhep =$req ->tenGiayPhep;
	$hoSoCapPhepKhaiThacTanThuedit ->nguoiKy =$req ->nguoiKy;
	$hoSoCapPhepKhaiThacTanThuedit ->id_chucVu =$req ->id_chucVu;
	$hoSoCapPhepKhaiThacTanThuedit ->thoigiancapphepkhaithac =$req ->thoigiancapphepkhaithac;
	$hoSoCapPhepKhaiThacTanThuedit ->truLuongDiaChat =$req ->truLuongDiaChat;
	$hoSoCapPhepKhaiThacTanThuedit ->truLuongKhaiThac =$req ->truLuongKhaiThac;
	$hoSoCapPhepKhaiThacTanThuedit ->donVi =$req ->donVi;
	$hoSoCapPhepKhaiThacTanThuedit ->congSuatKhaiThac =$req ->congSuatKhaiThac;
	$hoSoCapPhepKhaiThacTanThuedit ->save();


	        $toaDoEdits=DB::table('toaDo')->where('id_loaihoso',3)->where('id_hoso',$id)->get();

   // dd($toaDoEdits);
        foreach($toaDoEdits as $toaDoEdit){
            $idX=$toaDoEdit->id;
            $idX=$idX."X";
            $idY=$toaDoEdit->id;
            $idY=$idY."Y";


            \DB::table('toaDo')->where('id',$toaDoEdit->id)->update([
              'toadox' =>$req->$idX,
              'toadoy' =>$req->$idY
          ]); 
        }


        if($req->hasFile('fileGiayPhep')){

        	$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',05)->get();

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
        			'id_loaiHoSo'=>'05',
        			'tenFile'=> $tenAnhmoi
        		]); 
        	}

        }


        if($req->hasFile('fileBanDo')){

        	$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',05)->get();

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
        			'id_loaiHoSo'=>'05',
        			'tenFile'=> $tenAnhmoi
        		]); 
        	}

        }


	return redirect('khoang-san/ho-so-cap-phep-khai-thac-tan-thu')->with('messgsua','sua thành công');


}


}
