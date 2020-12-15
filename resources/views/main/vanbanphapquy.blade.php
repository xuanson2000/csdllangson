
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
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Ngày văn bản</label>
			<input type="date" class="form-control" id="usr">
		</div>
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Loại văn bản </label>
			<select class="form-control" name="nam" id="idkhoa_bc" style="width: 230px;" required>
				<option value="">Chọn loại văn bản</option>
				<option value="2015">Chỉ thị</option>
				<option value="2015">Công Văn </option>
			</select>
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form>
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH VĂN BẢN CHỈ ĐẠO</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th style="width: 170px;">SỐ KÝ HIỆU</th>
    		<th>NGÀY BAN HÀNH</th>
    		<th>CƠ QUAN BAN HÀNH</th>
    		<th>NGƯỜI KÝ</th>
    		
    		<th style="width:260px; ">NỘI DUNG</th>
    		<th>FILE VĂN BẢN</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>

    	<tr>
    		<td>1</td>
    		<td>601/QĐ-BTNMT </td>
    		<td>10/03/2020</td>
    		<td>Bộ Tài nguyên và Môi trường</td>
    		<td>Nguyễn Thị Phương Hoa</td>
    		<td>Về việc phê duyệt Kế hoạch tuyển dụng viên chức năm 2020 của Viện Khoa học tài nguyên nước</td>
    		<td>Tải về</td>
    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    	

    		<tr>
    		<td>2</td>
    		<td>1215/BTNMT-TĐKTTT </td>
    		<td>10/03/2020</td>
    		<td>Bộ Tài nguyên và Môi trường</td>
    		<td>Trần Hồng Hà</td>
    		<td>Tuyên truyền, truyền thông về tài nguyên và môi trường năm 2020</td>
    		<td>Tải về</td>
    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>
    	

      
      
    </tbody>
  </table>

  <a href="{{route('addhosothamdo')}}" style="float: right;" class="btn btn-info" role="button">Thêm văn bản chỉ đạo</a>
</div>



  @endsection