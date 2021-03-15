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


	<div class="modell">
		<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm hồ sơ cấp phép thăm dò khoáng sản</h4>
			<a href="{{route('thamdokhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>


		</div>
		<form action="{{route('themhosothamdopost')}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="row" style="width: 98%; margin: 0 auto;">
				<div class="col-md-6" >
					<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin mỏ khoáng sản</h4>
					<div class="form-group">
						<label style="font-weight: bold; float:left; ">Mỏ khoáng sản <span style="color: red;">(*)</span></label>
						<select class="" style="width: 100%;"  name="id_mo" id="states" required >
							<option value="">Chọn mỏ</option>
							@foreach($duLieuMos as $duLieuMo)
							<option value="{{$duLieuMo ->id }}">{{$duLieuMo ->tenMo }}</option>
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
					<div class="form-group">
						<label for="usr">Lần thăm dò <span style="color: red;">(*)</span></label>
						<select  class="form-control" style="width: 100%;"  name="lanthamdo" id="states" required >
							<option value="">Chọn lần thăm dò</option>
							<option value="1">Lần 1</option>
							<option value="2">Lần 2</option>
							<option value="3">Lần 3</option>
							<option value="4">Lần 4</option>
							<option value="5">Lần 5</option>
						</select>

					</div>


					<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin doanh nghiệp
					</h4>
					<div class="form-group">
						<label for="usr">Tên doanh nghiệp  <span style="color: red;">(*)</span></label>
						<input type="text" class="form-control" name="tenDoanhNghiep" required="">
					</div>
					
					<div class="form-group">
						<label for="usr">Số điện thoại  </label>
						<input type="text" class="form-control" name="soDienThoai">
					</div>
					<div class="form-group">
						<label for="usr">Địa chỉ công ty</label>
						<textarea type="text" class="form-control" name="diaChi" >
						</textarea>
					</div>

					<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
					</h4>
					<div class="row">
						<div class="form-group col-md-6">
						<label for="usr">file giấy phép  </label>
						<input type="file" class="form-control" name="fileGiayPhep[]" multiple required="">
					</div>
					<div class="form-group col-md-6">
						<label for="usr">file bản đồ  </label>
						<input type="file" class="form-control" name="fileBanDo[]" multiple>
					</div>
					</div>
					


				</div>
				<div class="col-md-6" >
					<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin giấy phép</h4>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Số giấy phép thăm dò<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepThamDo" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày cấp phép thăm dò<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngayGiayPhep" required="">
						</div>
					</div>
                   


					 <div class="form-group">
						<label for="usr">Tên giấy phép thăm dò<span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="tenGiayPhep" required="">
					</div>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Người ký <span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="nguoiKy">
						</div>
						<div class="form-group col-md-6">
							<label style="font-weight: bold; float:left; ">Chức vụ</label>
							<select class="form-control" name="id_chucVu" id="dfd" required >
								<option value="">Chọn chức vụ</option>
								@foreach($chucVus as $chucVu)
								<option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
								@endforeach
							</select>
						</div>

					</div>
					<div class="row"> 
					 <div class="form-group col-md-6">
						<label for="usr">Diện tích thăm dò (ha) <span style="color: red;">(*)</span> </label>
						<input type="number" step="0.01" class="form-control" name="dienTichThamDo" required="">
					</div>
					 <div class="form-group col-md-6">
						<label for="usr">Thời gian thăm dò (Tháng) <span style="color: red;">(*)</span>  </label>
						<input  type="number" step="0.01" class="form-control" name="thoiGianThamDo" required="">
					</div>
						</div>
					 <div class="form-group">
						<label for="usr">Phương pháp thăm dò  </label>
						<input type="text" class="form-control" name="phuongPhapThamDo">
					</div>
					
					 <div class="form-group">
						<label for="usr">Nguồn kinh phí </label>
						<input type="text" class="form-control" name="nguonKinhPhi">
					</div>

					<div class="form-group">
						<div class="col-md-6"><label for="usr">Tọa độ thăm dò </label></div>
						<div class="col-md-6"><button id="a" type="button" class="btn btn-primary">Thêm tọa 
						độ góc mỏ</button>
					    </div> 
					</div>
						
					<div class="row" style="margin-top: 20px;">
						<p id="toadox" class="col-md-6" style="margin-top: 10px;"> </p> 
						<p id="toadoy" class="col-md-6" style="margin-top: 10px;"> </p>
					</div>
					<script>
						$(document).ready(function(){
							$("#a").click(function(){
								$("#toadox").append(' Tọa độ X:<input type="text"  name="toadox[]"><br>');
							});
						});

						$(document).ready(function(){
							$("#a").click(function(){
								$("#toadoy").append(' Tọa độ Y:<input type="text"  name="toadoy[]"><br>');
							});
						});
					</script>

					</div>



				</div>


				<br>
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>


		</form>




		
	</div>
	
</div>


</div>



@endsection