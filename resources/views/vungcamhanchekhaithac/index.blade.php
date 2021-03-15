
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72; ">

<div class="col-md-10"><h4 style="color: white;">DANH SÁCH DỮ LIỆU CẤM VÀ HẠN CHẾ KHAI THÁC</h4></div>
<div class="col-md-2"><button type="button" style="float: right;margin-bottom: 5px; margin-top: 10px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModaldulieucamhanche"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button></div>
	
	  <div class="modal fade" id="myModaldulieucamhanche">
      <div class="modal-dialog"style="width: 60%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dữ liệu vùng cấm hạn chế khai thác</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
          <form action="{{route('themdulieuvungcamhanche')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-12">
             
             	<div class="form-group">
             		<label for="usr">Tên khu vực<span style="color: red;">(*)</span></label>

             		<input type="text" class="form-control" name="tenKhuVuc" required="">
             	</div>

             	<div class="form-group">
             		<label style="font-weight: bold; float:left; ">Quận/huyện <span style="color: red;">(*)</span></label>
             		<select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen" required >
             			<option value="">Chọn Quận/Huyện</option>
             			@foreach($quanHuyens as $quanHuyen)
             			<option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
             			@endforeach
             		</select>
             	</div>
             


             <div class="form-group">
               <label for="usr">Lý do cấm <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="lyDoCam" required="">
             </div>

             <div class="form-group">
               <label for="usr">Diện tích cấm (ha)<span style="color: red;">(*)</span></label>
                
                 <input type="number"  step=0.01 class="form-control" name="dienTich" required="">
              
             </div>

             <div class="form-group">
             	<label for="usr">file quyết định cấm </label>
             	<input type="file" class="form-control" name="fileGiayPhep[]" multiple  =>
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
	
</div>




  @if(Session::has('messgthem'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
  </div>
  @endif

  @if(Session::has('messgsua'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('messgsua')}}
  </div>
  @endif 

  @if(Session::has('messgxoa'))

  <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 {{Session::get('messgxoa')}}</div>
 @endif

<div>
  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU CẤM VÀ HẠN CHẾ KHAI THÁC</h4>

<table  id="capphep"  class="display">
    <thead>
      <tr style="background-color: #AAC1C6;">
      	<th>STT</th>
      	<th style="width: 170px;">TÊN KHU VỰC</th>
      	<th>VỊ TRÍ HÀNH CHÍNH</th>
      	<th>DIỆN TÍCH (Ha)</th>      	
      	<th>LÝ DO CẤM</th>
      	<th>FILE ĐÍNH KÈM</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      @foreach($controllerKsVungCamHanChes as $controllerKsVungCamHanChe)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$controllerKsVungCamHanChe->tenKhuVuc}}</td>
        <td> {{$controllerKsVungCamHanChe->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn</td>
        <td>{{$controllerKsVungCamHanChe->dienTich}}</td>
        
        <td>{{$controllerKsVungCamHanChe->lyDoCam}}</td>
          <?php  

        $filedinhkemgiaypheps =App\fileDinhKemGiayPhep::where('id_HoSo',$controllerKsVungCamHanChe->id)->where('id_loaiHoSo','222')->get();
          ?>   
          <td>
          	@foreach($filedinhkemgiaypheps as $filedinhkemgiayphep)
          	<a href="public/tailieu/{{$filedinhkemgiayphep->tenFile}}"> {{$filedinhkemgiayphep->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
          	@endforeach
          </td>

        <td> 
          <a title="Sửa" href="{{route('suadulieucamhanchekhaithac',[$controllerKsVungCamHanChe->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          <a title="xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoadulieucamhanchekhaithac',[$controllerKsVungCamHanChe->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>

        </td>
      </tr>
      @endforeach  
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>

    </tfoot>
    

  </table>
<script>

  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#capphep tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#capphep').DataTable({
      initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
              var that = this;
              
              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                  .search( this.value )
                  .draw();
                }
              } );
            } );
          }
        });
    
  } );


</script>
<style type="text/css">

  tfoot input {
    width: 100%;
    
  }
   tfoot {
        display: table-header-group;
    }

</style>

</div>

</div>



  @endsection

  