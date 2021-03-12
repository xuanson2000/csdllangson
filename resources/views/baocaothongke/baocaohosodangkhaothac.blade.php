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
<div class="col-md-10"><h4> DANH SÁCH HỒ SƠ KHOÁNG SẢN ĐANG KHAI THÁC</h4></div>
<div class="col-md-2">  <div class="btn-group" style="margin-top:3px;" >
	<button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
		<span style="height: 17px;" class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a href="{{route('baocaohosodangkhaothacexcel')}}"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file Excel</a></li>
		<li><a href="{{route('baocaohosodangkhaothacpdf')}}"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</a></li>
	</ul>
</div>
</div>
</div>



<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKH</th>
    		<th>Tên mỏ</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Vị trí hành chính</th>
            <th>Năm bắt đầu khai thác</th>
    		<th>Thời gian khai thác</th>
    		<th>Chi tiết</th>
    	
    	</tr>
    </thead>
    <tbody>
    	@foreach($reportHoSoDangKhaithac as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
       
          <td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>

        


    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

    		@if($txtthongkehoso->note==2)
    		<?php
    		$iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();

    		?>
    		<td>{{$iddn->tenDoanhNghiep}}</td>
    		@else
    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
    		@endif

    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

        <td>{{date('d-m-Y', strtotime($txtthongkehoso->ngaygiayphep))}}</td>    
    		<td>{{$txtthongkehoso->thoigiancapphepkhaithac}} năm</td>
    		
    		
    		<td><a href="{{route('chitietcapphepkhaithac',[$txtthongkehoso ->id])}}" > XEM</a></td>
    	
    	</tr>
        @endforeach

        
      
    </tbody>
  </table>

 {{ $reportHoSoDangKhaithac->links()}}


</div>



  @endsection

