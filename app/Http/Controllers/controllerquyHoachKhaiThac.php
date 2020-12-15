<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quyHoachKhaiThac;


class controllerquyHoachKhaiThac extends Controller
{
    //
 
    public function index(){
    
		$quyHoachKhaiThacs = quyHoachKhaiThac::orderBy('id','DESC')->get();
		return view('vungquyhoachkhaithac.index',['quyHoachKhaiThacs'=>$quyHoachKhaiThacs]);
		unset($quyHoachKhaiThac);
		

	}


	
	public function themdulieuvungquyhoach(Request $req){

		$quyHoachKhaiThac = new quyHoachKhaiThac;
		$quyHoachKhaiThac->soQuyetdinh= $req ->soQuyetdinh;
		$quyHoachKhaiThac->tenQuyHoach= $req ->tenQuyHoach;
		$quyHoachKhaiThac->giaiDoanQuyHoach= $req ->giaiDoanQuyHoach;
		$quyHoachKhaiThac->phamViQuyHoach= $req ->phamViQuyHoach;

		if($req->hasFile('file')){

			$file =$req->file('file');

			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;

			while(file_exists("public/tailieu/".$Hinh))
			{
				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);

			$quyHoachKhaiThac->file=$Hinh;
		}
		else{
			$quyHoachKhaiThac->file="ero";
		}
		$quyHoachKhaiThac->save();
		return redirect('khoang-san/du-lieu-quy-hoach-khai-thac')->with('messgthem','Thêm thành công');

		unset($quyHoachKhaiThac);
	}

	
	public function xoadulieuquyhoachkhaithac($id){

		$quyHoachKhaiThacid = quyHoachKhaiThac::find($id);
		$quyHoachKhaiThacid->delete();
		unlink("public/tailieu/".$quyHoachKhaiThacid->file);

		return redirect('khoang-san/du-lieu-quy-hoach-khai-thac')->with('messgxoa','Xóa thành công');
		unset($quyHoachKhaiThacid);
		
		
	}

	
	public function suadulieuquyhoachkhaithac($id){

		$quyHoachKhaiThacid = quyHoachKhaiThac::find($id);
		return view('vungquyhoachkhaithac.suadulieuquyhoachkhaithac',['quyHoachKhaiThacid'=>$quyHoachKhaiThacid]);

		
		unset($quyHoachKhaiThacid);
		
		
	}

	

	public function suadulieuquyhoachkhaithacpost($id, Request $req){


		$quyHoachKhaiThacedit=quyHoachKhaiThac::find($id);
		$quyHoachKhaiThacedit->soQuyetdinh= $req ->soQuyetdinh;
		$quyHoachKhaiThacedit->tenQuyHoach= $req ->tenQuyHoach;
		$quyHoachKhaiThacedit->giaiDoanQuyHoach= $req ->giaiDoanQuyHoach;
		$quyHoachKhaiThacedit->phamViQuyHoach= $req ->phamViQuyHoach;

		if($req ->hasFile('file')){

			$file =$req->file('file');
			$name =$file ->getclientoriginalname();
			$Hinh =str_random(4)."_".$name;

			while(file_exists("public/tailieu/".$Hinh))
			{

				$Hinh =str_random(4)."_".$name;
			}
			$file->move("public/tailieu/",$Hinh);
			unlink("public/tailieu/".$quyHoachKhaiThacedit->file);
			$quyHoachKhaiThacedit->file=$Hinh;

		}
		
		$quyHoachKhaiThacedit->save();


		return redirect('khoang-san/du-lieu-quy-hoach-khai-thac')->with('messgsua','Sửa thành công');


	}

}
