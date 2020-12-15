
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



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU ĐÓNG CỬA MỎ KHOÁNG SẢN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>TÊN MỎ</th>
    		<th>NHÓM KHOÁNG SẢN</th>
    		<th>KÍ HIỆU KHOÁNG SẢN</th>
    		
    		<th>LOẠI KHOÁNG SẢN</th>
    		<th>VỊ TRÍ HÀNH CHÍNH</th>
      
        <th>CHI TIẾT</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mỏ Đá vôi Lũng Téng</td>
        <td>Đá vôi</td>
        <td>DV</td>
        <td>Đá </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
       
        <td><a href=""  data-toggle="modal" data-target="#myModal" > XEM</a></td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         <tr>
        <td>2</td>
        <td>Mỏ Sắt Đông Bành</td>
        <td>Đá vôi</td>
        <td>DV</td>
        <td>Đá </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>

        <td><a href=""> XEM</a></td>

        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         
   
      
    </tbody>
  </table>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
          <table class="table table-dark">
            <thead>
              <tr>
                <th>Thuộc tính</th>
                <th>Giá trị</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tên mỏ</td>
                <td>Mỏ Đá vôi Lũng Téng</td>
                
              </tr>
              <tr>
                <td>Vị trí hành chính</td>
                <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
                
              </tr>
              <tr>
                <td>Vị trí tọa độ</td>
                <td>Góc 1 : X:1202120 Y:01021521 <br>
                     Góc 2 : X:1202120 Y:01021521 <br>
                     Góc 3 : X:1202120 Y:01021521 <br>
                     Góc 4 : X:1202120 Y:01021521 <br>
                </td>
                
              </tr>
              <tr>
                <td>Nhóm khoáng sản</td>
                <td>Đá</td>
                
              </tr>
              <tr>
                <td>Ký hiệu khoáng sản</td>
                <td>DV</td>
                
              </tr>
               <tr><td>
               Loại khoáng sản</td>
                <td>Đá vôi</td>
                
              </tr>
              <tr><td>Trữ lượng</td>
                <td>50.000 Tấn</td>
                
              </tr>

              <tr>
                <td>Lý do</td>
                <td>Đã khai thác hết</td>
                
              </tr>
              
            </tbody>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>

  <a href="" style="float: right;" class="btn btn-info" role="button">Thêm dữ liệu</a>
</div>



  @endsection