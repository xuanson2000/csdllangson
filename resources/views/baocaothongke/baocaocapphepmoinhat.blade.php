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
<div class="col-md-10" ><h4 > BÁO CÁO TÌNH HÌNH CẤP GIẤY PHÉP KHAI THÁC KHOÁNG SẢN THEO NĂM 

    <form action="{{route('baocaocapphepmoinhat')}}" method="get">

        <div class="col-md-5 form-group" style="margin-left: -8px;  margin-top: 10px;">
            <label style=" float:left; color: #DDE1F8;">Nhập năm cần báo cáo</label>
            <input type="number" class="form-control" id="usr" name="nambaocao" required="">
        </div>
        <button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

        @if(count($txtthongkehosos)>0)
        <div class="btn-group" style="margin-top: 35px; margin-left:10px;" >
          <button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
            <span style="height: 17px;" class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <!-- <li><a href=""> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file Excel</a></li> -->
            <li><a href="{{route('baocaocapphepmoinhatpdf',[$nambaocao])}}"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</a></li>
        </ul>
    </div>

    @endif

</form>

</h4>



</div>

</div>


@if(  $txtthongkehosos !=null)
<h4>BẢNG SỐ LIỆU TỔNG HỢP VỀ TÌNH HÌNH CẤP GIẤY PHÉP KHAI THÁC KHOÁNG SẢN NĂM {{$nambaocao}}</h4>
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
        

    	@foreach($txtthongkehosos as $txtthongkehoso)
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

        
      
    </tbody>
  </table>

@endif


</div>



  @endsection

