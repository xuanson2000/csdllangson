
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

	<form action="{{route('thongkehoso')}}" method="get">

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Năm thống kê</label>
			<input type="number" class="form-control" id="usr" name="nam" required="">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Loại hồ sơ</label>
			<select class="form-control" name="loaihoso" required="">
				<option value="" >Chọn loại hồ sơ</option>
				<option value="1">Hồ sơ thăm dò khoáng</option>
				<option value="2">Hồ sơ phê duyệt trữ lượng</option>
				<option value="3">Hồ sơ cấp phép khái thác</option>

			</select>
		</div>
	
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

   @if(isset($txtthongkehosos) && $txtthongkehosos!=null)
  <div class="btn-group" >
    <button type="button" class="btn btn-primary">Sony</button>
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">Tablet</a></li>
      <li><a href="#">Smartphone</a></li>
    </ul>
  </div>

   @endif
   

	</form>
	
	



</div>





  @if(Session::has('messgthem'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
  </div>
  @endif

  @if(Session::has('messgthemtruluong'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthemtruluong')}}
  </div>
  @endif 

  @if(Session::has('messgxoa'))

  <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 {{Session::get('messgxoa')}}</div>
 @endif

@if(isset($txtthongkehosos) && $txtthongkehosos!=null)
   @if($loaihoso==1)

  <h4 style="margin-bottom: 20px; margin-top: 20px;">KẾT QUẢ TÌM KIẾM HỒ SƠ THĂM DÒ KHOÁNG SẢN</h4>
             
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPTD</th>
    		<th>Tên mỏ</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Vị trí hành chính</th>
    		<th>Diện tích thăm dò</th>
    		<th >Thời gian thăm dò</th>
    		<th>Chi tiết</th>
    	
    	</tr>
    </thead>
    <tbody>
    	@foreach($txtthongkehosos as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
    		<td>{{$txtthongkehoso ->soGiayPhepThamDo}}</td>
    		<td>{{$txtthongkehoso->duLieuMo->tenMo}}</td>
    		<td>{{$txtthongkehoso->doanhNghiep->tenDoanhNghiep}}</td>
    		<td>{{$txtthongkehoso->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
    		<td>{{$txtthongkehoso->dienTichThamDo}} ha</td>
    		<td>{{$txtthongkehoso->thoiGianThamDo}} tháng</td>
    		
    		<td><a href="{{route('chitietthamdo',[$txtthongkehoso ->id])}}" > XEM</a></td>
    		
    	</tr>
        @endforeach

        
      
    </tbody>
  </table>
  @elseif($loaihoso==2)
 <h4 style="margin-bottom: 20px; margin-top: 20px;">KẾT QUẢ TÌM KIẾM HỒ SƠ PHÊ DUYỆT TRỮ LƯỢNG KHOÁNG SẢN</h4>
  <table class="table table-bordered">
  	<thead>
  		<tr style="background-color: #AAC1C6;">
  			<th>STT</th>
  			<th>Số GPTD</th>
  			<th>Tên mỏ</th>
  			<th>Tên Doanh nghiệp</th>
  			<th>Vị trí hành chính</th>
  			<th>Tổng trữ lượng</th>

  			<th>Chi tiết</th>

  		</tr>
  	</thead>
  	<tbody>
  		@foreach($txtthongkehosos as $txtthongkehoso)
  		<tr>
  			<td>{{$loop->index+1}}</td>
  			<td>{{$txtthongkehoso ->soGiayPhepPheDuyet}}</td>
  			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
  			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
  			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
  			<td>{{$txtthongkehoso->tongTruLuong}} {{$txtthongkehoso->donVi}}</td>


  			<td><a href="{{route('chitietpheduyettrucluong',[$txtthongkehoso ->id])}}" > XEM</a></td>
  			
  		</tr>
  		@endforeach



  	</tbody>
  </table>


@elseif($loaihoso==3)
<h4 style="margin-bottom: 20px; margin-top: 20px;">KẾT QUẢ TÌM KIẾM HỒ SƠ CẤP PHÉP KHAI THÁC KHOÁNG SẢN</h4>
<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKH</th>
    		<th>Tên mỏ</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Vị trí hành chính</th>
    		<th>Thời gian khai thác</th>
    		<th>Chi tiết</th>
    	
    	</tr>
    </thead>
    <tbody>
    	@foreach($txtthongkehosos as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
        @if($txtthongkehoso->index_biendong==1)
        <?php
        $hoSoBienDongKhoangSan=App\hoSoBienDongKhoangSan::where('id_hoSoCapPhepKhaiThac',$txtthongkehoso->id)->first();
        ?>
    		<td>{{$hoSoBienDongKhoangSan->soGiayPhep}}</td>
        @else
          <td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>

        @endif


    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

        @if($txtthongkehoso ->index_biendong==1)
        <td>{{$hoSoBienDongKhoangSan->doanhNghiepChuyenNhuong->tenDoanhNghiep}}</td>
        @else
         <td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        @endif

    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

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


  @section('script')
  <script>
      $("#idtenQuanHuyen").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong/"+idtong,function(data){
        $("#idtenXaPhuong").html(data);
      });
    });  </script>
  @endsection


 
  @section('scriptseach')
  <script>
    $("#idtenQuanHuyenseach").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong-seach/"+idtong,function(data){
        $("#idtenXaPhuongseach").html(data);
      });
    });  </script>
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
s