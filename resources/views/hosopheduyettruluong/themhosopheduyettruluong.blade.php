
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
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm hồ sơ phê duyệt trữ lượng khoáng sản</h4>
			<a href="{{route('truluongkhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i>
			</a>

		</div>
		<form action="{{route('themhosopheduyettruluongpost')}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="row" style="width: 98%; margin: 0 auto;">
				<div class="col-md-6" >
					<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin hồ sơ cấp phép thăm dò</h4>
					<div class="form-group">
						<label style="font-weight: bold; float:left; ">Hồ sơ cấp phép thăm dò <span style="color: red;">(*)</span></label>
						<select class="" style="width: 100%;"  name="id_giayPhepThamDo" id="states" required >
							<option value="">Chọn hồ sơ</option>
							@foreach($hoSoCapPhepthamdos as $hoSoCapPhepthamdo)
								@if($hoSoCapPhepthamdo->lanthamdo ==1)
								<option value="{{$hoSoCapPhepthamdo->id}}">{{$hoSoCapPhepthamdo ->tenGiayPhep}}
								</option>
								@else
								<option style="color: red;" value="{{$hoSoCapPhepthamdo->id}}">Thăm dò lần {{$hoSoCapPhepthamdo ->lanthamdo}} - {{$hoSoCapPhepthamdo ->tenGiayPhep}} 
								</option>
								@endif

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


				<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
					</h4>
					<div class="row">
						<div class="form-group col-md-6">
						<label for="usr">file quyết định phê duyệt  </label>
						<input type="file" class="form-control" name="fileGiayPhep[]" multiple required="">
					</div>
					<div class="form-group col-md-6">
						<label for="usr">file bản đồ  </label>
						<input type="file" class="form-control" name="fileBanDo[]" multiple>
					</div>
					</div>

					
					


				</div>
				<div class="col-md-6" >
					<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin quyết định phê duyệt trữ lượng</h4>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Số quyết định phê duyệt trữ lượng<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepPheDuyet" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày quyết định<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngayGiayPhep" required="">
						</div>
					</div>
                   


					 <div class="form-group">
						<label for="usr">Tên quyết định phê duyệt<span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="tenGiayPhep" required="">
					</div>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Người ký <span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="nguoiKy" required="">
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
							<label for="usr">Tổng trữ lượng <span style="color: red;">(*)</span> </label>
							<input type="number" step="0.01" class="form-control" name="tongTruLuong">
						</div>
						<div class="form-group col-md-6">
							<label style="font-weight: bold; float:left; ">Đơn vị </label>
							<select class="form-control" name="donVi" required >
								<option value="m3">m3 </option>
								<option value="tấn">tấn </option>
								<option value="tạ">tạ </option>
								<option value="kg">kg </option>

							</select>
						</div>
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