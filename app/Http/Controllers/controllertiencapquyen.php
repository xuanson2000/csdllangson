<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\hoSoCapPhepKhaiThac;
use App\tiencapquyenkhaithac;


class controllertiencapquyen extends Controller
{
    //

	public function index(){
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
		$tiencapquyenkhaithacs=tiencapquyenkhaithac::orderBy('id','DESC')->get();

		//dd($hopdongthuedats);
		return view('tiencapquyenkhaithac.index',['tiencapquyenkhaithacs'=>$tiencapquyenkhaithacs,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
		unset($tiencapquyenkhaithacs);
		unset($hoSoCapPhepKhaiThacs);
	}

	public function themtiencapquyen(Request $req){


      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_khaithac);

		$tiencapquyenkhaithac = new tiencapquyenkhaithac;
		$tiencapquyenkhaithac ->id_mo =$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;
		$tiencapquyenkhaithac ->id_khaithac =$req ->id_khaithac;
		$tiencapquyenkhaithac->soqd=$req ->soqd;
		$tiencapquyenkhaithac->tongtien=$req ->tongtien;
		$tiencapquyenkhaithac ->ngayquyetdinh =$req ->ngayquyetdinh;
		$tiencapquyenkhaithac ->sotiennoplandau =$req ->sotiennoplandau;
		$tiencapquyenkhaithac ->solannop =$req ->solannop;

		$tiencapquyenkhaithac ->save();

		return redirect()->back()->with('messgthem','Thêm thành công');

		unset($tiencapquyenkhaithac);


}



 public function suatiencapquyenkhaithac($id){

	    $hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::all();
        $tiencapquyenkhaithacedit=tiencapquyenkhaithac::where('id',$id)->first();
        return view('tiencapquyenkhaithac.suatiencapquyenkhaithac',['tiencapquyenkhaithacedit'=>$tiencapquyenkhaithacedit,'hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);
        unset($tiencapquyenkhaithacedit);
               unset($hoSoCapPhepKhaiThacs);


    }



public function suatiencapquyenkhaithacpost($id, Request $req){


     $hoSoCapPhepKhaiThacedit=tiencapquyenkhaithac::find($id);
     
      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($req ->id_khaithac);

$hoSoCapPhepKhaiThacedit->id_mo = $hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id;

		$hoSoCapPhepKhaiThacedit ->id_khaithac =$req->id_khaithac;
		$hoSoCapPhepKhaiThacedit->soqd=$req ->soqd;
		$hoSoCapPhepKhaiThacedit->tongtien=$req ->tongtien;
		$hoSoCapPhepKhaiThacedit ->ngayquyetdinh =$req ->ngayquyetdinh;
		$hoSoCapPhepKhaiThacedit ->sotiennoplandau =$req ->sotiennoplandau;
		$hoSoCapPhepKhaiThacedit ->solannop =$req ->solannop;

        $hoSoCapPhepKhaiThacedit->save();

        return redirect('khoang-san/tien-cap-quyen-khai-thac')->with('messgsua','Sửa thành công');

    }


public function xoatiencapquyenkhaithac($id,Request $req){

		$tiencapquyenkhaithacedit = tiencapquyenkhaithac::find($id);
		// $lichsuxoadoanhnghiep= new lichSuTruyCap;
		// $lichsuxoadoanhnghiep->tenBang='loại hình doanh nghiệp';
		// $lichsuxoadoanhnghiep->id_user=auth::guard('quantri')->user()->id;
		// $lichsuxoadoanhnghiep->ip_client=$req->ip();
		// $lichsuxoadoanhnghiep->thaoTac ='xóa';
		// $lichsuxoadoanhnghiep->tenBanGhi =$loaihinhdoanhnghiep->tenloaihinh;
		// $lichsuxoadoanhnghiep->save();
		$tiencapquyenkhaithacedit->delete();

		return redirect('khoang-san/tien-cap-quyen-khai-thac')->with('messgxoa','xóa thành công');
		
	}

}
