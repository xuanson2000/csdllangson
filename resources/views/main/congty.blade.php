
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
  <h4>CẬP NHẬT LOẠI HÌNH DOANH NGHIỆP</h4>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>LOẠI HÌNH DOANH NGHIỆP</th>
        <th>GHI CHÚ</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Công ty TNNH 1 thành viên</td>
        <td></td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Công ty TNNH 2 thành viên</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Công ty Cổ phần</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Doanh nghiệp tư nhân</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
    </tbody>
  </table>

  <a href="#" style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal">Thêm loại hình DN</a>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm loại hình doanh nghiệp</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="form-group">
        		<label for="usr">Tên loại hình doanh nghiệp</label>
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