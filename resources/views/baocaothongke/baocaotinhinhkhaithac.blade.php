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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="{{route('baocaotinhinhkhaithacpost')}}" method="get">

		 

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Loại hồ sơ</label>
			<select class="form-control" name="loaihoso" required="">
				<option value="" >Chọn loại hồ sơ</option>
				<option value="1">Hồ sơ thăm dò khoáng</option>
				<option value="3">Hồ sơ cấp phép khái thác</option>

			</select>
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Loại khoáng sản</label>
			<select class="form-control" name="nhomKhoangSan" id="idnhomKhoangSan" required >
              <option value="">Chọn loại hình khoáng sản </option>
              @foreach($nhomKhoangSans as $nhomKhoangSan)

              <option value="{{$nhomKhoangSan->id}}">{{$nhomKhoangSan->tenNhomKS}}</option>
              @endforeach
            </select>
		</div>
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Tên khoáng sản</label>
			<select class="form-control" name="loaiKhoangSan" id="idloaiHinhKhoangSan" required >
				

            </select>
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Vị trí hành chính</label>
			<select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen" required >
                <option value="">Chọn Quận/Huyện</option>
                <option value="0">Tất cả quận huyện</option>
                @foreach($quanHuyens as $quanHuyen)
                <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
                @endforeach
              </select>
		</div>
		@if(isset($baocaotinhhinhkt)&& $baocaotinhhinhkt!='')
		<div class=" btn-group" style="margin-top: 10px; margin: 10px 40px 5px 5px; float: right;" >
			<button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
			<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
				<span style="height: 17px;" class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<!-- <li><a href=""> <i class="fa fa-file-excel-o" aria-hidden="true"></i> {{$loaihoso}}</a></li> -->
				<li><a href="{{route('baocaotinhinhkhaithacpdf',[$loaihoso,$quanhuyen,$tenkhoangsan])}}"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</a></li>

			</ul>
		</div>

		@endif
	
		<button style="margin: 10px 40px 5px 5px; float: right;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>


   

	</form>
	
	



</div>




@if(isset($baocaotinhhinhkt) && $baocaotinhhinhkt!=null)
   @if($loaihoso==1)

   <h4 style="margin-bottom: 20px; margin-top: 20px;color: #0C5EBD;"> Danh sách hồ sơ cấp phép thăm dò khoáng sản {{$KSName->tenLoaiHinhKS}} @if($quanhuyen==0) trên toàn tỉnh Lạng Sơn @else trên địa bàn {{$qhname->tenQuanHuyen}}@endif

 </h4>

             
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPTD</th>
    		<th>Ngày câp phép</th>
    		<th>Tên mỏ</th>
    		<th>Vị trí mỏ</th>
    		<th>Doanh nghiệp</th>
    		<th>Diện tích thăm dò</th>
    		<th >Thời gian thăm dò</th>
    		<th>Chi tiết</th>
    	</tr>
    </thead>
    <tbody>
    	@foreach($baocaotinhhinhkt as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
    		<td>{{$txtthongkehoso ->soGiayPhepThamDo}}</td>
    		<td>{{date('d-m-Y', strtotime($txtthongkehoso->ngayGiayPhep))}}</td>
    		<td>{{$txtthongkehoso->duLieuMo->tenMo}}</td>
    		
    		<td>{{$txtthongkehoso->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

    		<td>{{$txtthongkehoso->doanhNghiep->tenDoanhNghiep}}</td>
    		
    		<td>{{$txtthongkehoso->dienTichThamDo}} ha</td>
    		<td>{{$txtthongkehoso->thoiGianThamDo}} tháng</td>
    		
    		<td><a href="{{route('chitietthamdo',[$txtthongkehoso ->id])}}" > XEM</a></td>
    		
    	</tr>
        @endforeach
        
    </tbody>
  </table>
  
@elseif($loaihoso==3)

	<h4 style="margin-bottom: 20px; margin-top: 20px;color: #0C5EBD;"> Danh sách hồ sơ cấp phép khai thác khoáng sản {{$KSName->tenLoaiHinhKS}} @if($quanhuyen==0) trên toàn tỉnh Lạng Sơn @else trên địa bàn {{$qhname->tenQuanHuyen}}@endif

 </h4>
<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKT</th>
    		<th>Ngày cấp phép</th>
    		<th>Tên mỏ</th>
    		<th>Vị trí mỏ</th>
    		<th>Doanh nghiệp</th>
    		<th>Trữ lượng cấp phép</th>
    		<th>Trữ lượng còn lại</th>
    		<th>Thời gian khai thác</th>

    		<th>Chi tiết</th>
    	
    	</tr>
    </thead>
    <tbody>
    	@foreach($baocaotinhhinhkt as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>

    		<td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>
            <td>{{date('d-m-Y', strtotime($txtthongkehoso->ngaygiayphep))}}</td>
    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

    		@if($txtthongkehoso->note==2)
    		<?php
    		$iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();
    		?>

    		<td>{{$iddn->tenDoanhNghiep}}</td>
    		@else
    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
    		@endif
    		 <td>{{number_format($txtthongkehoso->truLuongKhaiThac)}} {{$txtthongkehoso->donVi}}</td>

    		 <?php 
    		 $time=strtotime($txtthongkehoso->ngaygiayphep);
    		 $namcapphep=date("Y",$time);
    		 $namdakhaithac=$namnow-$namcapphep;
    		 $truluongdakhaithac=($txtthongkehoso->congSuatKhaiThac)*$namdakhaithac;
    		 $truluongconlai=($txtthongkehoso->truLuongKhaiThac)-$truluongdakhaithac;
    		 ?>
    		  <td>{{number_format($truluongconlai)}} {{$txtthongkehoso->donVi}}</td>
    		
    		<td>{{$txtthongkehoso->thoigiancapphepkhaithac}} năm</td>
    		
    		
    		<td><a href="{{route('chitietcapphepkhaithac',[$txtthongkehoso ->id])}}" > XEM</a></td>
    	
    	</tr>
        @endforeach

        
      
    </tbody>
  </table>

@endif

@else 
 
<h4 style="margin-left: 10px; color: red;">Không có kết quả nào ... </h4>



@endif




</div>



  @endsection



  @section('script1')
  <script>
      $("#idnhomKhoangSan").change(function(){
      var idnhomks =$(this).val();
      $.get("khoang-san/ajax/loai-hinh-khoang-san/"+idnhomks,function(data){
        $("#idloaiHinhKhoangSan").html(data);
      });
    });  </script>
  @endsection
