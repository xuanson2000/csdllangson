
 @extends('khoangsan.layout')

@section("content12")
<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 16px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
   <h4>CẬP NHẬT NHÓM KHOÁNG SẢN</h4>    


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

  <table class="table table-bordered">
  	<thead>
  		<tr>
  			<th>STT</th>
  			<th>TÊN NHÓM KHOÁNG SẢN</th>
  			<th>GHI CHÚ</th>
  			<th>THAO TÁC</th>
  		</tr>
  	</thead>

    <tbody>

    	@foreach($nhomKhoangSans as $nhomKhoangSan)
    	<tr>
    		<td style="text-align: center;" >{{$loop->index+1}}</td>
    		<td>{{$nhomKhoangSan->tenNhomKS}}</td>
    		<td>{{$nhomKhoangSan->ghiChu}}</td>
    		<td style="text-align: center;"> 
    			<a title="Sửa" href="{{route('suanhomkhoangsan',[$nhomKhoangSan->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
    			<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoanhomkhoangsan',[$nhomKhoangSan->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
    		</td>
    	</tr>
    	@endforeach
   
    </tbody>
  </table>



  <button  style="float: right; font-size: 15px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</button>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="" style="background-color: #4F78F4; height: 40px;">
          <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-family: Helvetica;">Thêm nhóm khoáng sản</h4>
         <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
       </div>
        
        
        <!-- Modal body -->
        <div class="modal-body">
        	
        		<form action="{{route('themnhomkhoangsan')}}" method="POST" enctype="multipart/form-data">
        			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
              <div class="form-group">
        			<label for="usr">Tên nhóm khoáng sản <span style="color: red;">(*)</span></label>
        			<input type="text" class="form-control" name="tenNhomKS" required="">
        		</div>
        		<div class="form-group">
        			<label for="usr">Ghi chú</label>
        			<input type="text" class="form-control" name="ghiChu">
        		</div>
        		<button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>

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