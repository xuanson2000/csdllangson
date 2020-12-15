
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
   <h4>CẬP NHẬT TÊN XÃ PHƯỜNG THUỘC TỈNH LẠNG SƠN</h4>    

   <div class="row" style="margin-left: 1px; margin-right: 1px; margin-bottom: 10px; background-color: #ACB4BF;">

   	<form action="{{route('xaphuongid')}}" method="get">
   
      
   		<div class="col-md-4 form-group" style="margin-left: 10px; margin-top: 10px;">
   			<label style="font-weight: bold; float:left;">Tên Quận huyện</label>
   			<select class="form-control" name="quanHuyen" required>
   				<option value="0">Chọn tên Quận huyện</option>
   				@foreach($quanHuyens as $quanHuyen)
   				<option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
   				@endforeach
   			</select>
   		</div>
   		
   		<div class="col-md-2" style="">
   			<button style="margin-top:35px;" type="submit" class="btn btn-primary">Tra cứu</button>
   		</div>


   	</form>

   </div>


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



  @if(isset($xaPhuongSeachs))

  <table class="table table-bordered">
    <thead>
     <tr>
      <th>STT</th>
      <th>TÊN XÃ PHƯỜNG</th>
      <th>TÊN QUẬN HUYỆN</th>
      <th>THAO TÁC</th>
    </tr>
  </thead>

  <tbody>

   @foreach($xaPhuongSeachs as $xaPhuongSeach)
   <tr>
    <td style="text-align: center;">{{$loop->index+1}}</td>
    <td>{{$xaPhuongSeach->tenXaPhuong}}</td>
    <td>{{$xaPhuongSeach->quanHuyen->tenQuanHuyen}}</td>
    <td style="text-align: center;"> 
     <!-- <a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  --> 
     <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href=""><i class="fa fa-trash" aria-hidden="true"></i> Xóa dữ liệu </a>
   </td>
 </tr>
 @endforeach

</tbody>
</table>

  {!! $xaPhuongSeachs->appends(Request::all())->links() !!}
 

   @else
     <table class="table table-bordered">
   	<thead>
   		<tr>
   			<th>STT</th>
   			<th>TÊN XÃ PHƯỜNG</th>
   			<th>TÊN QUẬN HUYỆN</th>
   			<th>THAO TÁC</th>
   		</tr>
   	</thead>

   	<tbody>

   		@foreach($xaPhuongs as $xaPhuong)
   		<tr>
   			<td style="text-align: center;">{{$loop->index+1}}</td>
   			<td>{{$xaPhuong->tenXaPhuong}}</td>
   			<td>{{$xaPhuong->quanHuyen->tenQuanHuyen}}</td>
   			<td style="text-align: center;"> 
<!--    				<a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   -->
   				<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href=""><i class="fa fa-trash" aria-hidden="true"></i>Xóa dữ liệu</a>
   			</td>
   		</tr>
   		@endforeach

   	</tbody>
   </table>
  {{ $xaPhuongs->links()}}


@endif
  <button  style="float: right; font-size: 15px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</button>
</div>



<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="" style="background-color: #4F78F4; height: 40px;">
         <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm Xã phường</h4>
          <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        	<form action="{{route('themXaPhuong')}}" method="POST" enctype="multipart/form-data">
        		<input type="hidden"  name="_token" value="{{csrf_token()}}" >

        		<div class=" form-group" style="">
        			<label style="font-weight: bold; float:left;">Quận Huyện <span style="color: red;">(*)</span></label>
        			<select class="form-control" name="quanHuyen" required>
        				<option value="">Chọn Quận/Huyện</option>
        				@foreach($quanHuyens as $quanHuyen)
               <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
               @endforeach
        			</select>
        		</div>

        		<div class="form-group">
        			<label for="usr">Tên xã phường<span style="color: red;">(*)</span></label>
        			<input type="text" class="form-control" name="tenXaPhuong" required="">
        		</div>
        		<button style="float: right;"  type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
        	</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
    
        </div>
        
      </div>
    </div>
  </div>

  @endsection