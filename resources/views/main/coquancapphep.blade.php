
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
  <h4>CẬP NHẬT CƠ QUAN CẤP PHÉP</h4>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>TÊN CƠ QUAN CẤP PHÉP</th>
        <th>GHI CHÚ</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Bộ Tài nguyên và Môi trường</td>
        <td></td>
        <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Bộ Nông nghiệp và Phát triển nông thôn</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Ủy ban nhân Tỉnh Lạng sơn</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Sở Tài nguyên và Môi trường tỉnh Lạng Sơn</td>
        <td></td>
          <td> <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
   
    </tbody>
  </table>

  <a href="#" style="float: right;" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal">Thêm cơ quan cấp phép</a>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm cơ quan cấp phép</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="form-group">
        		<label for="usr">Tên cơ quan cấp phép</label>
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