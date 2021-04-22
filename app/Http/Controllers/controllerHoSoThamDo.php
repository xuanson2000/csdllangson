<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coQuanCapPhep;
use App\quanHuyen;
use App\duLieuMo;
use App\hoSoCapPhepthamdo;
use App\doanhNghiep;
use App\fileDinhKemGiayPhep;
use App\fileDinhKemBanDo;
use App\hoSoCapPhepPheDuyetTruLuong;
use App\hoSoCapPhepKhaiThac;
use App\chucVu;
use DB;

class controllerHoSoThamDo extends Controller
{
    //
    public function index()

    {
    	$quanHuyens =quanHuyen::all();
    	$hoSoCapPhepthamdos=hoSoCapPhepthamdo::orderBy('id','DESC')->get();

    	return view('hosothamdo.index',['quanHuyens'=>$quanHuyens,'hoSoCapPhepthamdos'=>$hoSoCapPhepthamdos]);
    	unset($quanHuyens);
    	unset($hoSoCapPhepthamdos);
    } 




    public function chitietthamdo($id)
    {
    	$hoSoCapPhepthamdoid=hoSoCapPhepthamdo::find($id);
    	$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','2')->get();
    	$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','2')->get();
    	return view('hosothamdo.chitietthamdo',['hoSoCapPhepthamdoid'=>$hoSoCapPhepthamdoid,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);
    	unset($hoSoCapPhepthamdoid);
    	unse($filedinhkemgiaypheps);
       unse($filedinhkembandos);
    } 


    public function themhosothamdo()

    {
    	
    	$duLieuMos =duLieuMo::where('hienTrang',1)->get();

    	$chucVus=chucVu::all();
    	return view('hosothamdo.themhosothamdo',['duLieuMos'=>$duLieuMos,'chucVus'=>$chucVus]);
    	unset($duLieuMos);
    	unset($chucVus);
    } 


    public function themhosothamdopost(Request $req){

        $doanhNghiep = new doanhNghiep; 
        $doanhNghiep->tenDoanhNghiep = $req->tenDoanhNghiep;
        $doanhNghiep->soDienThoai = $req->soDienThoai;
        $doanhNghiep->diaChi = $req->diaChi;
        $doanhNghiep ->save();

        $hoSoCapPhepthamdo = new hoSoCapPhepthamdo;
        $hoSoCapPhepthamdo ->id_mo =$req ->id_mo;
         $hoSoCapPhepthamdo ->lanthamdo =$req ->lanthamdo;
        $hoSoCapPhepthamdo ->soGiayPhepThamDo =$req ->soGiayPhepThamDo;
        $hoSoCapPhepthamdo ->ngayGiayPhep =$req ->ngayGiayPhep;
        $hoSoCapPhepthamdo ->tenGiayPhep =$req ->tenGiayPhep;
        $hoSoCapPhepthamdo ->nguoiKy =$req ->nguoiKy;
        $hoSoCapPhepthamdo ->id_chucVu =$req ->id_chucVu;
        $hoSoCapPhepthamdo ->dienTichThamDo =$req ->dienTichThamDo;
        $hoSoCapPhepthamdo ->thoiGianThamDo =$req ->thoiGianThamDo;
        
        $hoSoCapPhepthamdo ->phuongPhapThamDo =$req ->phuongPhapThamDo;
      
        $hoSoCapPhepthamdo ->nguonKinhPhi =$req ->nguonKinhPhi;
        $hoSoCapPhepthamdo ->id_doanhNghiep =$doanhNghiep ->id;
        $hoSoCapPhepthamdo ->save();

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
                'id_HoSo' => $hoSoCapPhepthamdo->id,
                'id_loaiHoSo'=>'2',
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
                    'id_HoSo' => $hoSoCapPhepthamdo->id,
                    'id_loaiHoSo'=>'2',
                    'tenFile'=> $tenAnhMoiBanDo
                ]); 
            }

        }

        $taodoxs = $req->toadox;
        $taodoys = $req->toadoy; 
        if($taodoxs!=null && $taodoys!=null ){

         foreach (array_combine($taodoxs, $taodoys) as $taodox => $taodoy) {

            \DB::table('toaDo')->insert([
                
                'id_hoso'=> $hoSoCapPhepthamdo->id,
                'toadox' => $taodox,
                'toadoy' => $taodoy,
                'id_loaihoso' => '2'
            ]); 

        }
    }


          
          $duLieuMoid=duLieuMo::find($req ->id_mo);
           $duLieuMoid->congTac=1;
           $duLieuMoid->save();

        // $duLieuMo->id_user=Auth::guard('quantri')->user()->id;
          return redirect('khoang-san/ho-so-tham-do-khoang-san')->with('messgthem','Thêm thành công');
      
          unset($doanhNghiep);
          unset($hoSoCapPhepthamdo);
          unset($fileDinhKemGiayPheps);
          unset($fileDinhKemBanDos);
    }




    public function xoahosothamdo($id){

     $hosopheduyettlid=hoSoCapPhepPheDuyetTruLuong::where('id_giayPhepThamDo',$id)->first();
     if($hosopheduyettlid!=null){
         $hosocapphepkhaithacid=hoSoCapPhepKhaiThac::where('id_hoSoCapPhepPheDuyetTruLuong', $hosopheduyettlid->id)->first();
         $hosocapphepkhaithacid->delete();
         $fileDinhKemGiayPhepktids=fileDinhKemGiayPhep::where('id_HoSo',$hosocapphepkhaithacid->id)->where('id_loaiHoSo',4)->get();

         foreach ( $fileDinhKemGiayPhepktids as $fileDinhKemGiayPhepktid) {
            $fileDinhKemGiayPhepktid->delete();
        }

        $fileDinhKemBanDoiktds=fileDinhKemBanDo::where('id_HoSo',$hosocapphepkhaithacid->id)->where('id_loaiHoSo',4)->get();
        foreach ( $fileDinhKemBanDoiktds as $fileDinhKemBanDoiktd) {
            $fileDinhKemBanDoiktd->delete();
        }

        $hosopheduyettlid->delete();
        $fileDinhKemGiayPheptlids=fileDinhKemGiayPhep::where('id_HoSo',$hosopheduyettlid->id)->where('id_loaiHoSo',4)->get();

        foreach ( $fileDinhKemGiayPheptlids as $fileDinhKemGiayPheptlid) {
            $fileDinhKemGiayPheptlid->delete();
        }

        $fileDinhKemBanDoitlds=fileDinhKemBanDo::where('id_HoSo',$hosopheduyettlid->id)->where('id_loaiHoSo',4)->get();
        foreach ( $fileDinhKemBanDoitlds as $fileDinhKemBanDoitld) {
            $fileDinhKemBanDoitld->delete();
        }


       }
       
   
        $hoSoCapPhepthamdoid = hoSoCapPhepthamdo::find($id);
        $hoSoCapPhepthamdoid->delete();

        $doanhNghiepid = doanhNghiep::find($hoSoCapPhepthamdoid->id_doanhNghiep); 
        $doanhNghiepid->delete();

        $fileDinhKemGiayPhepids=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',2)->get();

        foreach ( $fileDinhKemGiayPhepids as $fileDinhKemGiayPhepid) {
           $fileDinhKemGiayPhepid->delete();
       }

       $fileDinhKemBanDoids=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',2)->get();
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

        return redirect('khoang-san/ho-so-tham-do-khoang-san')->with('messgxoa','Xóa thành công');
        unset($hoSoCapPhepthamdoid);
        unset($doanhNghiepid);
        unset($fileDinhKemGiayPhepids);
        unset($fileDinhKemBanDoids);
    }


   public function suathamdo($id){

    $hoSoCapPhepthamdoBD =  hoSoCapPhepthamdo::find($id);
    $duLieuMos =duLieuMo::where('hienTrang',1)->get();
    $toaDoEdits=DB::table('toaDo')->where('id_loaihoso',2)->where('id_hoso',$id)->get();
    $chucVus=chucVu::all();

    return view('hosothamdo.suathamdo',['hoSoCapPhepthamdoBD'=>$hoSoCapPhepthamdoBD,'duLieuMos'=>$duLieuMos, 'chucVus'=>$chucVus,'toaDoEdits'=>$toaDoEdits]);
    unset($hoSoCapPhepthamdoBD);
}


public function suathamdopost($id,Request $req){

$hoSoCapPhepthamdoEdit=hoSoCapPhepthamdo::find($id);
$doanhNghiepEdit = doanhNghiep::find($hoSoCapPhepthamdoEdit->doanhNghiep->id);

        $doanhNghiepEdit->tenDoanhNghiep = $req->tenDoanhNghiep;
        $doanhNghiepEdit->soDienThoai = $req->soDienThoai;
        $doanhNghiepEdit->diaChi = $req->diaChi;
        $doanhNghiepEdit ->save();
    
        $hoSoCapPhepthamdoEdit ->soGiayPhepThamDo =$req ->soGiayPhepThamDo;

        
        $hoSoCapPhepthamdoEdit ->ngayGiayPhep =$req ->ngayGiayPhep;
        $hoSoCapPhepthamdoEdit ->tenGiayPhep =$req ->tenGiayPhep;
        $hoSoCapPhepthamdoEdit ->nguoiKy =$req ->nguoiKy;
        $hoSoCapPhepthamdoEdit ->id_chucVu =$req ->id_chucVu;
        $hoSoCapPhepthamdoEdit ->dienTichThamDo =$req ->dienTichThamDo;
        $hoSoCapPhepthamdoEdit ->thoiGianThamDo =$req ->thoiGianThamDo;
        
        $hoSoCapPhepthamdoEdit ->phuongPhapThamDo =$req ->phuongPhapThamDo;
      
        $hoSoCapPhepthamdoEdit ->nguonKinhPhi =$req ->nguonKinhPhi;
        $hoSoCapPhepthamdoEdit ->save();

        $toaDoEdits=DB::table('toaDo')->where('id_loaihoso',2)->where('id_hoso',$id)->get();

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

            $filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo',2)->get();

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
              'id_loaiHoSo'=>'2',
              'tenFile'=> $tenAnhmoi
          ]); 
      }

  }


  if($req->hasFile('fileBanDo')){

      $filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo',2)->get();

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
          'id_loaiHoSo'=>'2',
          'tenFile'=> $tenAnhmoi
      ]); 
  }

}



return redirect('khoang-san/ho-so-tham-do-khoang-san')->with('messgsua','sua thành công');


}

}
