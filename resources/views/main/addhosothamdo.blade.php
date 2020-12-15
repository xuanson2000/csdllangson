
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%; overflow-y:auto; max-height: 500px;">
  <div class="row"> <h4 style="margin-left: 15px; font-weight: bold;">THÊM MỚI HỒ SƠ THĂM DÒ KHOÁNG SẢN</h4> </div>
 <div style="font-weight: bold; color: white; background-color: #3EC1EC; padding: 10px 10px 10px 10px;" class="col-md-9"> THÔNG TIN DOANH NGHIỆP</div>
 <div class="row">
  <div class=" form-group col-md-8">
    <label for="usr">Tên doanh nghiệp</label>
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group  col-md-8">
    <label for="pwd">Người đại diện pháp luật</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group  col-md-8">
    <label for="pwd">Địa chỉ doanh nghiệp</label>
    <input type="password" class="form-control" id="pwd">
  </div>
    <div class="form-group  col-md-8">
    <label for="pwd">Địa chỉ liên hệ</label>
    <input type="password" class="form-control" id="pwd">
  </div>
</div>


 <div style="font-weight: bold; color: white; background-color: #3EC1EC; padding: 10px 10px 10px 10px;" class="col-md-9"> THÔNG TIN MỎ</div>
 <div class="row">
<div class="form-group  col-md-8">
  <label for="usr">Tên mỏ thăm dò</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Vị trí hành chính</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Diện tích thăm dò</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Loại hình khoáng sản thăm dò</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Thời gian thăm dò</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Trữ lượng thăm dò</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Ngồn kinh phí</label>
  <input type="password" class="form-control" id="pwd">
</div>
<div class="form-group col-md-8">
  <label for="pwd">Hình thức thăm dò</label>
  <input type="password" class="form-control" id="pwd">
</div>
</div>
 <div style="font-weight: bold; color: white; background-color: #3EC1EC; padding: 10px 10px 10px 10px;" class="col-md-9" > THÔNG TIN GIẤY PHÉP</div>
 
 <div class="row">
   <div class="form-group col-md-8">
    <label for="usr">Số giấy phép</label>
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group col-md-8">
    <label for="pwd">Tên giấy phép</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group col-md-8">
    <label for="pwd">Ngày giấy phép</label>
    <input type="password" class="form-control" id="pwd">
  </div>
   <div class="form-group col-md-8">
    <label for="pwd">Người ký</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group col-md-8">
    <label for="pwd">Chức vụ</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group col-md-8">
    <label for="pwd">Tệp file đính kèm</label>
    <input type="file" class="form-control-file border" name="file">
   
  </div>
</div>

 <button style="float: right;" type="button" class="btn btn-success">Lưu lại</button>



</div>


  @endsection