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
use App\doanhNghiepChuyenNhuong;
use App\hosothuhoitralaimo;
use App\loaiKhoangSan;
use Auth;
use DB;
use Carbon\Carbon;
use Excel;
use PDF;

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
 $counths=0;

		$loaihoso=$req->loaihoso;


		if($req->loaihoso==1){
			$txtthongkehosos=hoSoCapPhepthamdo::whereYear('ngayGiayPhep',$req->nam)->get();

		} else if($req->loaihoso==2){
			$txtthongkehosos=hoSoCapPhepPheDuyetTruLuong::whereYear('ngayGiayPhep',$req->nam)->get();
		}else if($req->loaihoso==3){
			$txtthongkehosos=hoSoCapPhepKhaiThac::whereYear('ngaygiayphep',$req->nam)->get();
		}
			$counths=count($txtthongkehosos);
		$namtimkiem=$req->nam;
		
//dd($txtthongkehosos);
		return view('baocaothongke.baocaohoso',['txtthongkehosos'=>$txtthongkehosos,'loaihoso'=>$loaihoso,'namtimkiem'=>$namtimkiem,'counths'=>$counths]);

	}

	

public function xuatthongkehoso($loaihoso,$nam){
		$txtthongkehosos=null;

		if($loaihoso==1){
			$txtthongkehosos=hoSoCapPhepthamdo::whereYear('ngayGiayPhep',$nam)->get();
		} else if($loaihoso==2){
			$txtthongkehosos=hoSoCapPhepPheDuyetTruLuong::whereYear('ngayGiayPhep',$nam)->get();
		}else if($loaihoso==3){
			$txtthongkehosos=hoSoCapPhepKhaiThac::whereYear('ngaygiayphep',$nam)->get();
		}

if($loaihoso==1)
{
   $customer_array[] = array('STT','Số GPTD','Tên Mỏ', 'Tên doanh nghiệp thăm dò', 'VT Hành chính mỏ', 'Diện tích thăm dò','Thời gian thăm dò');

	$stt=1;
	foreach($txtthongkehosos as $customer)
	{
		$customer_array[] = array(
			'STT'=>$stt++,
			'Số GPTD' => $customer->soGiayPhepThamDo,
			'Tên Mỏ' => $customer->duLieuMo->tenMo, 
			'Tên doanh nghiệp thăm dò' => $customer->doanhNghiep->tenDoanhNghiep,
			'VT Hành chính mỏ' => $customer->duLieuMo->xaPhuong->tenXaPhuong." - ".$customer->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen." - "."Tỉnh Lạng Sơn",
			'Diện tích thăm dò' => $customer->dienTichThamDo." "."ha",
			'Thời gian thăm dò' => $customer->thoiGianThamDo." "."tháng",
		);
	}
	}else if($loaihoso==2)
	{

		$customer_array[] = array('STT','Số GPPD','Tên Mỏ', 'Tên doanh nghiệp', 'VT Hành chính mỏ', 'Tổng trữ lượng');

		$stt=1;
		foreach($txtthongkehosos as $customer)
		{
			$customer_array[] = array(
				'STT'=>$stt++,
				'Số GPTD' => $customer->soGiayPhepPheDuyet,
				'Tên Mỏ' => $customer->hoSoCapPhepthamdo->duLieuMo->tenMo, 
				'Tên doanh nghiệp' => $customer->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep,
				'VT Hành chính mỏ' => $customer->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong." - ".$customer->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen." - "."Tỉnh Lạng Sơn",
				'Tổng trữ lượng' => $customer->tongTruLuong." ".$customer->donVi,
			);
		}

	}else if($loaihoso==3){

		$customer_array[] = array('STT','Số GPTD','Tên Mỏ', 'Tên doanh nghiệp', 'VT Hành chính mỏ', 'Thời gian khai thác');

		$stt=1;
		foreach($txtthongkehosos as $customer)
		{
			$customer_array[] = array(

				'STT'=>$stt++,
				'Số GPCPKT' => "ero",
				'Tên Mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo, 
				'Tên doanh nghiệp' => "eror",
				'VT Hành chính mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong." - ".$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen." - "."Tỉnh Lạng Sơn",
				'Thời gian khai thác' => $customer->thoigiancapphepkhaithac." "."năm",
				
			);
		}

	}


		Excel::create('datadownload', function($excel) use ($customer_array){
			$excel->setTitle('datadownload');
			$excel->sheet('datadownload', function($sheet) use ($customer_array){
				$sheet->fromArray($customer_array, null, 'A1', false, false);
			});
		})->download('xlsx');


// ----------

	}


	public function xuatthongkehosopdf($loaihoso,$nam){
		$txtthongkehosos=null;


		if($loaihoso==1){
			$txtthongkehosos=hoSoCapPhepthamdo::whereYear('ngayGiayPhep',$nam)->get();
		} else if($loaihoso==2){
			$txtthongkehosos=hoSoCapPhepPheDuyetTruLuong::whereYear('ngayGiayPhep',$nam)->get();
		}else if($loaihoso==3){
			$txtthongkehosos=hoSoCapPhepKhaiThac::whereYear('ngaygiayphep',$nam)->get();
		}

		// $pdfTCC = new \mPDF('utf-8', 'A4-L');


		$pdfTCC = PDF::loadView('baocaothongke.baocaohosopdf',['txtthongkehosos'=>$txtthongkehosos,'loaihoso'=>$loaihoso,'nam'=>$nam]);

		return $pdfTCC->stream('tuts_notes.pdf');

// ----------

	}


	public function baocaonamkhaithac(){

		return view('baocaothongke.baocaonamkhaithac');

	}

	public function kqbaocaonamkhaithac(Request $req){
		$namnow= Carbon::now()->year;
		$sonam=$req->nam;


		$products= hoSoCapPhepKhaiThac::whereRaw(" thoigiancapphepkhaithac-($namnow - date_part('year',ngaygiayphep))<$sonam")->get();


		// dd($products);

	
		return view('baocaothongke.baocaonamkhaithac',['products'=>$products,'sonam'=>$sonam,'namnow'=>$namnow]);

	}

/// xuất file báo cáo năm còn lại excel

public function kqbaocaonamkhaithacexcel($sonamconlai){
		$namnow= Carbon::now()->year;
		$sonam=$sonamconlai;

	$txtthongkehosos=hoSoCapPhepKhaiThac::whereRaw(" thoigiancapphepkhaithac-($namnow - date_part('year',ngaygiayphep))<$sonam")->get();

   $customer_array[] = array('STT','Số GPKH','Tên Mỏ', 'Tên doanh nghiệp', 'VT Hành chính mỏ','Thời gian khai thác');

	$stt=1;
	foreach($txtthongkehosos as $customer)
	{
 

		$customer_array[] = array(
			'STT'=>$stt++,
			'Số GPKH' => $customer->soGiayPhepThamDo,
			'Tên Mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo, 
			'Tên doanh nghiệp' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep,
			'VT Hành chính mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong." - ". $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen." - "."Tỉnh Lạng Sơn",
			'Thời gian cấp phép khai thác' => $customer->thoigiancapphepkhaithac." "."năm",
		);
	
	}


		Excel::create('datadownload', function($excel) use ($customer_array){
			$excel->setTitle('datadownload');
			$excel->sheet('datadownload', function($sheet) use ($customer_array){
				$sheet->fromArray($customer_array, null, 'A1', false, false);
			});
		})->download('xlsx');

	}

	// báo cáo
	
	public function kqbaocaonamkhaithacpdf($sonamconlai){
		
		$namnow= Carbon::now()->year;
		$sonam=$sonamconlai;

		$txtthongkehosos=hoSoCapPhepKhaiThac::whereRaw(" thoigiancapphepkhaithac-($namnow - date_part('year',ngaygiayphep))<$sonam")->get();

		$pdfTCC = PDF::loadView('baocaothongke.kqbaocaonamkhaithacpdf',['txtthongkehosos'=>$txtthongkehosos,'sonam'=>$sonam]);

		return $pdfTCC->stream('tuts_notes.pdf');

	}

	public function baocaohosodangkhaothac(){

	 $reportHoSoDangKhaithac=hoSoCapPhepKhaiThac::where('thuhoitralai','=',null)->orderBy('id','DESC')->paginate(10);

		return view('baocaothongke.baocaohosodangkhaothac',['reportHoSoDangKhaithac'=>$reportHoSoDangKhaithac]);

	}
	
	public function baocaohosodangkhaothacexcel(){

     $reportHoSoDangKhaithacex=hoSoCapPhepKhaiThac::where('thuhoitralai','=',null)->orderBy('id','DESC')->get();
	$customer_array[] = array('STT','Số GPTD','Tên Mỏ', 'Tên doanh nghiệp', 'VT Hành chính mỏ','Năm bắt đầu khai thác', 'Thời gian khai thác');

		$stt=1;
		foreach($reportHoSoDangKhaithacex as $customer)
		{
            $tendanhnghiep='';
            if($customer->note==2)
            	{

            		$iddn=doanhNghiepChuyenNhuong::where('id_doanhnghiep',$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();
            		$tendanhnghiep=$iddn->tenDoanhNghiep;
            	}else{
            		$tendanhnghiep=$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep;

            	}


			$customer_array[] = array(

				'STT'=>$stt++,
				'Số GPCPKT' => $customer->soGiayPhepKhaiThac,
				'Tên Mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo, 
				'Tên doanh nghiệp' => $tendanhnghiep,
				'VT Hành chính mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong." - ".$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen." - "."Tỉnh Lạng Sơn",
				'Năm bắt đầu khai thác' => $customer->ngaygiayphep,

				'Thời gian khai thác' => $customer->thoigiancapphepkhaithac." "."năm",
				
			);
		}

			Excel::create('datadownload', function($excel) use ($customer_array){
			$excel->setTitle('datadownload');
			$excel->sheet('datadownload', function($sheet) use ($customer_array){
				$sheet->fromArray($customer_array, null, 'A1', false, false);
			});
		})->download('xlsx');
 

	}


	public function baocaohosodangkhaothacpdf(){
		
		$reportHoSoDangKhaithacpdf=hoSoCapPhepKhaiThac::where('thuhoitralai','=',null)->orderBy('id','DESC')->get();

		$pdfTCC = PDF::loadView('baocaothongke.baocaohosodangkhaothacpdf',['reportHoSoDangKhaithacpdf'=>$reportHoSoDangKhaithacpdf]);

		return $pdfTCC->stream('tuts_notes.pdf');

	}

	

	public function baocaohosothuhoi(){
		$reportHoSoThuHoi=hoSoCapPhepKhaiThac::where('thuhoitralai','=',1)->orderBy('id','DESC')->get();
		return view('baocaothongke.baocaohosothuhoi',['reportHoSoThuHoi'=>$reportHoSoThuHoi]);

	}

	
	public function baocaohosothuhoiex(){

	 $reportHoSoThuHoiex=hoSoCapPhepKhaiThac::where('thuhoitralai','=',1)->orderBy('id','DESC')->get();
		
	
	$customer_array[] = array('STT','Số GPTD','Tên Mỏ', 'Tên doanh nghiệp','Năm bắt đầu khai thác', 'Thời gian khai thác','lý do thu hồi');

		$stt=1;
		foreach($reportHoSoThuHoiex as $customer)
		{
            $lydo='';
            $hosothuhoitralai=hosothuhoitralaimo::where('id_khaithac',$customer->id)->first();
            $lydo=$hosothuhoitralai->lydo;
            
            $tendanhnghiep='';
            if($customer->note==2)
            {

            	$iddn=doanhNghiepChuyenNhuong::where('id_doanhnghiep',$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();
            	$tendanhnghiep=$iddn->tenDoanhNghiep;
            }else{
            	$tendanhnghiep=$customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep;

            }
			$customer_array[] = array(

				'STT'=>$stt++,
				'Số GPCPKT' => $customer->soGiayPhepKhaiThac,
				'Tên Mỏ' => $customer->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo, 
				'Tên doanh nghiệp' => $tendanhnghiep,
				
				'Năm bắt đầu khai thác' => $customer->ngaygiayphep,

				'Thời gian khai thác' => $customer->thoigiancapphepkhaithac." "."năm",
				'lý do thu hồi' => $lydo,
				
			);
		}

			Excel::create('datadownload', function($excel) use ($customer_array){
			$excel->setTitle('datadownload');
			$excel->sheet('datadownload', function($sheet) use ($customer_array){
				$sheet->fromArray($customer_array, null, 'A1', false, false);
			});
		})->download('xlsx');


	}

	
	public function baocaotinhinhkhaithac(){
		$quanHuyens=quanHuyen::get();
		$nhomKhoangSans=nhomKhoangSan::get();

		$reporttinhinhkhaithacs=hoSoCapPhepKhaiThac::where('thuhoitralai','=',null)->orderBy('id','DESC')->get();

		return view('baocaothongke.baocaotinhinhkhaithac',['reporttinhinhkhaithacs'=>$reporttinhinhkhaithacs,'quanHuyens'=>$quanHuyens,'nhomKhoangSans'=>$nhomKhoangSans]);

	}


	public function baocaotinhinhkhaithacpost(Request $req){
		$namnow= Carbon::now()->year;
		$namnow=$namnow-1;
		$quanHuyens=quanHuyen::get();
		$nhomKhoangSans=nhomKhoangSan::get();
		$loaihoso=$req->loaihoso;
		$tenkhoangsan=$req->loaiKhoangSan;
		$KSName=loaiHinhKhoangSan::find($tenkhoangsan);
		$quanhuyen=$req->tenQuanHuyen;
		$qhname=quanHuyen::find($quanhuyen);
		$baocaotinhhinhkt='';
		if($loaihoso==1)
		{
           if($quanhuyen==0){

              $baocaotinhhinhkt=hoSoCapPhepthamdo::join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('loaiKhoangSan',$tenkhoangsan)->select('hoSoCapPhepthamdo.*')->get();

            }else{

            	 $baocaotinhhinhkt=hoSoCapPhepthamdo::join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$quanhuyen)->where('loaiKhoangSan',$tenkhoangsan)->select('hoSoCapPhepKhaiThac.*')->get();

            }


		}else if($loaihoso==3)
		{
            if($quanhuyen==0){

              $baocaotinhhinhkt=hoSoCapPhepKhaiThac::join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('loaiKhoangSan',$tenkhoangsan)->where('thuhoitralai','=',null)->select('hoSoCapPhepKhaiThac.*')->get();

            }else{

            	 $baocaotinhhinhkt=hoSoCapPhepKhaiThac::join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$quanhuyen)->where('loaiKhoangSan',$tenkhoangsan)->where('thuhoitralai','=',null)->select('hoSoCapPhepKhaiThac.*')->get();

            }

		}

		//dd($baocaotinhhinhkt);


		return view('baocaothongke.baocaotinhinhkhaithac',['baocaotinhhinhkt'=>$baocaotinhhinhkt,'quanHuyens'=>$quanHuyens,'nhomKhoangSans'=>$nhomKhoangSans,'loaihoso'=>$loaihoso,'KSName'=>$KSName,'quanhuyen'=>$quanhuyen,'qhname'=>$qhname,'namnow'=>$namnow,'tenkhoangsan'=>$tenkhoangsan]);

	}

	
	public function baocaotinhinhkhaithacpdf($loaihoso,$quanhuyen,$khoangsan, Request $req){

	   $namnow= Carbon::now()->year;
		$namnow=$namnow-1;
		$KSName=loaiHinhKhoangSan::find($khoangsan);
		$qhname=quanHuyen::find($quanhuyen);
		$baocaotinhhinhkt='';
		if($loaihoso==1)
		{
           if($quanhuyen==0){

              $baocaotinhhinhkt=hoSoCapPhepthamdo::join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('loaiKhoangSan',$khoangsan)->select('hoSoCapPhepthamdo.*')->get();

            }else{

            	 $baocaotinhhinhkt=hoSoCapPhepthamdo::join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$quanhuyen)->where('loaiKhoangSan',$khoangsan)->select('hoSoCapPhepKhaiThac.*')->get();

            }


		}else if($loaihoso==3)
		{
            if($quanhuyen==0){

              $baocaotinhhinhkt=hoSoCapPhepKhaiThac::join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('loaiKhoangSan',$khoangsan)->where('thuhoitralai','=',null)->select('hoSoCapPhepKhaiThac.*')->get();

            }else{

            	 $baocaotinhhinhkt=hoSoCapPhepKhaiThac::join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->join('xaPhuong', 'duLieuMo.viTriXa', '=','xaPhuong.id')->where('id_quanHuyen',$quanhuyen)->where('loaiKhoangSan',$khoangsan)->where('thuhoitralai','=',null)->select('hoSoCapPhepKhaiThac.*')->get();

            }

		}


		$pdfTCC = PDF::loadView('baocaothongke.baocaotinhinhkhaithacpdf',['baocaotinhhinhkt'=>$baocaotinhhinhkt,'KSName'=>$KSName,'qhname'=>$qhname,'namnow'=>$namnow,'loaihoso'=>$loaihoso,'quanhuyen'=>$quanhuyen]);

		return $pdfTCC->stream('tuts_notes.pdf');
		

	}
	


}