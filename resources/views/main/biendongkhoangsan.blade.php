
 @extends('khoangsan.layout')

@section("content12")
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get">
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr">
		</div>

<!-- 		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="phongban" id="idphongban" required >
				<option value="">Chọn Quận/Huyện</option>
				<option value="">Huyện Kinh môn</option>
				<option value="">Chọn Tân tiến</option>
				<option value="">Chọn Thanh giang</option>
				<option value="">Chọn Giang kim</option>
			
			</select>
		</div> -->
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Loại hồ sơ</label>
			<select class="form-control" name="nam" id="idkhoa_bc" style="width: 230px;" required>
				<option value="">Chọn loại hồ sơ</option>
				<option value="2015">Hồ sơ Gia Hạn</option>
				<option value="2016">Hồ sơ Trả lại</option>
				<option value="2017">Hồ sơ Thu hồi</option>
				<option value="2018">Hồ sơ Chuyển nhượng</option>
			
			</select>
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form>
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH HỒ SƠ KHOÁNG SẢN BIẾN ĐỘNG</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKT</th>
    		<th>Tên doanh ghiệp</th>
    		<th>Tên mỏ</th>
    		
    		<th>Vị trí hành chính</th>
    		<th>Diện tích khai thác</th>
    		<th>Loại hình</th>
    		<th>Chi tiết</th>
    		<th>Thao tác</th>
    	</tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1256/GP-UBND</td>
        <td>Doanh nghiệp tư nhân Hoàng Lan</td>
        <td>Mỏ Chằm mỏ phiếu</td>
        <td>Xã yên vượng, huyện hữu lũng -Lạng Sơn</td>
        <td>12.5 Ha</td>
        <td>Thu hồi</td>
         <td><a href="{{route('chitietkhaithac')}}"  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        
  
      
    </tbody>
  </table>


</div>



  @endsection