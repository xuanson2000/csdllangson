
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get" >



		<div class="col-md-8 form-group" style="margin-left: -8px;  margin-top: 10px; padding-left: 20px;">
      <h4 style=" color: white; ">DỮ LIỆU ĐIỀU TRA ĐÁNH GIÁ KHOÁNG SẢN</h4>
	
		</div>

		

    <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModaldulieudieutraks"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button>

	</form>
	
	  <div class="modal fade" id="myModaldulieudieutraks">
      <div class="modal-dialog"style="width: 80%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dữ liệu mỏ khoáng sản</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body"  >
          <form action="{{route('themdulieudieutradanhgiaks')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-4">
             
              <div class="form-group">
               <label for="usr">Tên báo cáo  <span style="color: red;">(*)</span></label>
              
                 <textarea type="text" rows="4" class="form-control" name="tenBaoCao" required="">
                 	 </textarea>
             </div>
             <div class="form-group">
               <label for="usr">Năm báo cáo <span style="color: red;">(*)</span></label>
               <input type="number" class="form-control" name="nam" required="">
             </div>
             <div class="form-group">
               <label for="usr">Đơn vị thành lập báo cáo <span style="color: red;">(*)</span></label>
                
                 <input type="text" class="form-control" name="tenDoanhNghiep" required="">
              
             </div>
             <div class="form-group">
               <label for="usr">Chủ nhiệm báo cáo<span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="chuNhiem" required="">
             </div>

            <div class="form-group">
              <label for="usr">Số ký quyết định phê duyệt</label>
              <input type="text" class="form-control" name="soQuyetDinhPheDuyet" required="">
            </div>
          </div>


          <div class="col-md-4">





          	<div class="form-group">
          		<label for="usr">Số ký hiệu lưu trữ</label>
          		<input type="text" class="form-control" name="soKyHieuLuuTru" required="">
          	</div>
          	<div class="form-group">
          		<label for="usr">Mức độ điều tra</label>
          		<input type="text" class="form-control" name="mucDo" required="">
          	</div>


          	<div class="form-group">
          		<label for="usr">Diện tích thực hiện (ha) <span style="color: red;">(*)</span></label>
          		<input type="number"  step="0.01" class="form-control" name="dienTichThucHien" required="">
          	</div>

          	<div class="form-group">
               <label for="usr">Ghi chú <span style="color: red;">(*)</span></label>
              
                 <textarea type="text" class="form-control" name="ghiChu" required="">
                 	 </textarea>
             </div>

            <div class="form-group">
              <label for="usr">file giấy phép  </label>
              <input type="file" class="form-control" name="fileGiayPhep[]" multiple  >
            </div>

          </div>
        <div class="col-md-4">
     
      	
						
						
      
         </div>
      

  
    </div>
      <button style="float: right;margin-top: -30px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
    
   



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

  @if(Session::has('messgsua'))

  <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 {{Session::get('messgsua')}}</div>
 @endif

 <div style="margin-top: 10px;">
    <table id="idfff"  class="table table-bordered"  >
     <thead>
       <tr style="background-color: #AAC1C6;">
        <th style="width: 100px;">SỐ QĐPD</th> 
        <th style="width: 300px;">TÊN BÁO CÁO</th>
        <th>NĂM BÁO CÁO</th>
        <th style="width: 200px;">ĐƠN VỊ THÀNH LẬP</th>
        <th style="width: 70px;">CHI TIẾT</th>
        <th style="width:70px;">THAO TÁC</th>
      </tr>
    </thead>

    <tbody>

      @foreach($duLieuDieuTraDanhGiaKhoangSans as $duLieuDieuTraDanhGiaKhoangSan)
      <tr>
        <td>{{$duLieuDieuTraDanhGiaKhoangSan->soQuyetDinhPheDuyet}}</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSan->tenBaoCao}}</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSan->nam}}</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSan->tenDoanhNghiep}}</td>
        <td><a href="{{route('chitietdieutrakhoangsan',[$duLieuDieuTraDanhGiaKhoangSan->id])}}" > XEM</a></td>
        <td>
          <a title="Sửa" href="{{route('suadulieudieutrakhoangsan',[$duLieuDieuTraDanhGiaKhoangSan->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          / <a title="xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href="{{route('xoadulieudieutrakhoangsan',[$duLieuDieuTraDanhGiaKhoangSan->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>

      </tr>
      @endforeach  

    </tbody>
    <tfoot >
    <tr>
      <th style="color: blue;"></th>
      <th style="color: blue;" ></th>
      <th style="color: blue;"></th>
      <th style="color: blue;"></th>
      <th style="color: blue;"> </th>
      <th style="color: blue;"> </th>
     

            </tr>
  </tfoot>

  </table>
 </div>



    


</div>

<style type="text/css">

  tfoot input {
    width: 100%;
    
  }
   tfoot {
        display: table-header-group;
    }

</style>
<script>
  
</script>

<script>


  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#idfff tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Tìm kiếm '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#idfff').DataTable({
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


  @endsection

