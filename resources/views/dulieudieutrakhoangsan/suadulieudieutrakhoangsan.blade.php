
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
  
  <div class="row" style="padding: 10px 10px 10px 10px; margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: white; border: 1px solid #9695A8;">

        <form action="{{route('suadulieudieutrakhoangsanpost',[$duLieuDieuTraDanhGiaKhoangSanEdit->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-4">
             
              <div class="form-group">
               <label for="usr">Tên báo cáo <span style="color: red;">(*)</span></label>
              
                 <textarea type="text" class="form-control" name="tenBaoCao" rows="4" required="" >{{$duLieuDieuTraDanhGiaKhoangSanEdit->tenBaoCao}}
                   </textarea>
             </div>
             <div class="form-group">
               <label for="usr">Năm báo cáo <span style="color: red;">(*)</span></label>
               <input type="number" class="form-control" name="nam" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->nam}}"/>
             </div>
             <div class="form-group">
               <label for="usr">Đơn vị thành lập báo cáo <span style="color: red;">(*)</span></label>
                
                 <input type="text" class="form-control" name="tenDoanhNghiep" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->tenDoanhNghiep}}">
              
             </div>
             <div class="form-group">
               <label for="usr">Chủ nhiệm báo cáo<span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="chuNhiem" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->chuNhiem}}">
             </div>

            <div class="form-group">
              <label for="usr">Số ký quyết định phê duyệt</label>
              <input type="text" class="form-control" name="soQuyetDinhPheDuyet" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->soQuyetDinhPheDuyet}}">
            </div>
          </div>


          <div class="col-md-4">





            <div class="form-group">
              <label for="usr">Số ký hiệu lưu trữ</label>
              <input type="text" class="form-control" name="soKyHieuLuuTru" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->soKyHieuLuuTru}}">
            </div>
            <div class="form-group">
              <label for="usr">Mức độ điều tra</label>
              <input type="text" class="form-control" name="mucDo" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->mucDo}}">
            </div>


            <div class="form-group">
              <label for="usr">Diện tích thực hiện (ha) <span style="color: red;">(*)</span></label>
              <input type="number"  step="0.01" class="form-control" name="dienTichThucHien" required="" value="{{$duLieuDieuTraDanhGiaKhoangSanEdit->dienTichThucHien}}">
            </div>

            <div class="form-group">
               <label for="usr">Ghi chú <span style="color: red;">(*)</span></label>
              
                 <textarea type="text" class="form-control" name="ghiChu" required="">

                   </textarea>
             </div>

            <div class="form-group">
              <label for="usr">file giấy phép  </label>
              <input type="file" class="form-control" name="fileGiayPhep[]" multiple >
            </div>

          </div>
        <div class="col-md-4">
     
        
            <h5>BỔ XUNG KHI CẦN THIẾT</h5>
            
      
    </div>
      

  
    </div>
      <button style="float: right;margin-top: -30px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
    
   



</form> 

</div>
	
</div>

</div>



  @endsection


