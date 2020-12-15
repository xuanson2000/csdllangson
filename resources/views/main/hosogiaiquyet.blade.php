
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
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Ngày tiếp nhận</label>
			<input type="date" class="form-control" id="usr">
		</div>
	<!-- 	<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
			<select class="form-control" name="nam" id="idkhoa_bc" style="width: 230px;" required>
				<option value="">Chọn Xã/Phường</option>
				<option value="2015">Đồng Bành</option>
				<option value="2016">Đồng Mục</option>
				<option value="2017">Cao lỗ</option>
				<option value="2018">Yên Khê</option>
				<option value="2019">Tân tị</option>
			</select>
		</div> -->
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form>
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH HỒ SƠ TIẾP NHẬN GIẢI QUYẾT</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th style="width: 170px;">TÊN HỒ SƠ</th>
    		<th>NGÀY TIẾP NHẬN</th>
    		<th>TỔ CHỨC, CÁ NHÂN TRÌNH</th>
    		
    		<th>NGƯỜI TIẾP NHẬN</th>
    		<th>NGÀY TRẢ HỒ SƠ </th>

    		<th>FILE TRÌNH </th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>

    	<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    		<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    		<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    		<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    		<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    		<tr>
    		<td>1</td>
    		<td>Đơn trình thăm dò quặng Boxit Lũng tém</td>
    		<td>13/02/2020</td>
    		<td>Công ty TNHH Xi Măng ACC-78</td>
    		<td>Nguyễn Xuân Sơn</td>
    		<td>14/03/2020</td>

    		<td>Xem</td>
    	

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>

      
      
    </tbody>
  </table>

  <a href="{{route('addhosothamdo')}}" style="float: right;" class="btn btn-info" role="button">Thêm hồ sơ tiếp nhận</a>
</div>



  @endsection