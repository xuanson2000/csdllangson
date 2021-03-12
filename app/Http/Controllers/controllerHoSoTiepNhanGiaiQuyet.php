<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoSoTiepNhanGiaiQuyet;
use Auth;
use Carbon\Carbon;

class controllerHoSoTiepNhanGiaiQuyet extends Controller
{
    //
	public function index(){

		$hosotiepnhangqs =hoSoTiepNhanGiaiQuyet::orderBy('id','DESC')->get();
		return view('hosotiepnhangiaiquyet.index',['hosotiepnhangqs'=>$hosotiepnhangqs]);
		unset($hosotiepnhangqs);

	}

	

	public function themhosotiepnhan(Request $req){

		$hoSoTiepNhanGiaiQuyet = new hoSoTiepNhanGiaiQuyet;
		$hoSoTiepNhanGiaiQuyet->tenHoSo= $req ->tenHoSo;
		$hoSoTiepNhanGiaiQuyet->donViTrinh= $req ->donViTrinh;
		$hoSoTiepNhanGiaiQuyet->ngayHenTra= $req ->ngayHenTra;
		$hoSoTiepNhanGiaiQuyet->canBoTiepNhan=Auth::guard('quantri')->user()->id;
		$hoSoTiepNhanGiaiQuyet->ngayHenTra= $req ->ngayHenTra;
		$hoSoTiepNhanGiaiQuyet->ngayTiepNhan= Carbon::now();
		
		if($req->hasFile('file')){

			$file =$req->file('file');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;

			while(file_exists("public/tailieu/".$Hinh))
			{
				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);

			$hoSoTiepNhanGiaiQuyet->file=$Hinh;
		}
		
		$hoSoTiepNhanGiaiQuyet->save();
		return redirect('khoang-san/ho-so-tiep-nhan-giai-quyet')->with('messgthem','Thêm thành công');

		unset($hoSoTiepNhanGiaiQuyet);
	}



public function xoahosotiepnhan($id){

		$hoSoTiepNhanGiaiQuyetid = hoSoTiepNhanGiaiQuyet::find($id);
		$hoSoTiepNhanGiaiQuyetid->delete();
		unlink("public/tailieu/".$hoSoTiepNhanGiaiQuyetid->file);
		return redirect('khoang-san/ho-so-tiep-nhan-giai-quyet')->with('messgxoa','Xóa thành công');
		unset($hoSoTiepNhanGiaiQuyetid);

}

public function suahosotiepnhan($id){

		$suahosotiepnhan = hoSoTiepNhanGiaiQuyet::find($id);
	
		return view('hosotiepnhangiaiquyet.suahosotiepnhan',['suahosotiepnhan'=>$suahosotiepnhan]);
		unset($suahosotiepnhan);

}


public function suahosotiepnhanpost($id,Request $req){

		$suahosotiepnhanpost = hoSoTiepNhanGiaiQuyet::find($id);

		$suahosotiepnhanpost ->tenHoSo =$req->tenHoSo;
		$suahosotiepnhanpost->donViTrinh=$req ->donViTrinh;
		$suahosotiepnhanpost ->ngayHenTra =$req ->ngayHenTra;
		$suahosotiepnhanpost->canBoTiepNhan=Auth::guard('quantri')->user()->id;
		
		if($req->hasFile('fileGiayPhep')){

			
				unlink("public/tailieu/".$suahosotiepnhanpost->file);
				$suahosotiepnhanpost->delete();

				$file =$req->file('fileGiayPhep');

				$name =$file ->getclientoriginalname();
				$Hinh =str_random(4)."_".$name;

				while(file_exists("public/tailieu/".$Hinh))
				{
					$Hinh =str_random(4)."_".$name;
				}
				$file->move("public/tailieu/",$Hinh);

				$suahosotiepnhanpost->file=$Hinh;
			

		}


		$suahosotiepnhanpost->save();
		
	return redirect('khoang-san/ho-so-tiep-nhan-giai-quyet')->with('messgsua','Sửa thành công');
	}

   

}
