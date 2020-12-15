
 @extends('khoangsan.layout')

@section("content12")

<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
    font-size: 13px;
  }
  
  td{
    font-family: "Times New Roman", Times, serif;
    font-size: 14px;
  }

</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get" >



		<div class="col-md-8 form-group" style="margin-left: -8px;  margin-top: 10px; padding-left: 20px;">
      <h4 style="font-weight: bold; color: white; " >DANH SÁCH HỢP ĐỒNG THUÊ ĐẤT KHOÁNG SẢN</h4>
	
		</div>

		

    <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModaldulieudieutraks"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button>

	</form>
	
	  <div class="modal fade" id="myModaldulieudieutraks">
      <div class="modal-dialog"style="width: 60%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dữ liệu hợp đồng thuê đất</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body"  >
          <form action="{{route('themhopdongthuedat')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">

             <div class="col-md-12">
              <div class="form-group ">
                <label style="font-weight: bold; float:left; ">Hồ sơ cấp phép khai thác <span style="color: red;">(*)</span></label>
                <select class="" style="width: 100%; "  name="id_hosocapphepkhaithac" id="states" required >
                  <option value="">Chọn hồ sơ</option>
                  @foreach($hoSoCapPhepKhaiThacs as $hoSoCapPhepKhaiThac)
                  @if($hoSoCapPhepKhaiThac->lancapphep==1)
                  <option value="{{$hoSoCapPhepKhaiThac->id}}">{{$hoSoCapPhepKhaiThac ->tenGiayPhep}}
                  </option>
                  @else
                  <option  value="{{$hoSoCapPhepKhaiThac->id}}"> <h1> Khai thác lần {{$hoSoCapPhepKhaiThac->lancapphep}} - {{$hoSoCapPhepKhaiThac ->tenGiayPhep}}</h1> 
                  </option>
                  @endif
                  @endforeach
                </select>
                <script>

                  $(document).ready(function(){
                    $("#states").select2({
                      placeholder: "Select a State",
                      allowClear: true
                    });
                  });
                </script>
              </div>



             
              <div class="form-group">
               <label for="usr">Số hợp đồng thuê đất <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="soHopDong" required="">
             </div>

             <div class="form-group">
               <label for="usr">Ngày thuê đất <span style="color: red;">(*)</span></label>
               <input type="date" class="form-control" name="ngayThue" required="">
             </div>

             <div class="form-group">
              <label for="usr">Thời hạn thuê (năm)<span style="color: red;">(*)</span></label>

               <input type="number" class="form-control" name="thoiGianThue" required="">

             </div>

             <div class="form-group">
               <label for="usr">Diện tích thuê (ha)<span style="color: red;">(*)</span></label>
                
                 <input type="number" class="form-control" name="dienTich" required="">
              
             </div>

             <div class="form-group">
               <label for="usr">Tiền thuê đất (VNĐ)<span style="color: red;">(*)</span></label>
               <input type="number" class="form-control" name="chiPhi" required="">
             </div>


             <div class="form-group">
              <label for="usr">file hợp đồng thuê đất</label>
              <input type="file" name="image">
            </div>

          </div>
          <div class="form-group" style="float: right; margin-right: 10px;">
            <button  type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
          </div>

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
    <table id="hopdongthuedat"  class="display"  >
     <thead>
       <tr style="background-color: #AAC1C6;">
        <th>SỐ HĐTĐ</th> 
        <th >TÊN MỎ</th>
        <th>DOANH NGHIỆP</th>
        <th>NGÀY THUÊ</th>
        <th>DIỆN TÍCH THUÊ</th>
        <th>SỐ TIỀN THUÊ </th>
          <th>File </th>
   
        <th style="width:70px;">THAO TÁC</th>
      </tr>
    </thead>

    <tbody>

      @foreach($hopdongthuedats as $hopdongthuedat)
      <tr>
      	<td>{{$hopdongthuedat->soHopDong}}</td>
      	<td>{{$hopdongthuedat->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
      	<td>{{$hopdongthuedat->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
      	<td>{{$hopdongthuedat->ngayThue}}</td>
      	<td>{{$hopdongthuedat->dienTich}} ha</td>
      	<td>{{$hopdongthuedat->chiPhi}} VNĐ</td>
        <td><a href="public/tailieu/{{$hopdongthuedat->file}}"> {{$hopdongthuedat->file}}</a> </td>
      	<td>
       
          <a title="Sửa" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          / <a title="xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"  href=""> <i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>

      </tr>
      @endforeach  

    </tbody>
  <tfoot >
    <tr>
      <th style="color: blue;">số quyết định</th>
      <th style="color: blue;" >tên báo cáo</th>
      <th style="color: blue;"></th>
      <th style="color: blue;"></th>
      <th style="color: blue;"> </th>
      <th style="color: blue;"> </th>
      <th style="color: blue;"></th>
         <th style="color: blue;"></th>
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
    $('#hopdongthuedat tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Tìm kiếm '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#hopdongthuedat').DataTable({
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

