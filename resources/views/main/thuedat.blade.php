
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
  
<!--   <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get">
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Ngày tiếp nhận</label>
			<input type="date" class="form-control" id="usr">
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
 -->


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH TÌNH HÌNH THUÊ ĐẤT</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th >SỐ HĐTĐ</th>
    		<th>TÊN MỎ</th>
    		<th>SỐ GPKT</th>
    		
    		<th>NGÀY CẤP PHÉP</th>
    		<th>CƠ QUAN CẤP PHÉP</th>

    		<th>TỔ CHỨC THUÊ </th>
    		<th>NGÀY THUÊ ĐẤT</th>
    		<th>DIỆN TÍCH ĐẤT </th>
    		<th>CHI PHÍ (triệu)</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>

    	<tr>
    		<td>1</td>
    		<td>UBND-HD021</td>
    		<td>Mỏ đá vôi Lũng tém</td>
    		<td>UBND-GP0125</td>
    		<td>12/01/2010</td>
    		<td>UBND Tỉnh Lạng Sơn</td>
    		<td>Công ty TNHH Xuân Trường</td>
    		<td>12/01/2010</td>
    		<td>100 ha</td>
    		<td>5000</td>


    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>

    	  	<tr>
    		<td>1</td>
    		<td>UBND-HD021</td>
    		<td>Mỏ đá vôi Lũng tém</td>
    		<td>UBND-GP0125</td>
    		<td>12/01/2010</td>
    		<td>UBND Tỉnh Lạng Sơn</td>
    		<td>Công ty TNHH Xuân Trường</td>
    		<td>12/01/2010</td>
    		<td>100 ha</td>
    		<td>5000</td>


    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    	  	<tr>
    		<td>1</td>
    		<td>UBND-HD021</td>
    		<td>Mỏ đá vôi Lũng tém</td>
    		<td>UBND-GP0125</td>
    		<td>12/01/2010</td>
    		<td>UBND Tỉnh Lạng Sơn</td>
    		<td>Công ty TNHH Xuân Trường</td>
    		<td>12/01/2010</td>
    		<td>100 ha</td>
    		<td>5000</td>


    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>

    	  	<tr>
    		<td>1</td>
    		<td>UBND-HD021</td>
    		<td>Mỏ đá vôi Lũng tém</td>
    		<td>UBND-GP0125</td>
    		<td>12/01/2010</td>
    		<td>UBND Tỉnh Lạng Sơn</td>
    		<td>Công ty TNHH Xuân Trường</td>
    		<td>12/01/2010</td>
    		<td>100 ha</td>
    		<td>5000</td>


    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    	
      
    </tbody>
  </table>

  <a href="{{route('addhosothamdo')}}" style="float: right;" class="btn btn-info" role="button">Thêm hồ sơ</a>
</div>



  @endsection