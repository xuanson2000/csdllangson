
 @extends('khoangsan.layout')

@section("content12")


<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	 <form action="{{route('suahosokhaithacpost',[$hoSoCapPhepKhaiThacBD->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			
			<div class="col-md-6" >
					<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Hồ sơ phê duyệt trữ lượng</h4>
					<div class="form-group">
						<label style="font-weight: bold; float:left; ">Hồ sơ phê duyệt trữ lượng <span style="color: red;">(*)</span></label>
						<select class="" style="width: 100%;"  name="id_hoSoCapPhepPheDuyetTruLuong" id="states" >
							
							<option value="">{{$hoSoCapPhepKhaiThacBD->hoSoCapPhepPheDuyetTruLuong->tenGiayPhep}}</option>
					


						</select>
						
					</div>
					<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin giấy phép</h4>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Số giấy phép<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepKhaiThac"  value="{{$hoSoCapPhepKhaiThacBD->soGiayPhepKhaiThac}}" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày giấy phép<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngaygiayphep" value="{{$hoSoCapPhepKhaiThacBD->ngaygiayphep}}" required="">
						</div>
					</div>
                   
					 <div class="form-group">
						<label for="usr">Tên giấy phép<span style="color: red;">(*)</span> </label>
						<input type="text" class="form-control" name="tenGiayPhep" value="{{$hoSoCapPhepKhaiThacBD->tenGiayPhep}}" required="">
					</div>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Người ký <span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="nguoiKy" value="{{$hoSoCapPhepKhaiThacBD->nguoiKy}}" required="">
						</div>
						<div class="form-group col-md-6">
							<label style="font-weight: bold; float:left; ">Chức vụ</label>
							<select class="form-control" name="id_chucVu" id="dfd" required >

								<option value="{{$hoSoCapPhepKhaiThacBD->chucvu->id}}">{{$hoSoCapPhepKhaiThacBD->chucvu->tenChucVu}}</option>
								<option value="">Chọn chức vụ</option>
							  	@foreach($chucVus as $chucVu)
								<option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
								@endforeach
							</select>
						</div>

					</div>
					<div class="form-group">
						<label for="usr">Thời gian cấp phép khai thác (năm) <span style="color: red;">(*)</span> </label>
						<input type="float" class="form-control" name="thoigiancapphepkhaithac" value="{{$hoSoCapPhepKhaiThacBD->thoigiancapphepkhaithac}}" required="">
					</div>
					
			

				</div>
				<div class="col-md-6" >
					<div class="row" style="margin-top: 5px;"> 
						<div class="form-group col-md-4">

							<label for="usr">Trữ lượng địa chất <span style="color: red;">(*)</span>  </label>
							<input type="text" class="form-control" name="truLuongDiaChat" value="{{$hoSoCapPhepKhaiThacBD->truLuongDiaChat}}" required="">

						</div>
						
						<div class="form-group col-md-4">
							<label for="usr">Trữ lượng khai thác <span style="color: red;">(*)</span> </label>
							<input type="float" class="form-control" name="truLuongKhaiThac" value="{{$hoSoCapPhepKhaiThacBD->truLuongKhaiThac}}" required="">
						</div>
						<div class="form-group col-md-4">
							<label for="usr">Đơn vị  </label>
							<select  class="form-control" name="donVi"  onchange="myFunction(this)" required >
								<option value="{{$hoSoCapPhepKhaiThacBD->donVi}}">{{$hoSoCapPhepKhaiThacBD->donVi}}</option>
								<option value="">Chọn đơn vị</option>
								<option value="m3">m3</option>
								<option value="tấn">tấn</option>

							</select>
							<script>
								function myFunction(selTag) {
									var x = selTag.options[selTag.selectedIndex].text;
									document.getElementById("demo").innerHTML = x;
								}
							</script>
						</div>
						
					</div>

					<div class="row"> 
						<div class="form-group col-md-12">

							<label for="usr">Công suất khai thác <span id="demo"></span>/năm <span style="color: red;">(*)</span></label>
							<input type="number" class="form-control" name="congSuatKhaiThac" value="{{$hoSoCapPhepKhaiThacBD->congSuatKhaiThac}}" required="">

						</div>
					
						
					
					</div>


					
					<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
					</h4>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="usr">file giấy phép  </label>
							<input type="file" class="form-control" name="fileGiayPhep[]" multiple>
                        <br>
                        @foreach($filedinhkemgiaypheps as $filedinhkemgiayphepold)
                        <a href="public/tailieu/{{$filedinhkemgiayphepold->tenFile}}"> {{$filedinhkemgiayphepold->tenFile}} <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
                        @endforeach

						</div>
						<div class="form-group col-md-6">
							<label for="usr">file bản đồ  </label>
							<input type="file" class="form-control" name="fileBanDo[]" multiple>
							<br>
							@foreach($filedinhkembandos as $filedinhkembandoold)
							<a href="public/tailieu/{{$filedinhkembandoold->tenFile}}"> {{$filedinhkembandoold->tenFile}} <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
							@endforeach
						</div>
					</div>
					
				</div>


                    
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>


		</form>

</div>



  @endsection








