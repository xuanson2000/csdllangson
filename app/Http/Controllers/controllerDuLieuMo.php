<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\duLieuMo;
use App\toaDo;
use App\xaPhuong;
use App\quanHuyen;
use App\truLuongKhaiThac;
use App\nhomKhoangSan;
use App\loaiHinhKhoangSan;
use App\coQuanCapPhep;
use App\nopNganSachKhoangSan;
use App\chucVu;
use App\hoSoCapPhepthamdo;
use App\hoDongThueDat;
use App\tienkyquymoitruong;
use App\tiencapquyenkhaithac;
use Auth;
use DB;
class controllerDuLieuMo extends Controller
{
   
	public function index(){

		$dulieumos= duLieuMo::where('hienTrang','1')->orderBy('id','ASC')->paginate(10);
// DESC
		
		$quanHuyens=quanHuyen::get();
		$nhomKhoangSans=nhomKhoangSan::get();
		$coQuanCapPheps=coQuanCapPhep::get();

		return view('dulieukhoangsan.dulieumo.index',['dulieumos'=>$dulieumos,'quanHuyens'=>$quanHuyens,'nhomKhoangSans'=>$nhomKhoangSans,'coQuanCapPheps'=>$coQuanCapPheps]);
		unset($dulieumos);
		unset($quanHuyens);
		unset($nhomKhoangSans);
		unset($coQuanCapPheps);

	}




	public function chitietdulieumo($id){

		$chitietdulieumos= duLieuMo::find($id);
    $nopNganSachKhoangSans =nopNganSachKhoangSan::where('id_mo',$id)->get();


$hoDongThueDat=hoDongThueDat::where('idmo',$id)->get();
$tienkyquymoitruong=tienkyquymoitruong::where('id_mo',$id)->get();
$tiencapquyenkhaithac=tiencapquyenkhaithac::where('id_mo',$id)->get();

    return view('dulieukhoangsan.dulieumo.chitietdulieumo',['chitietdulieumos'=>$chitietdulieumos,'nopNganSachKhoangSans'=>$nopNganSachKhoangSans,'hoDongThueDat'=>$hoDongThueDat, 'tienkyquymoitruong'=>$tienkyquymoitruong,'tiencapquyenkhaithac'=>$tiencapquyenkhaithac]);
    unset($chitietdulieumos);
    unset($nopNganSachKhoangSans);

	}



	public function themtruluong(Request $req,$id){

		$truluongkhaithac = new truLuongKhaiThac;

		$truluongkhaithac->namKhaiThac= $req ->namKhaiThac;
		$truluongkhaithac->truLuongKhaiThac= $req ->truLuongKhaiThac;
        $truluongkhaithac->id_mo=$id;
		$truluongkhaithac->save();

		return redirect()->back()->with('messgthemtruluong','Thêm thành công trữ lượng');

		unset($truluongkhaithac);
	}


	

	public function themdulieumo(Request $req){
    

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
        $duLieuMo->id_user=Auth::guard('quantri')->user()->id;
    	
    	$duLieuMo->save();


    	$taodoxs = $req->toaDoX;
        $taodoys = $req->toaDoY; 
        if($taodoxs!=null && $taodoys!=null ){



       
      //  foreach($taodoxs as $key => $value) {

      //  	\DB::table('toaDo')->insert([
   			// 	'id_loaiHoSo'=>'1',
   			// 	'id_HoSo'=> $duLieuMo->id,
   			// 	'toaDoX' => $taodoxs[$key],
   			// 	'toaDoY' => $taodoys[$key]
   			// ]); 

      // }
        

       foreach (array_combine($taodoxs, $taodoys) as $taodox => $taodoy) {
       	
       	\DB::table('toaDo')->insert([
   				'id_loaiHoSo'=>'1',
   				'id_HoSo'=> $duLieuMo->id,
   				'toaDoX' => $taodox,
   				'toaDoY' => $taodoy
   			]); 

       }
         }

   		// foreach ($taodoxs as $taodox && $taodoys as $taodoy) {
   		// 	\DB::table('toaDo')->insert([
   		// 		'id_loaiHoSo'=>'1',
   		// 		'id_HoSo'=> $duLieuMo->id,
   		// 		'toaDoX' => $taodox
   		// 	]); 


     //       	\DB::table('toaDo')->insert([
   		// 		'id_loaiHoSo'=>'1',
   		// 		'id_HoSo'=> $duLieuMo->id,
   		// 		'toaDoY' => $taodoy
   		// 	]);
          
   		// } 

   		

    	return redirect('khoang-san/du-lieu-mo-khoang-san')->with('messgthem','Thêm thành công');

    	unset($duLieuMo);
    }





public function getxoadulieumo($id){

	$duLieuMo = duLieuMo::find($id);
  $chucVus=chucVu::all();

	return view('dulieukhoangsan.dulieumo.getxoadulieumo',['duLieuMo'=>$duLieuMo,'chucVus'=>$chucVus]);
	unset($duLieuMo);
	unset($chucVus);

}





    public function xoadulieumo($id, Request $req){

    	//dd('dgd');

    	if($req->phuongThuc == 1)
    	{ 

        $count=hoSoCapPhepthamdo::where('id_mo',$id)->count();
        if($count==0){
         $duLieuMo = duLieuMo::find($id);
         $duLieuMo->delete();
       }else{

         echo "<script type='text/javascript'> 
         alert('Sorry ! không thể xoá được');
         window.location ='";

         echo route('dlmo');
         echo"'

         </script>";
     }


       


    	}else if($req->phuongThuc == 0)

    	{   
    		$duLieuMo = duLieuMo::find($id);
        $duLieuMo->id_chucVu = $req->id_chucVu;
        $duLieuMo->nguoiKy = $req->nguoiKy;
        $duLieuMo->ngayThuHoi = $req->ngayThuHoi;
        $duLieuMo->soQuyetDinhDongMo = $req->soQuyetDinhDongMo;
    		$duLieuMo->lyDo = $req->lyDo;
        if($req ->hasFile('fileGiayPhep')){

       $file =$req->file('fileGiayPhep');
       $name =$file ->getclientoriginalname();
       $Hinh =str_random(4)."_".$name;

       while(file_exists("public/tailieu/".$Hinh))
       {

           $Hinh =str_random(4)."_".$name;
       }
        $file->move("public/tailieu/",$Hinh);
       
         $duLieuMo->file=$Hinh;
       
       }

    		$duLieuMo->hienTrang='0';
    		$duLieuMo->save();


    	}
    	
    	return redirect('khoang-san/du-lieu-mo-khoang-san')->with('messgxoa','Chuyển đổi hiện trạng mỏ thành công');
    	unset($duLieuMo);

    }

    


    public function timkiemmo(Request $request){


      if($request->txtseach ==null && $request->tenQuanHuyenseach==null){
        $viewseach=duLieuMo::where('hienTrang','1')->get();

      }else if($request->txtseach ==null && $request->tenQuanHuyenseach!=null){ 
        $lvb=$request->tenQuanHuyenseach;
        
       
        $viewseach=duLieuMo::join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$lvb)->where('hienTrang','1')->select('duLieuMo.*')->get();


      }else if($request->txtseach !=null && $request->tenXaPhuongseach==null){ 
        $nameseach=$request->txtseach;
        $viewseach=duLieuMo::where('tenMo','ILIKE','%'.$nameseach.'%')->where('hienTrang','1')->take(30)->paginate(30);
      }else if($request->txtseach !=null && $request->tenXaPhuongseach!=null){ 
        $nameseach=$request->txtseach;
        $lvb =$request->tenXaPhuongseach;
      
        $viewseach=duLieuMo::join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$lvb)->where('tenMo','ILIKE','%'.$nameseach.'%')->where('hienTrang','1')->select('duLieuMo.*')->get();
       
      }

      $quanHuyens=quanHuyen::get(); 
      $coQuanCapPheps=coQuanCapPhep::get();
        $nhomKhoangSans=nhomKhoangSan::get();
      
      return view('dulieukhoangsan.dulieumo.index',['viewseach'=>$viewseach,'quanHuyens'=>$quanHuyens,'coQuanCapPheps'=>$coQuanCapPheps,'nhomKhoangSans'=>$nhomKhoangSans]);
      unset($quanHuyens);
      unset($coQuanCapPheps);
      unset($nhomKhoangSans);
    }


  public function suadulieumo($id){
   

    $dulieumoEdit= duLieuMo::find($id);
    $toaDoEdits=DB::table('toaDo')->where('id_loaiHoSo',1)->where('id_HoSo',$id)->get();

    
    $quanHuyens=quanHuyen::get();
    $nhomKhoangSans=nhomKhoangSan::get();
    $coQuanCapPheps=coQuanCapPhep::get();

    return view('dulieukhoangsan.dulieumo.suadulieumo',['dulieumoEdit'=>$dulieumoEdit,'quanHuyens'=>$quanHuyens,'nhomKhoangSans'=>$nhomKhoangSans,'coQuanCapPheps'=>$coQuanCapPheps,'toaDoEdits'=>$toaDoEdits]);
    unset($dulieumoEdit);
    unset($quanHuyens);
    unset($nhomKhoangSans);
    unset($coQuanCapPheps);

  }

  

  public function suadulieupost(Request $req,$id){

      $duLieuMoEdit =duLieuMo::find($id);
      $duLieuMoEdit->tenMo= $req->tenMo;

      $duLieuMoEdit->loaiKhoangSan= $req ->loaiKhoangSan;
      $duLieuMoEdit->viTriXa= $req->viTriXa;
      $duLieuMoEdit->truLuong= $req ->truLuong;
      $duLieuMoEdit->kyHieuMo= $req ->kyHieuMo;
      $duLieuMoEdit->nguonGoc= $req ->nguonGoc;
      $duLieuMoEdit->quyMo = $req ->quyMo;
      $duLieuMoEdit->dieuKienKhaiThac= $req ->dieuKienKhaiThac;
      $duLieuMoEdit->dinhHuong= $req ->dinhHuong;
      $duLieuMoEdit->dacDiemDiaChat= $req ->dacDiemDiaChat;
      $duLieuMoEdit->congTacTienHanh= $req ->congTacTienHanh;
      $duLieuMoEdit->dacdiemKhoang= $req ->dacdiemKhoang;
      $duLieuMoEdit->coQuanPheDuyet= $req ->coQuanPheDuyet;
      $duLieuMoEdit->donVi= $req ->donVi;
      $duLieuMoEdit->hienTrang=1;
      $duLieuMoEdit->id_user=Auth::guard('quantri')->user()->id;
     $duLieuMoEdit->save();


      $toaDoEdits=DB::table('toaDo')->where('id_loaiHoSo',1)->where('id_HoSo',$id)->get();

// dd($toaDoEdits);
      foreach($toaDoEdits as $toaDoEdit){
        $idX=$toaDoEdit->id;
        $idX=$idX."X";
        $idY=$toaDoEdit->id;
        $idY=$idY."Y";


        \DB::table('toaDo')->where('id',$toaDoEdit->id)->update([
          'toaDoX' =>$req->$idX,
          'toaDoY' =>$req->$idY
        ]); 
      }

    // $taodoxs = $req->toaDoX;
    //   $taodoys = $req->toaDoY; 
    //  foreach (array_combine($taodoxs, $taodoys) as $taodox => $taodoy) {

      //   \DB::table('toaDo')->insert([
      //     'id_loaiHoSo'=>'1',
      //     'id_HoSo'=> $duLieuMo->id,
      //     'toaDoX' => $taodox,
      //     'toaDoY' => $taodoy
      //   ]); 
      //  }

      return redirect('khoang-san/du-lieu-mo-khoang-san')->with('messgsua','Sửa dữ liệu thành công');

      unset($duLieuMo);
    }






}
