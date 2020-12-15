
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

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="phongban" id="idphongban" required >
				<option value="">Chọn Quận/Huyện</option>
				<option value="">Huyện Kinh môn</option>
				<option value="">Chọn Tân tiến</option>
				<option value="">Chọn Thanh giang</option>
				<option value="">Chọn Giang kim</option>
			
			</select>
		</div>
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
			<select class="form-control" name="nam" id="idkhoa_bc" style="width: 230px;" required>
				<option value="">Chọn Xã/Phường</option>
				<option value="2015">Đồng Bành</option>
				<option value="2016">Đồng Mục</option>
				<option value="2017">Cao lỗ</option>
				<option value="2018">Yên Khê</option>
				<option value="2019">Tân tị</option>
			</select>
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form>
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH HỒ SƠN THĂM DÒ KHOÁNG SẢN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPTD</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Tên mỏ</th>
    		
    		<th>Vị trí hành chính</th>
    		<th>Diện tích thăm dò</th>
    		<th >Thời gian thăm dò</th>
    		<th>Chi tiết</th>
    		<th>Thao tác</th>
    	</tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1005/GP-UBND</td>
        <td>Công ty cổ phần Xi măng ACC 78</td>
        <td>Mỏ đá vôi Ao gươm</td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
        <td>6 Ha</td>
        <td>07/2010 - 09/2020</td>
         <td><a href="{{route('chitietthamdo')}}"  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>2</td>
        <td>26/GP-UBND</td>
        <td>Công ty cổ phần khai thác đá Đông Phong</td>
        <td>Mỏ đá vôi Lùng Hang</td>
        <td>Thị trấn Văn Quan-huyện Văn Quan-Lạng Sơn</td>
        <td>2,5 ha</td>
        <td>07/2016 - 03/2017</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>3</td>
        <td>09/GP-UBND</td>
        <td>Công ty TNHH Đá Tân Lang</td>
        <td>Mỏ đá vôi Lũng Vặm</td>
        <td>Xã Tân Lang -  huyện Văn Lãng -Lạng Sơn</td>
        <td>1 Ha</td>
        <td>03/2014 - 07/2014</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>4</td>
        <td>191/GP-UBND</td>
        <td>Doanh nghiệp tư nhân Châu Hậu</td>
        <td>Mỏ đá Lũng Phầy</td>
        <td>xã Chí Minh - huyện Tràng Định -Lạng Sơn</td>
        <td>7 Ha</td>
        <td>01/2010 - 04/2010</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>5</td>
        <td>31/GP-UBND</td>
        <td>Công ty TNHH Anh Thắng</td>
        <td>Mỏ đá vôi Nà Chiêm</td>
        <td>xã Tân Đoàn - huyện Văn Quan -Lạng Sơn</td>
        <td>5 Ha</td>
        <td>09/2015 - 05/2015</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>6</td>
        <td>1350/GP-UBND</td>
        <td>Công ty Cổ phần Võ Nói</td>
        <td>Mỏ đá vôi Hố Dùng</td>
        <td>xã Đồng Tân - huyện Hữu Lũng -Lạng Sơn</td>
        <td>6 Ha</td>
        <td>07/2009 - 09/2009</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>7</td>
        <td>1005/GP-UBND</td>
        <td>Công ty cổ phần Xi măng ACC 78</td>
        <td>Mỏ đá vôi Ao gươm</td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
        <td>6 Ha</td>
        <td>7/2010 - 9/2020</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>8</td>
        <td>1005/GP-UBND</td>
        <td>Công ty cổ phần Xi măng ACC 78</td>
        <td>Mỏ đá vôi Ao gươm</td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
        <td>6 Ha</td>
        <td>7/2010 - 9/2020</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
        <tr>
        <td>9</td>
        <td>1005/GP-UBND</td>
        <td>Công ty cổ phần Xi măng ACC 78</td>
        <td>Mỏ đá vôi Ao gươm</td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
        <td>6 Ha</td>
        <td>7/2010 - 9/2020</td>
         <td><a href=""  class="btn btn-primary"> <img src="public/anh/fsfsfsf.png"> Xem</a> </td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      
    </tbody>
  </table>

  <a href="{{route('addhosothamdo')}}" style="float: right;" class="btn btn-info" role="button">Thêm hồ sơ</a>
</div>



  


  @endsection


