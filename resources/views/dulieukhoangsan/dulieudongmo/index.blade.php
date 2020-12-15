
 @extends('khoangsan.layout')

@section("content12")

<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 15px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }

</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

<!-- 	<form action="" method="get">
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen0" required >
        <option value="">Chọn Quận/Huyện</option>
        @foreach($quanHuyens as $quanHuyen)
        <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
        @endforeach
      </select>
		</div>
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
      <select class="form-control" name="tenXaPhuong" id="idtenXaPhuong0" required >

      </select>
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form> -->
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU MỎ KHOÁNG SẢN ĐÓNG CỬA</h4>
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
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
        <th>SỐ QĐ</th>
         <th>NGÀY QUYẾT ĐỊNH</th>
    		<th>TÊN MỎ</th>
        <th>LOẠI KHOÁNG SẢN</th>
    		<th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>LÝ ĐÓNG MỎ</th>
        <th>CHI TIẾT</th>
    		
    	</tr>
    </thead>
    <tbody>
      @foreach($dulieudongmos as $dulieudongmo)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$dulieudongmo->soQuyetDinhDongMo}}</td>
         <td>{{$dulieudongmo->ngayThuHoi}}</td>
        <td>{{$dulieudongmo->tenMo}}</td>
        <td>{{$dulieudongmo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
        <td>{{$dulieudongmo->xaPhuong->tenXaPhuong}} - {{$dulieudongmo->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn </td>
         <td>{{$dulieudongmo->lyDo}}</td>
        <td><a href="{{route('chitietdulieumodongcua',[$dulieudongmo->id])}}"> Xem</a></td>
        
      </tr>
      @endforeach  
   
      
    </tbody>
  </table>
 





 
    


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


