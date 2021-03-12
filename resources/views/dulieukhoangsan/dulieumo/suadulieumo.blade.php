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

        <form action="{{route('suadulieupost',[$dulieumoEdit->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >

             <div class="row">
             <div class="col-md-4">
              <p style="color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;"> Thông tin chung</p>
              <div class="form-group">
               <label for="usr">Ký hiệu mỏ  <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="kyHieuMo" required="" value="{{$dulieumoEdit->kyHieuMo}}">
             </div>
             <div class="form-group">
               <label for="usr">Tên mỏ  <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="tenMo" required="" value="{{$dulieumoEdit->tenMo}}">
             </div>
             <div class="form-group">
              <label style="font-weight: bold; float:left; ">Quận/huyện <span style="color: red;">(*)</span></label>
              <select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen" required >
              	<option value="{{$dulieumoEdit->xaPhuong->quanHuyen->id}}">{{$dulieumoEdit->xaPhuong->quanHuyen->tenQuanHuyen}}</option>
                <option value="">Chọn Quận/Huyện</option>
                @foreach($quanHuyens as $quanHuyen)
                <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Xã/Phường <span style="color: red;">(*)</span></label>
              <select class="form-control" name="viTriXa" id="idtenXaPhuong" required >
                <option value="{{$dulieumoEdit->xaPhuong->id}}">{{$dulieumoEdit->xaPhuong->tenXaPhuong}}</option>
              </select>
            </div>
            
            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Quy mô mỏ</label>
              <select class="form-control" name="quyMo" id="dfd" required >
              	 <option value="{{$dulieumoEdit->quyMo}}">{{$dulieumoEdit->quyMo}}</option>
                <option value="">Chọn quy mô mỏ</option>
                <option value="Quy mô lớn">Lớn</option>
                <option value="Quy mô trung bình">Trung bình</option>
                <option value="Quy mô nhỏ">Nhỏ</option>
              </select>
            </div>

            

            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Cơ quan phê duyệt <span style="color: red;">(*)</span></label>
              <select class="form-control" name="coQuanPheDuyet" id="fsf" required >
              	 <option value="{{$dulieumoEdit->coQuanCapPhep->id}}">{{$dulieumoEdit->coQuanCapPhep->tenCoQuan}}</option>
                <option value="">Chọn quy cơ quan phê duyệt</option>
                @foreach($coQuanCapPheps as $coQuanCapPhep)
                <option value="{{$coQuanCapPhep->id}}">{{$coQuanCapPhep->tenCoQuan}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="usr">Nguồn ngốc mỏ  </label>
              <input type="text" class="form-control" name="nguonGoc" value="{{$dulieumoEdit->nguonGoc}}">
            </div>

          </div>

          <div class="col-md-4">

           <p style="color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;"> Thông tin địa chất, khoáng sản</p>
           
           

           <div class="form-group">
             <label for="usr">Điều kiện khai thác</label>
             <input type="text" class="form-control" name="dieuKienKhaiThac" required="" value="{{$dulieumoEdit->dieuKienKhaiThac}}" >
           </div>
           <div class="form-group">
             <label for="usr">Định hướng</label>
             <input type="text" class="form-control" name="dinhHuong" required="" value="{{$dulieumoEdit->dinhHuong}}">
           </div>

           <div class="form-group">
            <label style="font-weight: bold; float:left; ">Nhóm khoáng sản <span style="color: red;">(*)</span></label>
            <select class="form-control" name="nhomKhoangSan" id="idnhomKhoangSan" required >
             <option value="{{$dulieumoEdit->loaiHinhKhoangSan->nhomKhoangSan->id}}">{{$dulieumoEdit->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</option>
              <option value="">Chọn quy Nhóm khoáng sản </option>
              @foreach($nhomKhoangSans as $nhomKhoangSan)
              <option value="{{$nhomKhoangSan->id}}">{{$nhomKhoangSan->tenNhomKS}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label style="font-weight: bold; float:left; ">Loại hình khoáng sản <span style="color: red;">(*)</span></label>
            <select class="form-control" name="loaiKhoangSan" id="idloaiHinhKhoangSan" required >
           <option value="{{$dulieumoEdit->loaiHinhKhoangSan->id}}">{{$dulieumoEdit->loaiHinhKhoangSan->tenLoaiHinhKS}}</option>
            </select>
          </div>
          <div class="row">
           <div class="form-group col-md-6">
             <label for="usr">Trữ lượng địa chất<span style="color: red;">(*)</span></label>
             <input type="number" class="form-control" name="truLuong" required="" step=".01" value="{{$dulieumoEdit->truLuong}}">

           </div>
           <div class="form-group col-md-6">
            <label style="font-weight: bold; float:left; ">Đơn vị </label>
            <select class="form-control" name="donVi" required >
              <option value="{{$dulieumoEdit->donVi}}">{{$dulieumoEdit->donVi}} </option>
              <option value="m3">m3 </option>
              <option value="tấn">tấn </option>
              <option value="tạ">tạ </option>
              <option value="kg">kg </option>

            </select>
          </div>

        </div>

         
       
       <div class="form-group">
         <label for="usr">Đặc điểm địa chất</label>
         <textarea type="text" class="form-control" name="dacDiemDiaChat" required="">
         {{$dulieumoEdit->dacDiemDiaChat}}
         </textarea>
       </div>

       <div class="form-group">
        <label for="usr">Đặc điểm khoáng sản</label>
        <textarea type="text" class="form-control" name="dacdiemKhoang" required="">
        	{{$dulieumoEdit->dacdiemKhoang}}
        </textarea>
      </div>

      
      

    </div>


  </div>

            
           
      <button style="float: right;margin-top: -30px;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>
    
   



</form> 

</div>
	
</div>

</div>



  @endsection

  @section('script')
  <script>
      $("#idtenQuanHuyen").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong/"+idtong,function(data){
        $("#idtenXaPhuong").html(data);
      });
    });  </script>
  @endsection


  @section('script1')
  <script>
    $("#idnhomKhoangSan").change(function(){
      var idnhomks =$(this).val();
      $.get("khoang-san/ajax/loai-hinh-khoang-san/"+idnhomks,function(data){
        $("#idloaiHinhKhoangSan").html(data);
      });
    });  
  </script>
 @endsection



