
 @extends('khoangsan.layout')

@section("content12")

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $('#myselection').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});
</script>
<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 16px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 .myDiv{
	display:none;
}  

 
</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	 
     
	  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get">

		<div class="col-md-6 form-group" style="margin-left: 20px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8; font-size: 15px;">CHỈNH SỬA HỒ SƠ CẤP PHÉP KHAI THÁC: <span style="color: #FFBD06;">{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</label>
			<select id="myselection" class="form-control" required >
				<option value="">Chon loại biến động</option>
				<option value="One">Chuyển nhượng khai thác</option>
				<option value="Five">Điều chỉnh khai thác</option>
				<option value="Two">Gia hạn hồ sơ</option>
				<!-- <option value="Three">Trả lại Mỏ</option> -->
				<option value="For">Thu hồi mỏ</option>

			</select>
		</div>

	</form>
	
	
	
</div>


<div style="padding:20px 20px 20px 20px;"  id="showOne" class="myDiv">
	
	<form action="{{route('chuyendoikhaithacdoanhnghiep',[$idhosokhaithac])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >

 
	<div class="row" style="width: 98%; margin: 0 auto;">
		<div class="col-md-6" >

			<div class="row">
				<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin doanh nghiệp
				</h4>
				<label class="control-label col-sm-12 " for="email">Tên doanh nghiệp được chuyển nhượng</label>
				<div class="col-sm-12">
					<input type="text" class="form-control"  placeholder="Nhập Tên doanh nghiệp được chuyển nhượng tại đây" name="tenDoanhNghiep">
				</div>
			</div>
	
			<div class="row"style=" margin-top: 10px;">
				<label class="control-label col-sm-12 " for="email">Số điện thoại</label>
				<div class="col-sm-12">
					<input type="text" class="form-control"  placeholder="Nhập Số điện thoại  tại đây" name="soDienThoai">
				</div>
			</div>
			<div class="row" style=" margin-top: 10px;">
				<label class="control-label col-sm-12 " for="email">Địa chỉ doanh nghiệp</label>
				<div class="col-sm-12">
					<input type="text" class="form-control"  placeholder="Nhập Địa chỉ doanh nghiệp tại đây" name="diaChi">
				</div>
			</div>
			<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
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

					<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin giấy phép khai thác chuyển nhượng</h4>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Số giấy phép<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepKhaiThac" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày giấy phép<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngayGiayPhep" required="">
						</div>
					</div>

					<div class="form-group">
						<label for="usr">Tên giấy phép<span style="color: red;">(*)</span> </label>
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
					<div class="form-group">
						<label for="usr">Thời gian cấp phép khai thác (năm) <span style="color: red;">(*)</span> </label>
						<input type="float" class="form-control" name="thoigiancapphepkhaithac" required="">
					</div>

					<div class="row" style="margin-top: 5px;"> 
						<div class="form-group col-md-4">

							<label for="usr">Trữ lượng địa chất <span style="color: red;">(*)</span>  </label>
							<input type="text" class="form-control" name="truLuongDiaChat" required="">

						</div>
						
						<div class="form-group col-md-4">
							<label for="usr">Trữ lượng khai thác <span style="color: red;">(*)</span> </label>
							<input type="float" class="form-control" name="truLuongKhaiThac" required="">
						</div>
						<div class="form-group col-md-4">
							<label for="usr">Đơn vị  </label>
							<select  class="form-control" name="donVi"  onchange="myFunction(this)" required >
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
							<input type="number" class="form-control" name="congSuatKhaiThac" required="">

						</div>
					
						
					
					</div>


					
				
					
				</div>

				<br>
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>
		</form>

</div>


<div style="margin-top: 40px; padding:50px 20px 20px 20px;"  id="showFive" class="myDiv">
	
	<form action="{{route('dieuchinhkhaithac',[$idhosokhaithac])}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
			<div class="row" style="width: 98%; margin: 0 auto;">
				<div class="col-md-6" >
					
				
					<h4 style="margin-top: 20px; padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">Thông tin giấy phép khai thác điều chỉnh</h4>
					<div class="row"> 
						<div class="form-group col-md-6">
							<label for="usr">Số giấy phép<span style="color: red;">(*)</span> </label>
							<input type="text" class="form-control" name="soGiayPhepKhaiThac" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="usr">Ngày giấy phép<span style="color: red;">(*)</span> </label>
							<input type="date" class="form-control" name="ngayGiayPhep" required="">
						</div>
					</div>
                   
					 <div class="form-group">
						<label for="usr">Tên giấy phép<span style="color: red;">(*)</span> </label>
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
					<div class="form-group">
						<label for="usr">Thời gian cấp phép khai thác (năm) <span style="color: red;">(*)</span> </label>
						<input type="float" class="form-control" name="thoigiancapphepkhaithac" required="">
					</div>
					
				

					
					


				</div>
				<div class="col-md-6" >
					<div class="row" style="margin-top: 5px;"> 
						<div class="form-group col-md-4">

							<label for="usr">Trữ lượng địa chất <span style="color: red;">(*)</span>  </label>
							<input type="text" class="form-control" name="truLuongDiaChat" required="">

						</div>
						
						<div class="form-group col-md-4">
							<label for="usr">Trữ lượng khai thác <span style="color: red;">(*)</span> </label>
							<input type="float" class="form-control" name="truLuongKhaiThac" required="">
						</div>
						<div class="form-group col-md-4">
							<label for="usr">Đơn vị  </label>
							<select  class="form-control" name="donVi"  onchange="myFunction(this)" required >
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
							<input type="number" class="form-control" name="congSuatKhaiThac" required="">

						</div>
					
						
					
					</div>


					
					<h4 style=" padding: 7px 7px 7px 7px; background-color: #8F8A9A;color: white;">file đính kèm
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

				<br>
				<button style="float: right; margin-top: 10px; margin-right: 20px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
			</div>


		</form>

</div>




<div style="margin-top: 40px;" id="showTwo" class="myDiv">
	
	<form action="{{route('chuyendoikhaithacgiahan')}}" method="POST" enctype="multipart/form-data">
			<input type="hidden"  name="_token" value="{{csrf_token()}}" >
	
		 <div class="row"style=" margin-top: 10px;">
		 <label class="control-label col-sm-3" for="email">Số giấy phép gia hạn</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Nhập Số giấy phếp chuyển nhượng tại đây" name="soGiayPhep">
			</div>
		</div>
		 <div class="row"style=" margin-top: 10px;">
		 <label class="control-label col-sm-3" for="email">Ngày giấy phép</label>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="email" placeholder="Nhập Ngày bắt đầu gia hạn tại đây" name="ngayGiayPhep">
			</div>
		</div>

			<div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3 " for="email">Thời gian gia hạn (Năm) </label>
			<div class="col-sm-8">
				<input type="number" class="form-control" id="email" placeholder="Nhập Thời gian gia hạn tại đây" name="thoiGianGiaHan">
			</div>
		</div>
		

		<div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3">Người ký <span style="color: red;">(*)</span> </label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="nguoiKy" placeholder="Nhập Người ký tại đây">
			</div>
		</div>
		<div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3">Chức vụ <span style="color: red;">(*)</span> </label>
			<div class="col-sm-8">
					<select class="form-control" name="id_chucVu" required >
					<option value="">Chọn chức vụ</option>
					@foreach($chucVus as $chucVu)
					<option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
					@endforeach
				</select>
			</div>
		</div>

		  <div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3" >File đính kèm</label>
			<div class="col-sm-8">
				<input type="file" class="form-control" name="fileGiayPhep[]" multiple >
			</div>
		</div>


		<button style="margin-top: 35px; float: right;" type="submit" class="btn btn-primary"> Lưu lại</button>
</form>
</div>

<!-- <div style="margin-top: 40px;" id="showThree" class="myDiv">

	<form action="{{route('chuyendoikhaithactramo')}}" method="POST" enctype="multipart/form-data">
		<input type="hidden"  name="_token" value="{{csrf_token()}}" >
	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Ngày trả lại Mỏ</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="email" placeholder="Nhập Ngày trả lại Mỏ tại đây" name="email">
		</div>
	</div>
	
	<div class="row"style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Số quyết định trả lại Mỏ</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="email" placeholder="NhậpSố quyết định trả lại Mỏ tại đây" name="email">
		</div>
	</div>
	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Ngày quyết định</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="email" placeholder="Nhập Ngày giấy phép tại đây" name="email">
		</div>
	</div>



	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Cơ quan phê duyệt</label>
		<div class="col-sm-8">
			<select class="form-control" name="phongban" id="idphongban" required >
				<option value="">Chọn cơ quan phê duyệt</option>
				<option value="red">Bộ Tài nguyên và Môi trường</option>
				<option value="green">Bộ Nông nghiệp và Phát triển nông thôn</option>
				<option value="blue">Sở Tài nguyên và Môi trường</option>
				
			</select>
		</div>
	</div>


	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">File đính kèm</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="email" placeholder="Nhập File đính kèm tại đây" name="email">
		</div>
	</div>

	<button style="margin-top: 35px; float: right;" type="submit" class="btn btn-primary"> Lưu lại</button>
</form>
</div>
 -->
<div style="margin-top: 40px;" id="showFor" class="myDiv">
	<form action="{{route('chuyendoikhaithacthuhoi',[$idhosokhaithac])}}" method="POST" enctype="multipart/form-data">


		<input type="hidden"  name="_token" value="{{csrf_token()}}" >


	<div class="row"style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Số quyết định thu hồi mỏ</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="email" placeholder="Nhập Số quyết định thu hồi Mỏ tại đây" name="soquyetdinh">
		</div>
	</div>
	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Ngày quyết định</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="email" placeholder="Nhập Ngày bắt đầu thu hồi tại đây" name="ngayquyetdinh">
		</div>
	</div>
	

	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Lý do thu hồi</label>
		<div class="col-sm-8">
			
		  <textarea class="form-control" rows="5" name="lydo"></textarea>
		</div>
	</div>






	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">File đính kèm</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="email" placeholder="Nhập File đính kèm tại đây" name="file">
		</div>
	</div>

	<button style="margin-top: 35px; float: right;" type="submit" class="btn btn-primary"> Lưu lại</button>
</form>
</div>



</div>



  @endsection








