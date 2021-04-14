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
<div class="col-md-10"><h4> DANH SÁCH GIẤY PHÉP KHAI THÁC KHOÁNG SẢN CÒN HIỆU LỰC TRÊN ĐỊA BÀN TỈNH LẠNG SƠN</h4></div>
<div class="col-md-2">  <div class="btn-group" style="margin-top:3px;" >
	<button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
		<span style="height: 17px;" class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<!-- <li><a href="{{route('baocaohosodangkhaothacexcel')}}"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file Excel</a></li> -->
		<li><a href="{{route('baocaohosodangkhaothacpdf')}}"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</a></li>
	</ul>
</div>
</div>
</div>



<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKH, Ngày GP</th>
    		<th>Loại khoáng sản</th>
    		<th>Tên đơn vị được cấp phép</th>
    		<th>Vị trí khai thác</th>
            <th>Diện tích (ha)</th>
    		<th>Trữ lượng(m3, tấn)</th>
    		<th>Công xuất(m3, tấn)/ năm</th>
            <th>Thời hạn GP (năm)</th>
    	
    	</tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="8" style="font-weight: bold;">I. Giấy phép khai thác do UBND tỉnh Lạng Sơn cấp</td>
        </tr>

    	@foreach($reportHoSoDangKhaithacub as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
       
             <td>{{$txtthongkehoso->soGiayPhepKhaiThac}} <br> {{date('d-m-Y', strtotime($txtthongkehoso->ngaygiayphep))}}</td>

         <td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>


    		

    		@if($txtthongkehoso->note==2)
    		<?php
    		$iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();

    		?>
    		<td>{{$iddn->tenDoanhNghiep}}</td>
    		@else
    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
    		@endif

    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}  {{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

            <td>{{$txtthongkehoso->dienTichKhaiThac}}</td>    
    		<td>{{number_format($txtthongkehoso->truLuongKhaiThac)}}</td>
                <td>{{number_format($txtthongkehoso->congSuatKhaiThac)}} </td>
    		<td>{{$txtthongkehoso->thoigiancapphepkhaithac}} </td>
    		
    	
    	
    	</tr>
        @endforeach

         <tr>
            <td colspan="8" style="font-weight: bold;">II. Giấy phép khai thác do Bộ Tài nguyên và Môi trường cấp</td>
        </tr>

        @foreach($reportHoSoDangKhaithacbo as $txtthongkehosobo)
        <tr>
            <td>{{$loop->index+1}}</td>
       
             <td>{{$txtthongkehosobo->soGiayPhepKhaiThac}} <br> {{date('d-m-Y', strtotime($txtthongkehosobo->ngaygiayphep))}}</td>

         <td>{{$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>


            

            @if($txtthongkehosobo->note==2)
            <?php
            $iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();

            ?>
            <td>{{$iddn->tenDoanhNghiep}}</td>
            @else
            <td>{{$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
            @endif

            <td>{{$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}  {{$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehosobo->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

            <td>{{$txtthongkehosobo->dienTichKhaiThac}}</td>    
            <td>{{number_format($txtthongkehosobo->truLuongKhaiThac)}}</td>
                <td>{{number_format($txtthongkehosobo->congSuatKhaiThac)}} </td>
            <td>{{$txtthongkehosobo->thoigiancapphepkhaithac}} </td>
            
        
        
        </tr>
        @endforeach
      
    </tbody>
  </table>




</div>



  @endsection

