
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


	<div class="model">
		<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
			<h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Chỉnh sửa dữ liệu: {{$duLieuMo->tenMo}}</h4>
			<a href="{{route('dlmo')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>
		</div>
		<div class="row" style="width: 95%; background-color: #F0F4F5; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">


			<div class="tab-content" style="padding: 10px 10px 10px 50px;" >
				<div class="col-md-6">
					<form action="{{route('xoadulieumo',[$duLieuMo->id])}}" method="POST" enctype="multipart/form-data">
						<input type="hidden"  name="_token" value="{{csrf_token()}}" >
						<div class=" form-group">
							<label style="font-weight: bold; float:left; color: blue; ">Phương thức chỉnh sửa</label><br>
							<Select id="colorselector" class=" form-control" name="phuongThuc" required="">
								<option style="font-weight: bold;" value="">Chọn phương thức chỉnh sửa</option>
								<option style=" color: red;" value="1">Xóa dữ liệu mỏ khỏi hệ thống</option>
								<option style="color: blue;" value="0">Đóng cửa mỏ khoáng sản</option>

							</Select>
						</div>
						<div id="1" class="colors" style="display:none">



						 </div>

						<div id="0" class="colors" style="display:none" > 
										<div class="form-group">
								<label for="usr">Số quyết định đóng mỏ<span style="color: red;">(*)</span></label>
								<input type="text" class="form-control" name="soQuyetDinhDongMo" required="">
							</div>

							<div class="form-group">
								<label for="usr">Ngày quyết định<span style="color: red;">(*)</span></label>
								<input type="date" class="form-control" name="ngayThuHoi" required="">
							</div>
							<div class="form-group">
								<label for="usr">Người ký<span style="color: red;">(*)</span></label>
								<input type="text" class="form-control" name="nguoiKy" required="">
							</div>
							<div class="form-group">
								<label style="font-weight: bold; float:left; ">Chức vụ <span style="color: red;">(*)</span></label>
								<select class="form-control" name="id_chucVu" id="" required >
									<option value="">Chọn chức vụ </option>
									@foreach($chucVus as $chucVu)
									<option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="usr">file giấy phép  </label>
								<input type="file" class="form-control" name="fileGiayPhep" multiple >
							</div>
							<div class="form-group">
								<label for="usr">Lý do</label>
								<textarea  type="text" class="form-control" name="lyDo" required="">
								</textarea>
							</div>
						</div>
						<button style="margin-top: 20px; float: right;"  type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
					</form>
			    </div>

				<script >
					$(function() {
						$('#colorselector').change(function(){
							$('.colors').hide();
							$('#' + $(this).val()).show();
						});
					});
				</script>



			</div>
		</div>
	</div>
</div>


  @endsection