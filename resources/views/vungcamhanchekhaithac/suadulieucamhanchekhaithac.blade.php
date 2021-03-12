
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
  
  <div class="row" style="padding: 10px 10px 10px 10px; margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: white; border: 1px solid #9695A8;">

        <form action="{{route('suadulieucamhanchekhaithacpost',[$KsVungCamHanCheedit->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
                      <div class="row">
             <div class="col-md-12">
             
             	<div class="form-group">
             		<label for="usr">Tên khu vực<span style="color: red;">(*)</span></label>

             		<input type="text" class="form-control" name="tenKhuVuc" required="" value="{{$KsVungCamHanCheedit->tenKhuVuc}}">
             	</div>

             	<div class="form-group">
             		<label style="font-weight: bold; float:left; ">Quận/huyện <span style="color: red;">(*)</span></label>
             		<select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen" required >
             			<option value="{{$KsVungCamHanCheedit->quanHuyen->id}}">{{$KsVungCamHanCheedit->quanHuyen->tenQuanHuyen}}</option>
             			<option value="">Chọn Quận/Huyện</option>
             			@foreach($quanHuyens as $quanHuyen)
             			<option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
             			@endforeach
             		</select>
             	</div>
             


             <div class="form-group">
               <label for="usr">Lý do cấm <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="lyDoCam" required="" value="{{$KsVungCamHanCheedit->lyDoCam}}">
             </div>

             <div class="form-group">
               <label for="usr">Diện tích cấm (ha)<span style="color: red;">(*)</span></label>
                
                 <input type="number"  step=0.01 class="form-control" name="dienTich" required="" value="{{$KsVungCamHanCheedit->dienTich}}">
              
             </div>

             <div class="form-group">
             	<label for="usr">file quyết định cấm </label>
             	<input type="file" class="form-control" name="fileGiayPhep[]" multiple  >
             </div>

            
          </div>

         <button style="float: right;margin-top: 30px; margin-right: 10px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
       </div>
   



</form> 

</div>
	
</div>

</div>



  @endsection


