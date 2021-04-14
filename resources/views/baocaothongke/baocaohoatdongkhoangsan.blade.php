@extends('khoangsan.layout')
@section("content12")
    
<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
    font-size: 14px;
  }
  
  td{
    font-family: "Times New Roman", Times, serif;
    font-size: 16px;
  }

</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
   
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72; color: white; margin-bottom: 10px;">
<div class="col-md-10" ><h4 > BẢNG SỐ LIỆU TỔNG HỢP VỀ HOẠT ĐỘNG KHAI THÁC KHOÁNG SẢN NĂM

    <form action="{{route('baocaohoatdongkhoangsan')}}" method="get">

        <div class="col-md-5 form-group" style="margin-left: -8px;  margin-top: 10px;">
            <label style=" float:left; color: #DDE1F8;">Nhập năm cần báo cáo</label>
            <input type="number" class="form-control" id="usr" name="nambaocao" required="">
        </div>
        <button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>



</form>

</h4>



</div>

</div>
    

  @if(isset($nambaocao)) 
 <h4>BẢNG SỐ LIỆU TỔNG HỢP VỀ HOẠT ĐỘNG KHAI THÁC KHOÁNG SẢN NĂM {{$nambaocao}} </h4>
@endif
<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Loại khoáng sản </th>
    		<th>Sản lượng khoáng sản nguyên khai   (m3, tấn)</th>
    		<th>Tiền cấp quyền KTKS (triệu đồng)</th>
    		<th>Tiền trúng đấu giá quyền KTKS(triệu đồng)</th>
            <th>Thuế tài nguyên (triệu đồng)</th>
    		<th>Thuế thu nhập Doanh nghiệp    (triệu đồng)</th>
    		<th>Tiền ký quỹ phục hồi môi trường (triệu đồng)</th>
            <th>Phí bảo vệ môi trường  (triệu đồng)</th>
    	
    	</tr>
    </thead>
 
     
    <tbody>
        @if(isset($nambaocao))
        <tr>
            <td colspan="9" style="font-weight: bold;">I. Giấy phép khai thác do UBND tỉnh Lạng Sơn cấp</td>
        </tr>

    	@foreach($baocaohoatdong2 as $baocaohoatdong)
    	<?php $tenKS=DB::table('loaiHinhKhoangSan')->find($baocaohoatdong->loaiKhoangSan);

    	$truluong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.truLuongKhaiThac');

    	$tiencapquyen=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.tienCapQuyen');



    	$thuetainguyen=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.thueTaiNguyen');

    	$thuthunhapdoanhnghiep=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.thueThuNhapDoanhNghiep');

    	$tienkyquymoitruong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.kyQuyPhucHoiMoiTruong');
    	//dd($calutate);
    	$phibaovemoitruong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',3)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.phiBaoVeMoiTruong');



    	?>
    	<tr>
    		<td>{{$loop->index+1}}</td>
    		<td>{{$tenKS->tenLoaiHinhKS}}</td>

    		<td>{{$truluong}}</td>
    		<td>{{$tiencapquyen}}</td>
    		<td></td>
    		<td>{{$thuetainguyen}}</td>
    		<td>{{$thuthunhapdoanhnghiep}}</td>
    		<td>{{$tienkyquymoitruong}}</td>
    		<td>{{$phibaovemoitruong}}</td>


    	</tr>
        @endforeach
   
    <tr>
            <td colspan="9" style="font-weight: bold;">I. Giấy phép khai thác Bộ Tài Nguyên và Môi trường cấp</td>
        </tr>

    	@foreach($baocaohoatdong1 as $baocaohoatdong11)
    	<?php $tenKS11=DB::table('loaiHinhKhoangSan')->find($baocaohoatdong11->loaiKhoangSan);

    	$truluong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.truLuongKhaiThac');

    	$tiencapquyen=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.tienCapQuyen');

    
    	$thuetainguyen=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.thueTaiNguyen');

    	$thuthunhapdoanhnghiep=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.thueThuNhapDoanhNghiep');

    	$tienkyquymoitruong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.kyQuyPhucHoiMoiTruong');
    	//dd($calutate);
    	$phibaovemoitruong=DB::table('nopNganSachKhoangSan')->join('hoSoCapPhepKhaiThac','nopNganSachKhoangSan.id_giayPhepKhaiThac','=','hoSoCapPhepKhaiThac.id')->join('hoSoCapPhepPheDuyetTruLuong', 'hoSoCapPhepKhaiThac.id_hoSoCapPhepPheDuyetTruLuong', '=','hoSoCapPhepPheDuyetTruLuong.id')->join('hoSoCapPhepthamdo', 'hoSoCapPhepthamdo.id', '=','hoSoCapPhepPheDuyetTruLuong.id_giayPhepThamDo')->join('duLieuMo', 'duLieuMo.id', '=','hoSoCapPhepthamdo.id_mo')->where('coQuanPheDuyet',1)->where('thuhoitralai','=',null)->where('loaiKhoangSan',$tenKS11->id)->where('nam',$nambaocao)->sum('nopNganSachKhoangSan.phiBaoVeMoiTruong');



    	?>
    	<tr>
    		<td>{{$loop->index+1}}</td>
    		<td>{{$tenKS11->tenLoaiHinhKS}}</td>

    		<td>{{$truluong}}</td>
    		<td>{{$tiencapquyen}}</td>
    		<td></td>
    		<td>{{$thuetainguyen}}</td>
    		<td>{{$thuthunhapdoanhnghiep}}</td>
    		<td>{{$tienkyquymoitruong}}</td>
    		<td>{{$phibaovemoitruong}}</td>


    	</tr>
        @endforeach
       
      @endif
    </tbody>

  </table>

</div>



  @endsection





