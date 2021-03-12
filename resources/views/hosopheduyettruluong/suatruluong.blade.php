
 @extends('khoangsan.layout')

@section("content12")


<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	 <form action="{{route('suatruluongpost',[$hoSoCapPhepPheDuyetTruLuongBD->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			
			
			<div class="col-md-6" >
				<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin hồ sơ cấp phép thăm dò</h4>
				<div class="form-group">
					<label style="font-weight: bold; float:left; ">Hồ sơ cấp phép thăm dò <span style="color: red;">(*)</span></label>
					<select class="" style="width: 100%;"  name="id_giayPhepThamDo" id="states">
						<option value="">{{$hoSoCapPhepPheDuyetTruLuongBD->hoSoCapPhepthamdo->tenGiayPhep}}</option>
					</select>
			
				</div>


				<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
				</h4>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="usr">file giấy phép  </label>
						<input type="file" class="form-control" name="fileGiayPhep[]" multiple >
						<br>
						@foreach($filedinhkemgiaypheps as $filedinhkemgiayphep)
						<a href="public/tailieu/{{$filedinhkemgiayphep->tenFile}}"> {{$filedinhkemgiayphep->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
						@endforeach
                         
					</div>
					<div class="form-group col-md-6">
						<label for="usr">file bản đồ  </label>
						<input type="file" class="form-control" name="fileBanDo[]" multiple>
						<br>
						@foreach($filedinhkembandos as $filedinhkembando)
						<a href="public/tailieu/{{$filedinhkembando->tenFile}}"> {{$filedinhkembando->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a> 
						@endforeach
					</div>
				</div>





			</div>
			<div class="col-md-6" >
				<h4 style="padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin giấy phép</h4>
				<div class="row"> 
					<div class="form-group col-md-6">
						<label for="usr">Số giấy phép<span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="soGiayPhepPheDuyet" value="{{$hoSoCapPhepPheDuyetTruLuongBD->soGiayPhepPheDuyet}}" required="">
					</div>
					<div class="form-group col-md-6">
						<label for="usr">Ngày giấy phép<span style="color: red;">(*)</span> </label>
						<input type="date" class="form-control" name="ngayGiayPhep" value="{{$hoSoCapPhepPheDuyetTruLuongBD->ngayGiayPhep}}" required="">
					</div>
				</div>



				<div class="form-group">
					<label for="usr">Tên quyết định phê duyệt<span style="color: red;">(*)</span> </label>
					<input  type="text" class="form-control" name="tenGiayPhep" value="{{$hoSoCapPhepPheDuyetTruLuongBD->tenGiayPhep}}" required="">
				</div>
				<div class="row"> 
					<div class="form-group col-md-6">
						<label for="usr">Người ký <span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="nguoiKy" value="{{$hoSoCapPhepPheDuyetTruLuongBD->nguoiKy}}"  required="">
					</div>
					<div class="form-group col-md-6">
						<label style="font-weight: bold; float:left; ">Chức vụ</label>
						<select class="form-control" name="id_chucVu" id="dfd" required >
							<option value="{{$hoSoCapPhepPheDuyetTruLuongBD->chucvu->id}}">{{$hoSoCapPhepPheDuyetTruLuongBD->chucvu->tenChucVu}}</option>
							<option style="color: blue;" value="">Chọn chức vụ</option>
                             @foreach($chucVus as $chucVu)
								<option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
								@endforeach
						</select>
					</div>

				</div>
				<div class="row"> 
					<div class="form-group col-md-6">
						<label for="usr">Tổng trữ lượng <span style="color: red;">(*)</span> </label>
						<input type="number" step="0.01" class="form-control" value="{{$hoSoCapPhepPheDuyetTruLuongBD->tongTruLuong}}" name="tongTruLuong">
					</div>
					<div class="form-group col-md-6">
						<label style="font-weight: bold; float:left; ">Đơn vị </label>
							
						<select class="form-control" name="donVi" required >
							<option value="{{$hoSoCapPhepPheDuyetTruLuongBD->donVi}}">{{$hoSoCapPhepPheDuyetTruLuongBD->donVi}} </option>
							<option value="m3">m3 </option>
							<option value="tấn">tấn </option>
							<option value="tạ">tạ </option>
							<option value="kg">kg </option>

						</select>
					</div>
				</div>
				<br>
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>
			
			
			<!-- 
			<div class="row">
				<h4> CHỈNH SỬA FILE BẢN ĐỒ HỒ SƠ TRỮ LƯỢNG: {{$hoSoCapPhepPheDuyetTruLuongBD->hoSoCapPhepthamdo->duLieuMo->tenMo}}</h4>

				<div class="form-group col-md-6">
					<label for="usr">file bản đồ  </label>
					<input type="file" class="form-control" name="fileBanDo[]" multiple>
				</div>
			</div> -->
			

			
			</div>


		</form>
     

</div>



  @endsection








