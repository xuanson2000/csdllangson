
@extends('khoangsan.layout')

@section("content12")

<style type="text/css">
  th.td{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 13px;
  vertical-align: middle;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 15px;

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


  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH KHAI NỘP NGÂN SÁCH NHÀ NƯỚC</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr>
    		<th class="td">STT</th>
    		<th class="td">TÊN MỎ</th>
    		<th class="td" >SỐ GPKT</th>
    		<th class="td" >NGÀY CẤP</th>
    		<th class="td" >LOẠI KHOÁNG SẢN</th>
    		<th class="td">CƠ QUAN CẤP PHÉP</th>
    		<th class="td">THỜI HẠN</th>
    		<th class="td">DIỆN TÍCH </th>
    		<th class="td">TRỮ LƯỢNG </th>
    		<th class="td">DOANH NGHIỆP </th>
    		<th class="td">TIỀN CẤP QUYỀN (triệu)</th>
    		<th class="td"> NỘP NGÂN SÁCH HÀNG NĂM</th>
    		<th class="td">THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>

    	<tr>
    		<td>1</td>
    		<td>MỎ KIM LOẠI BẢN HO</td>
    		<td>GP5653</td>
    		<td>12/12/2012</td>
    		<td>Kim Loại</td>
    		<td>UBND Tỉnh Lạng Sơn</td>
    		<td>5 Năm</td>
    		<td>5 ha</td>
    		<td>50.000</td>
    		<td>Công ty TNHH Xuân Trường</td>
    		<td>3000</td>
            <td> <a class="btn" data-toggle="modal" data-target="#myModal" >Chi tiết</a> </td>

    		<td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
    	</tr>

    	
      
    </tbody>


  </table>

      <div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog modal-lg" style="width: 80%;">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">KẾT QUẢ NỘP NGÂN SÁCH HÀNG NĂM</h4>
    			</div>
    			<div class="modal-body">
                  <button style="float: right; margin-bottom: 10px;" type="button" class="btn btn-primary">Thêm mới </button>
    				<table class="table table-bordered">
    					<thead>
    						<tr>
    							<th>STT</th>
    							<th>Năm</th>
    							<th>Thuế tài nguyên (Triệu đồng)</th>
    							<th>Phí bảo vệ môi trường  (Triệu đồng)</th>
    							<th>Tiền ký quỹ phục hồi môi trường  (Triệu đồng)</th>
    							<th>Thuế giá trị gia tăng  (Triệu đồng)</th>
    							<th>Thuế thu nhập doanh nghiệp  (Triệu đồng)</th>
    							<th>Thuế thuê đất  (Triệu đồng)</th>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td>1</td>
    							<td>2012</td>
    							<td>22</td>
    							<td>30</td>
    							<td>45</td>
    							<td>50</td>
    							<td>12</td>
    							<td>10</td>
    							
    						</tr>
    							<tr>
    							<td>1</td>
    							<td>2013</td>
    							<td>22</td>
    							<td>30</td>
    							<td>45</td>
    							<td>50</td>
    							<td>12</td>
    							<td>10</td>
    							
    						</tr>
    						
    					</tbody>
    				</table>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    			</div>
    		</div>
    	</div>
    </div>

  <a href="" style="float: right;" class="btn btn-info" role="button">Thêm hồ sơ</a>
</div>



  @endsection