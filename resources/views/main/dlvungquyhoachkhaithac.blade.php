
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
  <h4>DỮ LIỆU QUY HOẠCH KHOÁNG SẢN</h4>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>SỐ QHKS</th>
        <th>LOẠI KHOÁNG SẢN</th>
        <th>TÊN QUY HOẠCH</th>
        <th>LOẠI HÌNH QUY HOẠCH</th>
         <th>FILE</th>
          <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>204/1942008</td>
        <td>Khoáng sản kim loại</td>
        <td>Quy hoạch thăm dò, khai thác và sử dụng khoáng sản Bauxit và chì kẽm</td>
         <td>Trung ương</td>
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

       <tr>
         <td>2</td>
        <td>UBND/01</td>
        <td>Đá vôi</td>
        <td>Quy hoạch thăm dò, khai thác, sử dụng khoáng sản làm vật liệu xây dựng thông thường tỉnh Lạng Sơn đến năm 2020, tầm nhìn đến năm 2030</td>
        <td>Trung ương</td>
        
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

      <tr>
        <td>3</td>
        <td>UBND/02</td>
        <td>Chì Kẽm</td>
        <td>Quy hoạch phân vùng điều tra, thăm dò, khai thác, chế biến và sử dụng quặng chì kẽm giai đoạn 2004¸2010 có xét đến năm 2020</td>
        <td>UBND TỈNH</td>
        <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

      <tr>
        <td>4</td>
        <td>UBND/03</td>
        <td>Bauxit</td>
        <td>Quy hoạch thăm dò, khai thác và sử dụng khoáng sản Bauxit Bản Lỏng</td>
        <td>UBND TỈNH</td>
        <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>

        <tr>
        <td>5</td>
        <td>UBND/04</td>
        <td>Vàng</td>
        <td>Quy hoạch thăm dò, khai thác và sử dụng khoáng sản Vàng gôc Khau Lum</td>
         <td>UBND TỈNH</td>
         <td>Xem</td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      
    </tbody>
  </table>

  <a href="#" style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal">Thêm dữ liệu</a>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal12">
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