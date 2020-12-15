
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

	<form action="{{route('timkiemmo')}}" method="get">

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr" name="txtseach">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Năm báo cáo</label>
			<select class="form-control" name="tenQuanHuyenseach" id="idtenQuanHuyenseach"  >
				<option value="">Chọn năm</option>

			</select>
		</div>
		
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

    <button type="button" style="float: right; margin-top: 35px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModaldulieudieutraks"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button>

	</form>
	
	  <div class="modal fade" id="myModaldulieudieutraks">
      <div class="modal-dialog"style="width: 60%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm hồ sơ tiếp nhận</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body" style="margin-bottom: 50px;">
         	<form action="{{route('themhosotiepnhan')}}" method="POST" enctype="multipart/form-data">
         		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

         		<div class="form-group">
         			<label for="usr">Tên hồ sơ <span style="color: red;">(*)</span></label>
         			<textarea type="text" class="form-control" name="tenHoSo" required="">
         			</textarea>
         		</div>

         		<div class="form-group">
         			<label for="usr">Đơn vị/ cá nhân trình <span style="color: red;">(*)</span></label>

         			<input type="text" class="form-control" name="donViTrinh" required="">

         		</div>
         		<div class="form-group">
         			<label for="usr">Ngày hẹn trả kết quả<span style="color: red;">(*)</span></label>
         			<input type="date" class="form-control" name="ngayHenTra" required="">
         		</div>

         		<div class="form-group">
         			<label for="usr">file giấy phép  </label>
         			<input type="file" class="form-control" name="file" multiple >
         		</div>

         		<div class="form-group">
         			<button style="float: right;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>

         		</div>






         </form> 


</div>

<!-- Modal footer -->


</div>
</div>
</div>
	
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

@if( isset($viewseach))

  <h4 style="margin-bottom: 20px; margin-top: 20px;">KẾT QUẢ TÌM KIẾM</h4>
             
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
        <th>KÝ HIỆU MỎ</th>
    		<th>TÊN MỎ</th>
    		<th>NHÓM KHOÁNG SẢN</th>
        <th>LOẠI KHOÁNG SẢN</th>
    		<th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>CHI TIẾT</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      @foreach($viewseach as $viewseachs)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$viewseachs->kyHieuMo}}</td>
        <td>{{$viewseachs->tenMo}}</td>
        <td>{{$viewseachs->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
        <td>{{$viewseachs->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
        <td>{{$viewseachs->xaPhuong->tenXaPhuong}} - {{$viewseachs->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn </td>
        

        <td><a href="{{route('chitietdulieumo',[$viewseachs->id])}}" > XEM</a></td>
        <td> 
          <a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          <a title="Chuyển đổi dữ liệu mỏ"   href="{{route('getxoadulieumo',[$viewseachs->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>

        </td>
      </tr>
      @endforeach  
   
      
    </tbody>
  </table>

@else 
  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH HỒ SƠ TIẾP NHẬN GIẢI QUYẾT</h4>

<table class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
      	<th>STT</th>
      	<th style="width: 170px;">TÊN HỒ SƠ</th>
      	<th>NGÀY TIẾP NHẬN</th>
      	<th>NGÀY HẸN TRẢ</th>      	
      	<th>TỔ CHỨC, CÁ NHÂN TRÌNH</th>
      	<th>NGƯỜI TIẾP NHẬN</th>
      	<th>FILE TRÌNH</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
     @foreach($hosotiepnhangqs as $hosotiepnhangq)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$hosotiepnhangq->tenHoSo}}</td>
        <td>{{$hosotiepnhangq->ngayTiepNhan}}</td>
        <td>{{$hosotiepnhangq->ngayHenTra}}</td>
        <td>{{$hosotiepnhangq->donViTrinh}}</td>
        <td>{{$hosotiepnhangq->canBoTiepNhan}}</td>
        <td> <a href="public/tailieu/{{$hosotiepnhangq->file}}">  {{$hosotiepnhangq->file}}</a> </td>

       
        <td> 
          <a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          <a title="xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoahosotiepnhan',[$hosotiepnhangq->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>

        </td>
      </tr>
     @endforeach
   
      
    </tbody>
  </table>




@endif




</div>



  @endsection

