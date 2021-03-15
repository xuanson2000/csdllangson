<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\loaiHinhDoanhNghiep;
use App\coQuanCapPhep;
use App\nhomKhoangSan;
use App\loaiHinhKhoangSan;
use App\quanHuyen;
use App\xaPhuong;
use App\phongBan;
use App\lichSuTruyCap;
use App\chucVu;
use Auth;
class controllerCapnhathethong extends Controller
{
    // loại hinh doanh nghiep
	public function index(){

		$loaiHinhDoanhNghieps= DB::table('loaiHinhDoanhNghiep')->get();
		return view('capnhathethong.loaihinhdoanhnghiep.index',['loaiHinhDoanhNghieps'=>$loaiHinhDoanhNghieps]);
		unset($loaiHinhDoanhNghieps);
	}



	public function themloaihinhdoanhnghiep(Request $req){

    	$loaihinhdoanhnghiep = new loaiHinhDoanhNghiep;

        $loaihinhdoanhnghiep->tenLoaiHinh= $req ->tenLoaiHinh;
        $loaihinhdoanhnghiep->ghiChu= $req ->ghiChu;
        $loaihinhdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep= new lichSuTruyCap;
        $lichsuthemdoanhnghiep->tenBang='Loại hình doanh nghiệp';
        $lichsuthemdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep->ip_client=\Request::ip();
        $lichsuthemdoanhnghiep->thaoTac ='Thêm mới';
        $lichsuthemdoanhnghiep->tenBanGhi=$req ->tenLoaiHinh;
        $loaihinhdoanhnghiep->save();
        $lichsuthemdoanhnghiep->save();

    	return redirect('khoang-san/loai-hinh-doanh-nghiep')->with('messgthem','Thêm thành công');

    	unset($loaihinhdoanhnghiep);
        unset($lichsuthemdoanhnghiep);

    }



    public function xoaloaihinhdoanhnghiep($id,Request $req){

        $loaihinhdoanhnghiep = loaihinhdoanhnghiep::find($id);
    
      

        $lichsuxoadoanhnghiep= new lichSuTruyCap;
        $lichsuxoadoanhnghiep->tenBang='loại hình doanh nghiệp';
        $lichsuxoadoanhnghiep->id_user=auth::guard('quantri')->user()->id;
       $lichsuxoadoanhnghiep->ip_client=$req->ip();
        $lichsuxoadoanhnghiep->thaoTac ='xóa';
        $lichsuxoadoanhnghiep->tenBanGhi =$loaihinhdoanhnghiep->tenloaihinh;

        
        $lichsuxoadoanhnghiep->save();
      $loaihinhdoanhnghiep->delete();

        return redirect('khoang-san/loai-hinh-doanh-nghiep')->with('messgxoa','xóa thành công');
        unset($loaihinhdoanhnghiep);
        unset($lichsuxoadoanhnghiep);
    }


    public function suadoanhnghiep($id){

        $doanhnghiepid=DB::table('loaiHinhDoanhNghiep')->where('id',$id)->first();

 
        return view('capnhathethong.loaihinhdoanhnghiep.suadoanhnghiep',['doanhnghiepid'=>$doanhnghiepid]);
        unset($doanhnghiepid);

    }

    

      public function suadoanhnghieppost($id, Request $req){


$suadoanhnghieppost=loaiHinhDoanhNghiep::find($id);
   $suadoanhnghieppost->tenLoaiHinh= $req ->tenLoaiHinh;
        $suadoanhnghieppost->ghiChu= $req ->ghiChu;

        $suadoanhnghieppost->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep= new lichSuTruyCap;
        $lichsuthemdoanhnghiep->tenBang='Loại hình doanh nghiệp';
        $lichsuthemdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep->ip_client=\Request::ip();
        $lichsuthemdoanhnghiep->thaoTac ='sửa';
        $lichsuthemdoanhnghiep->tenBanGhi=$req ->tenLoaiHinh;
        $suadoanhnghieppost->save();
        $lichsuthemdoanhnghiep->save();

        return redirect('khoang-san/loai-hinh-doanh-nghiep')->with('messgsua','Sửa thành công');



    }

// co quan cap phep

    

    public function indexcoquancapphep(){

    	$coQuanCapPheps = coQuanCapPhep::get();
    	return view('capnhathethong.coquancapphep.index',['coQuanCapPheps'=>$coQuanCapPheps]);
    	unset($coQuanCapPheps);

    }



    public function themcoquancapphep(Request $req){

    	$coQuanCapPhep = new coQuanCapPhep;
    	$coQuanCapPhep->tenCoQuan= $req ->tenCoQuan;
    	$coQuanCapPhep->ghiChu= $req ->ghiChu;
    	$coQuanCapPhep->id_user=Auth::guard('quantri')->user()->id;


        $lichsuthemcoquancapphep= new lichSuTruyCap;
        $lichsuthemcoquancapphep->tenBang='Cơ quan cấp phép';
        $lichsuthemcoquancapphep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemcoquancapphep->ip_client=\Request::ip();
        $lichsuthemcoquancapphep->thaoTac ='Thêm mới';
        $lichsuthemcoquancapphep->tenBanGhi=$req ->tenCoQuan;

    	$coQuanCapPhep->save();
        $lichsuthemcoquancapphep->save();
    	return redirect('khoang-san/co-quan-cap-phep')->with('messgthem','Thêm thành công');
    	unset($coQuanCapPhep);
        unset($lichsuthemcoquancapphep);
    }


    public function xoacoquancapphep($id){

    	$coQuanCapPhep = coQuanCapPhep::find($id);


        $lichsuxoacoquancapphep= new lichSuTruyCap;
        $lichsuxoacoquancapphep->tenBang='cơ quan cấp phép';
        $lichsuxoacoquancapphep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuxoacoquancapphep->ip_client=\Request::ip();
        $lichsuxoacoquancapphep->thaoTac ='Xóa';
        $lichsuxoacoquancapphep->tenBanGhi =$coQuanCapPhep->tenCoQuan;


    	$coQuanCapPhep->delete();
         $lichsuxoacoquancapphep->save();
    	return redirect('khoang-san/co-quan-cap-phep')->with('messgxoa','Xóa thành công');
    	unset($coQuanCapPhep);
        unset($lichsuxoacoquancapphep);
    }






   public function suacoquancapphep($id){

        $coQuanCapPhepid=DB::table('coQuanCapPhep')->where('id',$id)->first();
        return view('capnhathethong.coquancapphep.suacoquancapphep',['coQuanCapPhepid'=>$coQuanCapPhepid]);
        unset($coQuanCapPhepid);

    }


      public function suacoquancappheppost($id, Request $req){


$coQuanCapPheppost=coQuanCapPhep::find($id);
   $coQuanCapPheppost->tenCoQuan= $req ->tenCoQuan;
        $coQuanCapPheppost->ghiChu= $req ->ghiChu;

        $coQuanCapPheppost->id_user=Auth::guard('quantri')->user()->id;
        $lichSuTruyCap= new lichSuTruyCap;
        $lichSuTruyCap->tenBang='Cơ quan cấp phép';
        $lichSuTruyCap->id_user=Auth::guard('quantri')->user()->id;
        $lichSuTruyCap->ip_client=\Request::ip();
        $lichSuTruyCap->thaoTac ='sửa';
        $lichSuTruyCap->tenBanGhi=$req ->tenCoQuan;
        $lichSuTruyCap->save();
        $coQuanCapPheppost->save();

        return redirect('khoang-san/co-quan-cap-phep')->with('messgsua','Sửa thành công');



    }

// nhóm khoang san

    

    public function indexnhomkhoangsan(){

    	$nhomKhoangSans = nhomKhoangSan::orderBy('id','DESC')->get();
    	return view('capnhathethong.nhomkhoangsan.index',['nhomKhoangSans'=>$nhomKhoangSans]);
    	unset($coQuanCapPheps);
    }

    
    
    public function themnhomkhoangsan(Request $req){

    	$nhomKhoangSan = new nhomKhoangSan;

    	$nhomKhoangSan->tenNhomKS= $req ->tenNhomKS;
    	$nhomKhoangSan->ghiChu= $req ->ghiChu;

    	$nhomKhoangSan->id_user=Auth::guard('quantri')->user()->id;

    	$nhomKhoangSan->save();
    	return redirect('khoang-san/nhom-khoang-sann')->with('messgthem','Thêm thành công');

    	unset($nhomKhoangSan);
    }



   public function xoanhomkhoangsan($id){

    	$nhomKhoangSan = nhomKhoangSan::find($id);
    	$nhomKhoangSan->delete();
         
        $loaiHinhKhoangSans =loaiHinhKhoangSan::where('id_nhomKhoangSan',$id)->get();

        foreach ($loaiHinhKhoangSans as $loaiHinhKhoangSan ) {
            $loaiHinhKhoangSan->delete();
        }


    	return redirect('khoang-san/nhom-khoang-sann')->with('messgxoa','Xóa thành công');
    	unset($nhomKhoangSan);
        unset($loaiHinhKhoangSans);
    }





 public function suanhomkhoangsan($id){

        $nhomKhoangSanedit=DB::table('nhomKhoangSan')->where('id',$id)->first();
        return view('capnhathethong.nhomkhoangsan.suanhomkhoangsan',['nhomKhoangSanedit'=>$nhomKhoangSanedit]);
        unset($nhomKhoangSanedit);

    }



    
    public function suanhomkhoangsanpost($id, Request $req){


$nhomKhoangSanedit=nhomKhoangSan::find($id);
   $nhomKhoangSanedit->tenNhomKS= $req ->tenNhomKS;
        $nhomKhoangSanedit->ghiChu= $req ->ghiChu;

        $nhomKhoangSanedit->id_user=Auth::guard('quantri')->user()->id;

        $lichsuthemdoanhnghiep= new lichSuTruyCap;
        $lichsuthemdoanhnghiep->tenBang='nhóm khoáng sản';
        $lichsuthemdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep->ip_client=\Request::ip();
        $lichsuthemdoanhnghiep->thaoTac ='sửa';
        $lichsuthemdoanhnghiep->tenBanGhi=$req ->tenNhomKS;
        $nhomKhoangSanedit->save();
        $lichsuthemdoanhnghiep->save();

        return redirect('khoang-san/nhom-khoang-sann')->with('messgsua','Sửa thành công');

    }

    //loai hinh khoang san

    public function indexloaihinhkhoangsan(){
    	$nhomkhoangsans=nhomKhoangSan::get();

    	$loaihinhkhoangsans = loaiHinhKhoangSan::orderBy('id','DESC')->paginate(10);
    	return view('capnhathethong.loaihinhkhoansan.index',['loaihinhkhoangsans'=>$loaihinhkhoangsans,'nhomkhoangsans'=>$nhomkhoangsans]);
    	unset($loaihinhkhoangsans);
    	unset($nhomkhoangsans);
    }

    
 


  public function tracuuloaikhoangsan( Request $req){
    	$nhomkhoangsans=nhomKhoangSan::get();
    	
    	if($req->nhomkhongsan==0){
    		$id=$req->nhomkhongsan;
    		$tennhomkhoangsan=0;
    		$loaihinhkhoangsanids = loaiHinhKhoangSan::orderBy('id','DESC')->get();
    	} else
    	{
    		$id=$req->nhomkhongsan;
    		$tennhomkhoangsan=nhomKhoangSan::find( $req->nhomkhongsan);
    		$loaihinhkhoangsanids = loaiHinhKhoangSan::where('id_nhomKhoangSan', $req->nhomkhongsan)->orderBy('id','DESC')->get();
    	}

    	return view('capnhathethong.loaihinhkhoansan.index',['loaihinhkhoangsanids'=>$loaihinhkhoangsanids,'nhomkhoangsans'=>$nhomkhoangsans,'tennhomkhoangsan'=>$tennhomkhoangsan,'id'=>$id]);
    	unset($loaihinhkhoangsanids);
    	unset($nhomkhoangsans);
    	unset($tennhomkhoangsan);
    	unset($id);
    }



    public function themloaihinhkhoangsan(Request $req){

    	$loaihinhkhoangsan = new loaiHinhKhoangSan;

    	$loaihinhkhoangsan->tenLoaiHinhKS= $req->tenLoaiHinhKS;
                $loaihinhkhoangsan->kyhieu= $req->kyhieu;
    	$loaihinhkhoangsan->id_nhomKhoangSan= $req ->idNhomKhoangSan;

    	$loaihinhkhoangsan->id_user=Auth::guard('quantri')->user()->id;

    	$loaihinhkhoangsan->save();
    	return redirect()->back()->with('messgthem','Thêm thành công');

    	unset($loaihinhkhoangsan);
    }

    

     public function xoaloaihinhkhoangsan($id){

    	$loaihinhkhoangsan = loaiHinhKhoangSan::find($id);
    	$loaihinhkhoangsan->delete();
    	return redirect()->back()->with('messgxoa','Xóa thành công');
    	unset($loaihinhkhoangsan);
    }




 public function sualoaihinhkhoangsan($id){

       $nhomkhoangsans=nhomKhoangSan::get();
        $loaiHinhKhoangSanedit=loaiHinhKhoangSan::where('id',$id)->first();
        return view('capnhathethong.loaihinhkhoansan.suatenkhoangsan',['loaiHinhKhoangSanedit'=>$loaiHinhKhoangSanedit, 'nhomkhoangsans'=>$nhomkhoangsans]);
        unset($loaiHinhKhoangSanedit);

    }




public function sualoaihinhkhoangsanpost($id, Request $req){


   $loaiHinhKhoangSanedit=loaiHinhKhoangSan::find($id);
   $loaiHinhKhoangSanedit->tenLoaiHinhKS= $req ->tenLoaiHinhKS;
   $loaiHinhKhoangSanedit->kyhieu= $req ->kyhieu;
   $loaiHinhKhoangSanedit->id_nhomKhoangSan=$req ->idNhomKhoangSan;
    $loaiHinhKhoangSanedit->save();
  
    return redirect('khoang-san/loai-hinh-khoang-san')->with('messgsua','Sửa thành công');

    }

    // quan huyen 
    public function indexQuanHuyen(){
     $quanHuyens= quanHuyen::all();
    return view('capnhathethong.vitrihanhchinh.indexQuanHuyen',['quanHuyens'=>$quanHuyens]);
        unset($quanHuyens);

    }


    public function themQuanHuyen(Request $req){

        $quanHuyen = new quanHuyen;
        $quanHuyen->tenQuanHuyen= $req->tenQuanHuyen;

        $lichsuthemquanhuyen= new lichSuTruyCap;
        $lichsuthemquanhuyen->tenBang='Quận Huyện';
        $lichsuthemquanhuyen->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemquanhuyen->ip_client=\Request::ip();
        $lichsuthemquanhuyen->thaoTac ='Thêm mới';
        $lichsuthemquanhuyen->tenBanGhi=$req ->tenQuanHuyen;
        $quanHuyen->save();
        $lichsuthemquanhuyen->save();
        return redirect('khoang-san/quan-huyen')->with('messgthem','Thêm thành công');

        unset($quanHuyen);
        unset($lichsuthemquanhuyen);
    }




    //xa phuong


    public function indexXaPhuong(){
      $quanHuyens= quanHuyen::all();
      $xaPhuongs= xaPhuong::paginate(7);
      return view('capnhathethong.vitrihanhchinh.indexXaPhuong',['xaPhuongs'=>$xaPhuongs,'quanHuyens'=>$quanHuyens]);
      unset($xaPhuongs);
      unset($quanHuyens);
  }



public function tracuuxaphuong(Request $req){

      $quanHuyens= quanHuyen::all();
    //   if($req->quanHuyen==0){
    //     $xaPhuongSeachs = xaPhuong::orderBy('id','DESC')->paginate(7);
    // } else
    // {
        $xaPhuongSeachs = xaPhuong::where('id_quanHuyen', $req->quanHuyen)->paginate(7);
    // }
         //dd($xaPhuongSeachs);
    return view('capnhathethong.vitrihanhchinh.indexXaPhuong',['quanHuyens'=>$quanHuyens,'xaPhuongSeachs'=>$xaPhuongSeachs]);
   
    unset($quanHuyens);
    unset($xaPhuongSeachs);

}

    public function themXaPhuong(Request $req){

        $xaPhuong = new xaPhuong;

        $xaPhuong->tenXaPhuong= $req->tenXaPhuong;
        $xaPhuong->id_quanHuyen= $req->quanHuyen;

        // $xaPhuong->id_user=Auth::guard('quantri')->user()->id;

        $xaPhuong->save();
        return redirect('khoang-san/xa-phuong')->with('messgthem','Thêm thành công');

        unset($xaPhuong);
    }


// phòng ban

    public function indexphongBan(){
      $phongBans= phongBan::all();
      return view('capnhathethong.phongban.indexphongBan',['phongBans'=>$phongBans]);
      unset($phongBans);
     
  }



public function themPhongBan(Request $req){

    $phongBan = new phongBan;
    $phongBan->tenPhongBan= $req->tenPhongBan;
    $phongBan->ghiChu= $req->ghiChu;
    $lichsuthemphongban= new lichSuTruyCap;
    $lichsuthemphongban->tenBang='Phòng Ban';
    $lichsuthemphongban->id_user=Auth::guard('quantri')->user()->id;
    $lichsuthemphongban->ip_client=\Request::ip();
    $lichsuthemphongban->thaoTac ='Thêm mới';
    $lichsuthemphongban->tenBanGhi=$req ->tenPhongBan;
    $phongBan->save();
    $lichsuthemphongban->save();
    return redirect('khoang-san/cap-nhat-phong-ban')->with('messgthem','Thêm thành công');

    unset($phongBan);
    unset($lichsuthemphongban);
}


public function xoaphongban($id){

    $phongbandel = phongBan::find($id);


    $lichsuxoaphongban= new lichSuTruyCap;
    $lichsuxoaphongban->tenBang='Phòng Ban';
    $lichsuxoaphongban->id_user=Auth::guard('quantri')->user()->id;
    $lichsuxoaphongban->ip_client=\Request::ip();
    $lichsuxoaphongban->thaoTac ='Xóa';
    $lichsuxoaphongban->tenBanGhi =$phongbandel->tenPhongBan;

    $phongbandel->delete();
    $lichsuxoaphongban->save();

    return redirect('khoang-san/cap-nhat-phong-ban')->with('messgxoa','Xóa thành công');
    unset($phongbandel);
    unset($lichsuxoaphongban);
}




 public function suaphongban($id){

        $phongBanid=DB::table('phongBan')->where('id',$id)->first();
        return view('capnhathethong.phongban.suaphongban',['phongBanid'=>$phongBanid]);
        unset($phongBanid);

    }



 public function suaphongbanpost($id, Request $req){


$phongBanpost=phongBan::find($id);
   $phongBanpost->tenPhongBan= $req ->tenPhongBan;
        $phongBanpost->ghiChu= $req ->ghiChu;

        $phongBanpost->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep= new lichSuTruyCap;
        $lichsuthemdoanhnghiep->tenBang='tên doanh nghiệp';
        $lichsuthemdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep->ip_client=\Request::ip();
        $lichsuthemdoanhnghiep->thaoTac ='sửa';
        $lichsuthemdoanhnghiep->tenBanGhi=$req ->tenPhongBan;
        $phongBanpost->save();
        $lichsuthemdoanhnghiep->save();

        return redirect('khoang-san/cap-nhat-phong-ban')->with('messgsua','Sửa thành công');

    }

// Chưc vụ
public function indexchucVu(){
  $chucVus= chucVu::all();
  return view('capnhathethong.chucvu.indexchucVu',['chucVus'=>$chucVus]);
  unset($chucVus);

}


public function themChucVu(Request $req){

    $chucVuadd = new chucVu;
    $chucVuadd->tenChucVu= $req->tenChucVu;
    $chucVuadd->ghiChu= $req->ghiChu;

    $lichsuthemchucvu= new lichSuTruyCap;
    $lichsuthemchucvu->tenBang='Chức vụ';
    $lichsuthemchucvu->id_user=Auth::guard('quantri')->user()->id;
    $lichsuthemchucvu->ip_client=\Request::ip();
    $lichsuthemchucvu->thaoTac ='Thêm mới';
    $lichsuthemchucvu->tenBanGhi=$req ->tenChucVu;
    $chucVuadd->save();
    $lichsuthemchucvu->save();
    return redirect('khoang-san/cap-nhat-chuc-vu')->with('messgthem','Thêm thành công');

    unset($chucVuadd);
    unset($lichsuthemchucvu);
}



public function xoachucvu($id){

    $chucvudel = chucVu::find($id);


    $lichsuxoachucvu= new lichSuTruyCap;
    $lichsuxoachucvu->tenBang='Chức vụ';
    $lichsuxoachucvu->id_user=Auth::guard('quantri')->user()->id;
    $lichsuxoachucvu->ip_client=\Request::ip();
    $lichsuxoachucvu->thaoTac ='Xóa';
    $lichsuxoachucvu->tenBanGhi =$chucvudel->tenChucVu;

    $chucvudel->delete();
    $lichsuxoachucvu->save();

    return redirect('khoang-san/cap-nhat-chuc-vu')->with('messgxoa','Xóa thành công');
    unset($chucvudel);
    unset($lichsuxoachucvu);
}




 public function suachucvu($id){

        $chucvudeedit=DB::table('chucVu')->where('id',$id)->first();
        return view('capnhathethong.chucvu.suachucvu',['chucvudeedit'=>$chucvudeedit]);
        unset($chucvudeedit);

    }


public function suachucvuposst($id, Request $req){


$chucvudeedit=chucVu::find($id);
   $chucvudeedit->tenChucVu= $req ->tenChucVu;
        $chucvudeedit->ghiChu= $req ->ghiChu;

        $chucvudeedit->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep= new lichSuTruyCap;
        $lichsuthemdoanhnghiep->tenBang='Chức vụ';
        $lichsuthemdoanhnghiep->id_user=Auth::guard('quantri')->user()->id;
        $lichsuthemdoanhnghiep->ip_client=\Request::ip();
        $lichsuthemdoanhnghiep->thaoTac ='sửa';
        $lichsuthemdoanhnghiep->tenBanGhi=$req ->tenChucVu;
        $chucvudeedit->save();
        $lichsuthemdoanhnghiep->save();

        return redirect('khoang-san/cap-nhat-chuc-vu')->with('messgsua','Sửa thành công');

    }

}
