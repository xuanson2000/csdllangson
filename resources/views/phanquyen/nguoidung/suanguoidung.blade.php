
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
  <h4>CẬP NHẬT NGƯỜI DÙNG </h4> 

<!-- The Modal  -->

        <!-- Modal body -->
        <div class="row modal-body" style="width: 60%;" >
  
          <form action="{{route('suanguoidungpost',[$nguoidung->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
             
        	<div class="form-group">
        			<label>Tên tài khoản</label>
        			<input class="form-control" name="username"  required="required" value="{{$nguoidung->username}}" />
        		</div>
          <!--   <div class="form-group">
              <label>Mật khẩu</label>
              <input class="form-control" name="password" type="password"  />
            </div> -->


        		<div class="form-group">
        			<label>Tên người dùng</label>
        			<input class="form-control" name="namclass" value="{{$nguoidung->namclass}}"  />
        		</div>

        		<div class="form-group">
        			<label>Ngày sinh</label>
        			
              <input type="date" class="form-control" name="ngaySinh" required=""  value="{{$nguoidung->ngaySinh}}">
        		</div>
            <div class="form-group">
              <label>Phòng ban</label>

              <select  class="form-control" name="phongBan"  required >
                	<option value="{{$nguoidung->phongban->id}}">{{$nguoidung->phongban->tenPhongBan}}</option>
              	<option value="">Chọn phòng ban</option>
              	@foreach($phongbans as $phongban)
              	<option value="{$phongban->id}}">{{$phongban->tenPhongBan}}</option>
              	@endforeach
              </select>

            </div>

            <div class="form-group">
              <label>Ảnh đại diện</label>
              <br>

              <img style="width:100px;" src="public/anh/{{$nguoidung->anh}}">
              <input type="file" name="image">

            </div>



            <div class="form-group">
              <?php 
                $quantrivaitro=DB::table('quantri_vaitro')->where('qt_id',$nguoidung->id)->first();
              ?>
             @foreach($vaitros as $vaitro)
             @if($vaitro ->id ==  $quantrivaitro->vt_id)
             <label class="col-md-4 form-check-label" for="check1">

              <input type="checkbox" class="form-check-input" id="check1" name="vaitro[]" value="{{$vaitro ->id}}"  checked>&nbsp  &nbsp{{$vaitro->name}} 
            </label>

            @else
            <label class="col-md-4 form-check-label" for="check1">
             <input type="checkbox" class="form-check-input" id="check1" name="vaitro[]" value="{{$vaitro ->id}}" >&nbsp &nbsp{{$vaitro ->name}}
           </label>
           @endif
            @endforeach
          </div>
        		<br>

            <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
             
          </form>

        </div>
        
      
       </div> 
    
  
 

  @endsection