
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
  <h4>CẬP NHẬT CƠ QUAN CẤP PHÉP</h4> 

<!-- The Modal -->

        <!-- Modal body -->
        <div class="row modal-body" style="width: 60%;" >
  
          <form action="{{route('suacoquancappheppost',[$coQuanCapPhepid->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            

              <div class="form-group">
               <label for="usr">Tên cơ quan cấp phép  <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="tenCoQuan" required="" value="{{$coQuanCapPhepid->tenCoQuan}}">
             </div>
        		<div class="form-group">
        			<label for="usr">Ghi chú</label>
        			<input type="text" class="form-control" name="ghiChu" value="{{$coQuanCapPhepid->ghiChu}}">
        		</div>


            <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
             
          </form>

        </div>
        
      
       </div> 
    
  
 

  @endsection