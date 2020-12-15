
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



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU ĐIỀU TRA KHOÁNG SẢN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th style="width: 170px;">TÊN BÁO CÁO</th>
    		<th>NĂM BÁO CÁO</th>
    		<th>CHỦ NHIỆM</th>
    		
    		<th>ĐƠN VỊ THÀNH LẬP</th>
    		<th>MỨC ĐỘ ĐIỀU TRA </th>
        <th>KÝ HIỆU LƯU TRỮ </th>
        <th>SỐ QĐPD </th>
        <th>DIỆN TÍCH </th>
        <th>DỰ TOÁN </th>
        <th>FILE  </th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Điều tra đánh giá khoáng sản Barit và chì kẽm vùng Bản Bó</td>
        <td>2010</td>
        <td>Nguyễn Xuân Sơn</td>
        <td>Công ty TNHH Lạng sơn</td>
        
        <td>Toàn diện</td>
          <td>CK222</td>
          <td>QĐ/TNMT</td>
          <td>26.5 ha</td>
          <td>25.000</td>
          <td>Xem</td>
        
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Điều tra đánh giá khoáng sản Barit và chì kẽm vùng Bản Bó</td>
        <td>2010</td>
        <td>Nguyễn Xuân Sơn</td>
        <td>Công ty TNHH Trường Mai</td>
        
        <td>Toàn diện</td>
        <td>CK222</td>
        <td>QĐ/TNMT</td>
        <td>26.5 ha</td>
        <td>25.000</td>
        <td>Xem</td>
        
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

         <tr>
        <td>3</td>
        <td>Điều tra, Đánh giá chì kẽm và khoáng sản khác khu Đồng Mỏ-Chi Lăng</td>
        <td>2005</td>
        <td>Nguyễn Việt Hùng</td>
        <td>Cục Địa chất và Khoáng Sản</td>
        
        <td>Toàn diện</td>
        <td>DT01</td>
        <td>QĐ/TNMT</td>
        <td>23</td>
        <td>200000</td>
        <td>Xem</td>
        
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
           <tr>
        <td>4</td>
        <td>Điều tra, đánh giá triển vọng quặng vàng gốc vùng quặng Bình Gia-Lạng Sơn</td>
        <td>1993</td>
        <td>Mai Thế Truyền</td>
        <td>Cục Địa chất và Khoáng Sản</td>
        
        <td>Toàn diện</td>
        <td>DT02</td>
        <td>QĐ/TNMT</td>
        <td>35</td>
        <td>300000</td>
        <td>Xem</td>
        
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
           <tr>
        <td>5</td>
        <td>Điều tra, Tìm kiếm phosphorit vùng Hữu Lũng Lạng Sơn</td>
        <td>Võ Quang Đạt</td>
        <td>Mai Thế Truyền</td>
        <td>Cục Địa chất và Khoáng Sản</td>
        
        <td>Toàn diện</td>
        <td>DT02</td>
        <td>QĐ/TNMT</td>
        <td>35</td>
        <td>300000</td>
        <td>Xem</td>
        
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

      
      
    </tbody>
  </table>

  <a href="{{route('addhosothamdo')}}" style="float: right;" class="btn btn-info" role="button">Thêm dữ liệu</a>
</div>



  @endsection