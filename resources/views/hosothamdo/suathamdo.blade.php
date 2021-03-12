
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
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Chỉnh sửa hồ sơ cấp phép thăm dò khoáng sản</h4>
			<a href="{{route('thamdokhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>


		</div>
		<form action="{{route('suathamdopost',[$hoSoCapPhepthamdoBD->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="row" style="width: 98%; margin: 0 auto;">
				<div class="col-md-6" >
					<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin mỏ khoáng sản</h4>
					<div class="form-group">
						<label style="font-weight: bold; float:left; ">Mỏ khoáng sản <span style="color: red;">(*)</span></label>
						<select class="" style="width: 100%;"  name="id_mo" id="states" required  disabled="">
							<option value="">{{$hoSoCapPhepthamdoBD->duLieuMo->tenMo}}</option>
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
						<select  class="form-control" style="width: 100%;"  name="lanthamdo" id="states"   disabled="">
							<option value="">Lần {{$hoSoCapPhepthamdoBD->lanthamdo}}</option>
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
						<input type="text" class="form-control" name="tenDoanhNghiep" value="{{$hoSoCapPhepthamdoBD->doanhNghiep->tenDoanhNghiep}}" required="">
					</div>
					
					<div class="form-group">
						<label for="usr">Số điện thoại  </label>
						<input type="text" class="form-control" name="soDienThoai" value="{{$hoSoCapPhepthamdoBD->doanhNghiep->soDienThoai}}">
					</div>
					<div class="form-group">
						<label for="usr">Địa chỉ công ty</label>
						<textarea type="text" class="form-control" name="diaChi" >
							{{$hoSoCapPhepthamdoBD->doanhNghiep->diaChi}}
						</textarea>
					</div>

					<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
					</h4>
					<div class="row">
						<div class="form-group col-md-6">
						<label for="usr">file giấy phép  </label>
						<input type="file" class="form-control" name="fileGiayPhep[]" multiple >
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
							<label for="usr">Số giấy phép<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepThamDo" value="{{$hoSoCapPhepthamdoBD->soGiayPhepThamDo}}"required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày giấy phép<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngayGiayPhep" value="{{$hoSoCapPhepthamdoBD->ngayGiayPhep}}" required="">
						</div>
					</div>
                   


					 <div class="form-group">
						<label for="usr">Tên giấy phép<span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="tenGiayPhep" value="{{$hoSoCapPhepthamdoBD->tenGiayPhep}}" required="">
					</div>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Người ký <span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" value="{{$hoSoCapPhepthamdoBD->nguoiKy}}" name="nguoiKy">
						</div>
						<div class="form-group col-md-6">
							<label style="font-weight: bold; float:left; ">Chức vụ</label>
							<select class="form-control" name="id_chucVu" id="dfd" required >
								
								<option value="{{$hoSoCapPhepthamdoBD->chucVu->id}}">{{$hoSoCapPhepthamdoBD->chucVu->tenChucVu}}</option>
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
						<input type="number" step="0.01" class="form-control" name="dienTichThamDo" value="{{$hoSoCapPhepthamdoBD->dienTichThamDo}}" required="">
					</div>
					 <div class="form-group col-md-6">
						<label for="usr">Thời gian thăm dò (Tháng) <span style="color: red;">(*)</span>  </label>
						<input  type="number" step="0.01" class="form-control" name="thoiGianThamDo"  value="{{$hoSoCapPhepthamdoBD->thoiGianThamDo}}" required="">
					</div>
						</div>
					 <div class="form-group">
						<label for="usr">Phương pháp thăm dò  </label>
						<input type="text" class="form-control" name="phuongPhapThamDo" value="{{$hoSoCapPhepthamdoBD->phuongPhapThamDo}}">
					</div>
					
					 <div class="form-group">
						<label for="usr">Nguồn kinh phí </label>
						<input type="text" class="form-control" name="nguonKinhPhi" value="{{$hoSoCapPhepthamdoBD->nguonKinhPhi}}">
					</div>

					<div class="form-group">
						<p style="color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;"> Tọa độ thăm dò</p>

						@foreach($toaDoEdits as $toaDoEdit)

						<div class="row" style="margin-top: 10px;">
							<p  class="col-md-6">Tọa độ X:
								<input type="text"  name="{{$toaDoEdit->id}}X" value="{{$toaDoEdit->toadox}}"><br>  </p>
								<p class="col-md-6"> Tọa độ Y:
									<input type="text"  name="{{$toaDoEdit->id}}Y" value="{{$toaDoEdit->toadoy}}"><br>  </p>
								</div>

								@endforeach


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