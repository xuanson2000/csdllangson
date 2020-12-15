
 @extends('khoangsan.layout')

@section("content12")

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
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
 
</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

	  <h4>CHỈNH SỬA HỒ SƠ CẤP PHÉP KHAI THÁC: <span style="color: red;">Mỏ đá vôi Ao gươm</span>  </h4> 
     
	  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">
	<form action="" method="get">

		<div class="col-md-3 form-group" style="margin-left: 20px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Chọn loại chuyển đổi hồ sơ</label>
			<select class="form-control" name="phongban" id="idphongban" required >
				<option value="">Chon loại biến động</option>
				<option value="red">Chuyển nhượng khai thác</option>
				<option value="green">Gia hạn hồ sơ</option>
				<option value="blue">Trả lại Mỏ</option>
				<option value="black">Thu hồi mỏ</option>
			</select>
		</div>

<!-- 
	
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button> -->
	</form>
	
	
	
</div>


<div style="margin-top: 40px; padding: 20px 20px 20px 20px;" class="red box" >
	
	
		<div class="row">
			<label class="control-label col-sm-3 " for="email">Tên doanh nghiệp được chuyển nhượng</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Nhập Tên doanh nghiệp được chuyển nhượng tại đây" name="email">
			</div>
		</div>
		 <div class="row"style=" margin-top: 10px;">
		 <label class="control-label col-sm-3" for="email">Số giấy phép chuyển nhượng</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Nhập Số giấy phếp chuyển nhượng tại đây" name="email">
			</div>
		</div>
		 <div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3" for="email">Ngày giấy phép</label>
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


</div>

<div style="margin-top: 40px;" class="green box">
	

		<div class="row">
			<label class="control-label col-sm-3 " for="email">Thời gian gia hạn (Năm) </label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Nhập Thời gian gia hạn tại đây" name="email">
			</div>
		</div>
		 <div class="row"style=" margin-top: 10px;">
		 <label class="control-label col-sm-3" for="email">Ngày bắt đầu gia hạn</label>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="email" placeholder="Nhập Ngày bắt đầu gia hạn tại đây" name="email">
			</div>
		</div>

		 <div class="row"style=" margin-top: 10px;">
		 <label class="control-label col-sm-3" for="email">Số giấy phép gia hạn</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="email" placeholder="Nhập Số giấy phếp chuyển nhượng tại đây" name="email">
			</div>
		</div>
		 <div class="row" style=" margin-top: 10px;">
			<label class="control-label col-sm-3" for="email">Ngày giấy phép</label>
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

</div>

<div style="margin-top: 40px;" class="blue box">

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

</div>
<div style="margin-top: 40px;" class="black box">


	<div class="row" style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Ngày bắt đầu thu hồi</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="email" placeholder="Nhập NNgày bắt đầu thu hồi tại đây" name="email">
		</div>
	</div>
	
	<div class="row"style=" margin-top: 10px;">
		<label class="control-label col-sm-3" for="email">Số quyết định thu hồi Mỏ</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="email" placeholder="NhậpSố quyết định thu hồi Mỏ tại đây" name="email">
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

</div>

</div>



  @endsection








