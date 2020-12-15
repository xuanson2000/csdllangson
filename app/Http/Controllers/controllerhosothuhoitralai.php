<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\hosothuhoitralaimo;
use App\hoSoCapPhepKhaiThac;
use App\fileDinhKemGiayPhep;
use App\fileDinhKemBanDo;

class controllerhosothuhoitralai extends Controller
{
    //

    public function index()

	{
		
		$hoSoCapPhepKhaiThacs=hoSoCapPhepKhaiThac::where('thuhoitralai','1')->orderBy('id','DESC')->get();

		

		return view('hosothuhoitralai.index',['hoSoCapPhepKhaiThacs'=>$hoSoCapPhepKhaiThacs]);

		unset($hoSoCapPhepKhaiThacs);
	} 

	

	public function chitiethosobiendong($id)
	{
	
		$hoSoCapPhepKhaiThacid=hoSoCapPhepKhaiThac::find($id);

		//dd($hoSoCapPhepKhaiThacid);

		$filedinhkemgiaypheps=fileDinhKemGiayPhep::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();

		$filedinhkembandos=fileDinhKemBanDo::where('id_HoSo',$id)->where('id_loaiHoSo','4')->get();


		return view('hosothuhoitralai.chitiethosobiendong',['hoSoCapPhepKhaiThacid'=>$hoSoCapPhepKhaiThacid,'filedinhkemgiaypheps'=>$filedinhkemgiaypheps,'filedinhkembandos'=>$filedinhkembandos]);

		unset($hoSoCapPhepKhaiThacid);
		unse($filedinhkemgiaypheps);
		unse($filedinhkembandos);
	} 



}
