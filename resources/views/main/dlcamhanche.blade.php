
 @extends('khoangsan.layout')

@section("content12")
<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 14px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  <h4>DỮ LIỆU VÙNG CẤM HẠN CHẾ</h4>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>KHU VỰC</th>
         <th>DIỆN TÍCH</th>
        <th>LÝ DO CẤM</th>
         <th>FILE BẢN ĐỒ</th>

          <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Điểm mangan Bản Rạ, xã Đàm Thủy, huyện Lũng Téng, tỉnh Lạng Sơn</td>
        <td>23.3 ha</td>
        <td>Khu bảo tồn Pia Oắc</td>
      
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

         <tr>
        <td>2</td>
        <td>Khu vực rừng phòng hộ xã Tân Hương huyện Bắc Sơn</td>
        <td>25 ha</td>
        <td>hạn chế khai thác</td>
      
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

         <tr>
        <td>3</td>
        <td>Khu vực Mỏ Bauxit Mỏ Cây</td>
        <td>10 ha</td>
        <td>Khu đất quốc phòng</td>
      
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         
      
    </tbody>
  </table>

  <a href="#" style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal">Thêm dữ liệu</a>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModalll">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm chức vụ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="form-group">
        		<label for="usr">Tên chức vụ</label>
        		<input type="text" class="form-control" id="usr">
        	</div>
        	<div class="form-group">
        		<label for="usr">Ghi chú</label>
        		<input type="text" class="form-control" id="usr">
        	</div>
        	<button type="button" class="btn btn-warning">Lưu lại</button>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>

  @endsection