
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
   <h4>CẬP NHẬT TEN KHOÁNG SẢN</h4>    

   <div class="row" style="margin-left: 1px; margin-right: 1px; margin-bottom: 10px; background-color: #ACB4BF;">

   	<form action="{{route('tracuuloaikhoangsan')}}" method="get">

   		<div class="col-md-4 form-group" style="margin-left: 10px; margin-top: 10px;">
   			<label style="font-weight: bold; float:left;">Nhóm khoáng sản</label>
   			<select class="form-control" name="nhomkhongsan" >
   				<option value="0">Chọn tất cả nhóm khoáng sản</option>
   				@foreach($nhomkhoangsans as $nhomkhoangsan)
   				<option value="{{$nhomkhoangsan->id}}">{{$nhomkhoangsan->tenNhomKS}}</option>
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



   @if(isset($loaihinhkhoangsanids))
     
   @if($id!=0)
    <h4 style="font-size: 14px; font-weight: bold;"> Danh sách loại hình khoáng sản thuộc nhóm khoáng sản <span style="color: blue;"> {{$tennhomkhoangsan->tenNhomKS}} </span></h4>
   
   @endif

   <table class="table table-bordered">
   	<thead>
   		<tr>
   			<th>STT</th>
   			<th>TÊN KHOÁNG SẢN</th>
   			<th>NHÓM KHOÁNG SẢN</th>
   			<th>THAO TÁC</th>
   		</tr>
   	</thead>

   	<tbody>

   		@foreach($loaihinhkhoangsanids as $loaihinhkhoangsanid)
   		<tr>
   			<td style="text-align: center;">{{$loop->index+1}}</td>
   			<td>{{$loaihinhkhoangsanid->tenLoaiHinhKS}}</td>
   			<td>{{$loaihinhkhoangsanid->nhomKhoangSan->tenNhomKS}}</td>
   			<td style="text-align: center;"> 
   				<a title="Sửa" href="{{route('sualoaihinhkhoangsan',[$loaihinhkhoangsanid->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
   				<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoaloaihinhkhoangsan',[$loaihinhkhoangsanid->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
   			</td>
   		</tr>
   		@endforeach

   	</tbody>


   </table>

   <button  style="float: right; font-size: 15px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addloaihinhks"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</button>

   <!-- The Modal -->
  <div class="modal fade" id="addloaihinhks">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
       <div class="" style="background-color: #4F78F4; height: 40px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-family: Helvetica;">Thêm loại hình khoáng sản</h4>
           <button type="button" style="float: right; margin: 5px 5px 5px 0px; " class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
        
        
        <!-- Modal body -->
        <div class="modal-body">

          <form action="{{route('themloaihinhkhoangsan')}}" method="POST" enctype="multipart/form-data">
              <input type="hidden"  name="_token" value="{{csrf_token()}}" >
          @if($id==0)
          <div class=" form-group" style="">
            <label style="font-weight: bold; float:left;">Nhóm khoáng sản <span style="color: red;">(*)</span></label>
            <select class="form-control" name="idNhomKhoangSan" required>
              <option value="0">Chọn nhóm khoáng sản</option>
              @foreach($nhomkhoangsans as $nhomkhoangsan)
              <option value="{{$nhomkhoangsan->id}}">{{$nhomkhoangsan->tenNhomKS}}</option>
              @endforeach
            </select>
          </div>
          @else 

          <div class=" form-group" style="">
            <label style="font-weight: bold; float:left;">Nhóm khoáng sản <span style="color: red;">(*)</span></label>

            <select class="form-control" name="idNhomKhoangSan" required>
              <option value="{{$tennhomkhoangsan->id}}">{{$tennhomkhoangsan->tenNhomKS}}</option>
             
            </select>
          </div>


          @endif

          <div class="form-group">
            <label for="usr">Tên loại hình khoáng sản <span style="color: red;">(*)</span></label>
            <input type="text" class="form-control" name="tenLoaiHinhKS" required="">
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

  
   @else
  <table class="table table-bordered">
  	<thead>
  		<tr>
  			<th>STT</th>
  			<th>TÊN LOẠI HÌNH KHOÁNG SẢN</th>
  			<th>NHÓM KHOÁNG SẢN</th>
  			<th>THAO TÁC</th>
  		</tr>
  	</thead>

    <tbody>

    	@foreach($loaihinhkhoangsans as $loaihinhkhoangsan)
    	<tr>
    		<td>{{$loop->index+1}}</td>
    		<td>{{$loaihinhkhoangsan->tenLoaiHinhKS}}</td>
    		<td>{{$loaihinhkhoangsan->nhomKhoangSan->tenNhomKS}}</td>
    		<td> 
    			<a title="Sửa" href="{{route('sualoaihinhkhoangsan',[$loaihinhkhoangsan->id])}}"><img alt="Sửa" src="public/anh/b_edit.png"></a>  
    			<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoaloaihinhkhoangsan',[$loaihinhkhoangsan->id])}}"><img alt="Xóa" src="public/anh/b_drop.png"></a>
    		</td>
    	</tr>
    	@endforeach
   
    </tbody>


  </table>
  {{ $loaihinhkhoangsans->links()}}


@endif

 
  


</div>


  @endsection