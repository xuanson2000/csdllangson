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
@if(Session::has('messgthem'))
<div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
</div>
@endif



<div class="row" style="">

	<div class="col-md-10"><h4 style="margin-bottom: 20px; margin-top: 20px;">BÁO CÁO HOẠT ĐỘNG KHOÁNG SẢN HÀNG NĂM</h4></div>
	<div class="col-md-2"><button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModalthembaocaokhangsan"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button>
	</div>
</div>



<table  id="capphep"  class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
        <th>STT</th>
        <th>KÝ HIỆU MỎ</th>
        <th>TÊN MỎ</th>
        <th>NHÓM KHOÁNG SẢN</th>
        <th>LOẠI KHOÁNG SẢN</th>
        <th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>BÁO CÁO KHOÁNG SẢN</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($dulieumos as $dulieumo)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$dulieumo->kyHieuMo}}</td>
        <td>{{$dulieumo->tenMo}}</td>
        <td>{{$dulieumo->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
        <td>{{$dulieumo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
        <td>{{$dulieumo->xaPhuong->tenXaPhuong}} - {{$dulieumo->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn </td>
        

        <td><a href="{{route('chitietbaokhaothachangnam',[$dulieumo->id])}}" > Xem chi tiết</a></td>
        
      </tr>
      @endforeach  
   
      
    </tbody>
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

  <!-- Modal -->
  <div class="modal fade" id="myModalthembaocaokhangsan" role="dialog" >
  	<div class="modal-dialog"  style="width: 60%;">

  		<div class="row" style="background-color: #4276BB; width: 90%; margin: 0 auto;">
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Báo cáo hoạt động khai thác khoáng sản hàng năm</h4>
			
		</div>
		<form action="{{route('thembaocaokhaithachangnam')}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="row" style="width: 90%; margin: 0 auto; background-color: #E2EBFF;">
				<div class="col-md-12" >
					<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">-----------</h4>
					<div class="row"> 
						<div class="form-group col-md-4">
							<label for="usr">Năm báo cáo<span style="color: red;">(*)</span> </label>
							<input style="height: 28px;" type="double" class="form-control" name="nam">
						</div>
					<div class="form-group col-md-8">
						<label style="font-weight: bold; float:left; ">Hồ sơ cấp phép khai thác <span style="color: red;">(*)</span></label>
						<select class="" style="width: 100%; "  name="id_giayPhepKhaiThac" id="states" required >
							<option value="">Chọn hồ sơ</option>
							@foreach($hoSoCapPhepKhaiThacs as $hoSoCapPhepKhaiThac)
							<option value="{{$hoSoCapPhepKhaiThac ->id }}">{{$hoSoCapPhepKhaiThac ->tenGiayPhep }}</option>
							@endforeach
						</select>
						<script>

							$(document).ready(function() {
								$("#states").select2({
									placeholder: "Select a State",
									allowClear: true
								});
							});
						</script>
					</div>
					
					</div>
					<div class="row"> 
						<div class="form-group col-md-8">
							<label for="usr">Trữ lượng khai thác<span style="color: red;">(*)</span> </label>
							<input type="number" step=".01" class="form-control" name="truLuongKhaiThac">
						</div>
						<div class="form-group col-md-4">
							<label for="usr">Đơn vị<span style="color: red;">(*)</span> </label>
							<select  class="form-control" name="donVi"  onchange="myFunction(this)" required >
								<option value="">Chọn đơn vị</option>
								<option value="m3">m3</option>
								<option value="tấn">tấn</option>
								<option value="tạ">tạ</option>
                                 <option value="Kg">Kg</option>
							</select>
						</div>
					</div>
                   
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Thuế tài nguyên </label>
							<input type="number" step=".01" class="form-control" name="thueTaiNguyen">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Thuế GTGT </label>
							<input type="number" step=".01" class="form-control" name="thueGiaTriGiaTang">
						</div>
					</div>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Phí môi trường </label>
							<input type="number" step=".01" class="form-control" name="phiBaoVeMoiTruong">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Tiền thuê đất </label>
							<input type="number" step=".01" class="form-control" name="thueThueDat">
						</div>
					</div>

					<div class="form-group">
						<label>File đính kèm</label>

						<input type="file" name="image">


					</div>

					 
					
					
			

				<br>
				<button style="float: right; margin-top: 0px; margin-right: 20px; margin-bottom: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>


		</form>





  		<div class="modal-footer">
  			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  		</div>
  	</div>

    </div>
  </div>







@endsection