
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

        <form action="{{route('suadulieuquyhoachkhaithacpost',[$quyHoachKhaiThacid->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
              <div class="col-md-8">
                
                <div class="form-group">
                <label for="usr">Số quyết định<span style="color: red;">(*)</span></label>
                <input type="text" class="form-control" name="soQuyetdinh" value="{{$quyHoachKhaiThacid->soQuyetdinh}}" required="">
              </div>

             
              


             <div class="form-group">
               <label for="usr">Tên quyết định <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="tenQuyHoach" value="{{$quyHoachKhaiThacid->tenQuyHoach}}" required="">
             </div>

              <div class="form-group">
               <label for="usr">Giai đoạn quy hoạch <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="giaiDoanQuyHoach" required="" value="{{$quyHoachKhaiThacid->giaiDoanQuyHoach}}">
             </div>

               <div class="form-group">
               <label for="usr">Phạm vi quy hoạch <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="phamViQuyHoach" required="" value="{{$quyHoachKhaiThacid->phamViQuyHoach}}">
             </div>


             <div class="form-group">
              <label for="usr">file đính kèm  </label>: 
              <a href="public/tailieu/{{$quyHoachKhaiThacid->file}}">   {{$quyHoachKhaiThacid->file}}</a>
              <input type="file" class="form-control" name="file" multiple >
             </div>

              </div>




            </div>
      <button style="float: right;margin-top: -30px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
    
   



</form> 

</div>
	
</div>

</div>



  @endsection


