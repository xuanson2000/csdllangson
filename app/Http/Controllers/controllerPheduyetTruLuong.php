<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coQuanCapPhep;
use App\quanHuyen;
use App\duLieuMo;
use App\hoSoCapPhepthamdo;
use App\hoSoCapPhepPheDuyetTruLuong;
use App\doanhNghiep;
use App\fileDinhKemGiayPhep;
use App\fileDinhKemBanDo;
use App\hoSoCapPhepKhaiThac;
use App\chucVu;
use DB;

class controllerPheduyetTruLuong extends Controller
{
    //
	public function index()

	{

		$quanHuyens =quanHuyen::all();
		$hoSoPheDuyetTruLuongs=hoSoCapPhepPheDuyetTruLuong::orderBy('id','DESC')->get();

		return view('hosopheduyettruluong.index',['quanHuyens'=>$quanHuyens,'hoSoPheDuyetTruLuongs'=>$hoSoPheDuyetTruLuongs]);
		unset($quanHuyens);
		unset($hoSoPheDuyetTruLuongs);
	} 

	public function chitietpheduyettrucluong($id)
	{

    // dd($id);
		$hoSoPheDuyetTruLuongid=hoSoCapPhepPheDuyetTruLuong::find($id);


		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','3')->get();

		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','3')->get();

		return view('hosopheduyettruluong.chitietpheduyettrucluong',['hoSoPheDuyetTruLuongid'=>$hoSoPheDuyetTruLuongid,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);
		unset($hoSoPheDuyetTruLuongid);
		unse($filedinhkemgiaypheps);
		unse($filedinhkembandos);
	} 

	
	public function themhosopheduyettruluong()
	{

		$hoSoCapPhepthamdos = hoSoCapPhepthamdo::get();
		$chucVus=chucVu::all();
		return view('hosopheduyettruluong.themhosopheduyettruluong',['hoSoCapPhepthamdos'=>$hoSoCapPhepthamdos,'chucVus'=>$chucVus]);
		unset($hoSoCapPhepthamdos);
		unset($chucVus);
	} 


	
	   public function themhosopheduyettruluongpost(Request $req){
    
        $hoSoCapPhepPheDuyetTruLuong = new hoSoCapPhepPheDuyetTruLuong;
        $hoSoCapPhepPheDuyetTruLuong ->id_giayPhepThamDo =$req ->id_giayPhepThamDo;
        $lanthamdo=hoSoCapPhepthamdo::where('id',$req ->id_giayPhepThamDo)->first();
        $hoSoCapPhepPheDuyetTruLuong->lanpheduyet=$lanthamdo->lanthamdo;
        $hoSoCapPhepPheDuyetTruLuong ->soGiayPhepPheDuyet =$req ->soGiayPhepPheDuyet;
        $hoSoCapPhepPheDuyetTruLuong ->ngayGiayPhep =$req ->ngayGiayPhep;
        $hoSoCapPhepPheDuyetTruLuong ->tenGiayPhep =$req ->tenGiayPhep;
        $hoSoCapPhepPheDuyetTruLuong ->nguoiKy =$req ->nguoiKy;
        $hoSoCapPhepPheDuyetTruLuong ->id_chucVu =$req ->id_chucVu;
        $hoSoCapPhepPheDuyetTruLuong ->tongTruLuong =$req ->tongTruLuong;
        $hoSoCapPhepPheDuyetTruLuong ->donVi =$req ->donVi;
      
        $hoSoCapPhepPheDuyetTruLuong ->save();

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
                'id_HoSo' => $hoSoCapPhepPheDuyetTruLuong->id,
                'id_loaiHoSo'=>'3',
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
              'id_HoSo' => $hoSoCapPhepPheDuyetTruLuong->id,
              'id_loaiHoSo'=>'3',
              'tenFile'=> $tenAnhMoiBanDo
            ]); 
          }
        }

        $hoSoCapPhepthamdoid=hoSoCapPhepthamdo::find($req->id_giayPhepThamDo);
         $hoSoCapPhepthamdoid->congTac=1;
         $hoSoCapPhepthamdoid->save();


        // $duLieuMo->id_user=Auth::guard('quantri')->user()->id;
          return redirect('khoang-san/ho-so-phe-duyet-tru-luong-khoang-san')->with('messgthem','Thêm thành công');
   
          unset($hoSoCapPhepPheDuyetTruLuong);
          unset($fileDinhKemGiayPheps);
          unset($fileDinhKemBanDos);
          unset($hoSoCapPhepthamdoid);
    }

    

    public function xoahosopheduyet($id){

      $hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::where('id_hoSoCapPhepPheDuyetTruLuong',$id)->first();
      if($hoSoCapPhepKhaiThacid !=null){
        $hoSoCapPhepKhaiThacid->delete();
        $fileDinhKemGiayPhepiktds=fileDinhKemGiayPhep::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();

        foreach ( $fileDinhKemGiayPhepiktds as $fileDinhKemGiayPhepiktd) {
          $fileDinhKemGiayPhepiktd->delete();
        }

        $fileDinhKemBanDoktids=fileDinhKemBanDo::where('id_HoSo',$hoSoCapPhepKhaiThacid->id)->where('id_loaiHoSo',4)->get();
        foreach ( $fileDinhKemBanDoktids as $fileDinhKemBanDoktid) {
          $fileDinhKemBanDoktid->delete();
        }

      }
      
                                 
      $hoSoCapPhepPheDuyetTruLuongid = hoSoCapPhepPheDuyetTruLuong::find($id);
      $hoSoCapPhepPheDuyetTruLuongid->delete();
      $fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',3)->get();

      foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
       $fileDinhKemGiayPhepid->delete();
     }

     $fileDinhKemBanDoids=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',3)->get();
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

     return redirect('khoang-san/ho-so-phe-duyet-tru-luong-khoang-san')->with('messgxoa','Xóa thành công');
     unset($hoSoCapPhepPheDuyetTruLuongid);
     unset($fileDinhKemGiayPhepids);
     unset($fileDinhKemBanDoids);
     unset($hoSoCapPhepKhaiThacid);
     unset($fileDinhKemGiayPhepktids);
     unset($fileDinhKemBanDoktids);
   }

   
   public function suatruluong($id){
    $chucVus=chucVu::all();
    $hoSoCapPhepPheDuyetTruLuongBD =  hoSoCapPhepPheDuyetTruLuong::find($id);
    $filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','3')->get();

    $filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','3')->get();

    return view('hosopheduyettruluong.suatruluong',['hoSoCapPhepPheDuyetTruLuongBD'=>$hoSoCapPhepPheDuyetTruLuongBD,'chucVus'=>$chucVus,"filedinhkemgiaypheps"=>$filedinhkemgiaypheps,"filedinhkembandos"=>$filedinhkembandos]);
    unset($hoSoCapPhepPheDuyetTruLuongBD);
    unset($chucVus);
     unset($filedinhkemgiaypheps);
      unset($filedinhkembandos);
  }



public function suatruluongpost($id,Request $req){

  $hoSoCapPhepPheDuyetTruLuongedit=hoSoCapPhepPheDuyetTruLuong::find($id);
  
        $hoSoCapPhepPheDuyetTruLuongedit ->soGiayPhepPheDuyet =$req ->soGiayPhepPheDuyet;
        $hoSoCapPhepPheDuyetTruLuongedit ->ngayGiayPhep =$req ->ngayGiayPhep;
        $hoSoCapPhepPheDuyetTruLuongedit ->tenGiayPhep =$req ->tenGiayPhep;
        $hoSoCapPhepPheDuyetTruLuongedit ->nguoiKy =$req ->nguoiKy;
        $hoSoCapPhepPheDuyetTruLuongedit ->id_chucVu =$req ->id_chucVu;
        $hoSoCapPhepPheDuyetTruLuongedit ->tongTruLuong =$req ->tongTruLuong;
        $hoSoCapPhepPheDuyetTruLuongedit ->donVi =$req ->donVi;
        $hoSoCapPhepPheDuyetTruLuongedit ->save();

        if($req->hasFile('fileGiayPhep')){

          $filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',3)->get();

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
              'id_loaiHoSo'=>'3',
              'tenFile'=> $tenAnhmoi
            ]); 
          }

        }


if($req->hasFile('fileBanDo')){

          $filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',3)->get();

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
              'id_loaiHoSo'=>'3',
              'tenFile'=> $tenAnhmoi
            ]); 
          }

        }

return redirect('khoang-san/ho-so-phe-duyet-tru-luong-khoang-san')->with('messgsua','Sửa thành công');

}



}
