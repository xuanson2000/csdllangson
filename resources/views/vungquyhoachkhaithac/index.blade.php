
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




	
	  <div class="modal fade" id="myModaldulieucamhanche">
      <div class="modal-dialog"style="width: 60%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dữ liệu vùng quy hoạch khai thác</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
          <form action="{{route('themdulieuvungquyhoach')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-12">
             
             	<div class="form-group">
             		<label for="usr">Số quyết định<span style="color: red;">(*)</span></label>

             		<input type="text" class="form-control" name="soQuyetdinh" required="">
             	</div>

             
             	


             <div class="form-group">
               <label for="usr">Tên quyết định <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="tenQuyHoach" required="">
             </div>

              <div class="form-group">
               <label for="usr">Giai đoạn quy hoạch <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="giaiDoanQuyHoach" required="">
             </div>

               <div class="form-group">
               <label for="usr">Phạm vi quy hoạch <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="phamViQuyHoach" required="">
             </div>


             <div class="form-group">
             	<label for="usr">file giấy phép  </label>
             	<input type="file" class="form-control" name="file" multiple >
             </div>

            
          </div>


          <button style="float: right; margin-right: 15px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
  
    </div>
      
    
   
</form> 


</div>

<!-- Modal footer -->


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

 
<div class="row">
	<div class="col-md-9"><h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU VÙNG QUY HOACH KHAI THÁC</h4></div>
	<div class="col-md-3"> <button style="float: right; height: 30px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModaldulieucamhanche"> <i class="fa fa-plus-square" aria-hidden="true"></i>  Thêm mới</button></div>
</div>
  
 

<table class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
      	<th>STT</th>
      	<th style="">Số QĐPD</th>
      	<th style="width: 300px;" >TÊN QUYẾT ĐỊNH</th>
      	<th>GIAI ĐOẠN QH</th>      	
      	<th  style="width: 300px;">PHẠM VI QUY HOẠCH</th>
      	<th>FILE ĐÍNH KÈM</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      @foreach($quyHoachKhaiThacs as $quyHoachKhaiThac)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$quyHoachKhaiThac->soQuyetdinh}}</td>
         <td>{{$quyHoachKhaiThac->tenQuyHoach}}</td>
        <td>{{$quyHoachKhaiThac->giaiDoanQuyHoach}}</td>
        <td>{{$quyHoachKhaiThac->phamViQuyHoach}}</td>
        
        <td><a href="public/tailieu/{{$quyHoachKhaiThac->file}}">{{$quyHoachKhaiThac->file}}</a> </td>
         
    
        <td> 
          <a title="Sửa" href="{{route('suadulieuquyhoachkhaithac',[$quyHoachKhaiThac->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          <a title="xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoadulieuquyhoachkhaithac',[$quyHoachKhaiThac->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>

        </td>
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