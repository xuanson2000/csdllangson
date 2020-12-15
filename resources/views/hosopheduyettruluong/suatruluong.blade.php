
 @extends('khoangsan.layout')

@section("content12")


<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	 <form action="{{route('suatruluongpost',[$hoSoCapPhepPheDuyetTruLuongBD->id])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			
			

                    
				
				
					<div class="row">
						<h4> CHỈNH SỬA FILE BẢN ĐỒ HỒ SƠ TRỮ LƯỢNG: {{$hoSoCapPhepPheDuyetTruLuongBD->hoSoCapPhepthamdo->duLieuMo->tenMo}}</h4>
					
						<div class="form-group col-md-6">
							<label for="usr">file bản đồ  </label>
							<input type="file" class="form-control" name="fileBanDo[]" multiple>
						</div>
					</div>
			

				<br>
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>


		</form>
     

</div>



  @endsection








