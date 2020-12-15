
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

<div class="container" style="background-color: white; padding: 20px 200px 20px 100px; width: 100%;">
   <h4 style="width: 80%;">CẬP NHẬT VỊ TRI QUẬN HUYỆN TỈNH LẠNG SƠN</h4>    


  @if(Session::has('messgsua'))
  <div class="alert alert-success alert-dismissible" style="background-color: #C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgsua')}}
  </div>
  @endif

  @if(Session::has('messgthem'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
  </div>
  @endif

  @if(Session::has('messgxoa'))

  <div class="alert alert-success">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('messgxoa')}}</div>
  @endif

  <table class="table table-bordered" >
  	<thead>
  		<tr>
  			<th>STT</th>
  			<th>TÊN QUẬN HUYỆN</th>
  			<th>GHI CHÚ</th>
  			<th>THAO TÁC</th>
  		</tr>
  	</thead>

    <tbody>

    	@foreach($quanHuyens as $quanHuyen)
    	<tr>
    		<td style="text-align: center;" >{{$loop->index+1}}</td>
    		<td>{{$quanHuyen->tenQuanHuyen}}</td>
    		<td></td>
    		<td style="text-align: center;"> 
    		<!-- 	<a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   -->
    			<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href=""><i class="fa fa-trash" aria-hidden="true"></i> Xóa </a>
    		</td>
    	</tr>
    	@endforeach
   
    </tbody>
  </table>



  <button  style="float: right; font-size: 15px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#themquanhuyen">Thêm mới</button>
</div>

<!-- The Modal -->
  <div class="modal fade" id="themquanhuyen">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="" style="background-color: #4F78F4; height: 40px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-family: Helvetica;">Thêm Quận Huyện</h4>
           <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
        
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="form-group">
        		<form action="{{route('themQuanHuyen')}}" method="POST" enctype="multipart/form-data">
        			<input type="hidden" name="_token" value="{{csrf_token()}}" >
        			<label for="usr">Tên quận huyện <span style="color: red;">(*)</span></label>
        			<input type="text" class="form-control" name="tenQuanHuyen" required="">
        		</div>
        	
        		<button type="submit" class="btn btn-warning"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>

        	   </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>

  @endsection
  