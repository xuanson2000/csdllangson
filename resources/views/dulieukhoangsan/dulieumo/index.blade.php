
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="{{route('timkiemmo')}}" method="get">

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr" name="txtseach">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="tenQuanHuyenseach" id="idtenQuanHuyenseach"  >
        <option value="">Chọn Quận/Huyện</option>
        @foreach($quanHuyens as $quanHuyen)
        <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
        @endforeach
      </select>
		</div>
		<!-- <div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
      <select class="form-control" name="tenXaPhuongseach" id="idtenXaPhuongseach" >

      </select>
		</div> -->
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

    <button type="button" style="float: right; margin-top: 35px; margin-right: 10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm dữ liệu</button>

	</form>
	
	  <div class="modal fade" id="myModal">
      <div class="modal-dialog"style="width: 80%;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="" style="background-color: #4F78F4; height: 50px;">
           <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Thêm dữ liệu mỏ khoáng sản</h4>
           <button type="button" style="float: right; margin-top: 10px; margin-right: 10px;" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
          <form action="{{route('themdulieumo')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
            
            <div class="row">
             <div class="col-md-4">
              <p style=" color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;  "> Thông tin chung</p>
              <div class="form-group">
               <label for="usr">Ký hiệu mỏ  <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="kyHieuMo" required="">
             </div>
             <div class="form-group">
               <label for="usr">Tên mỏ  <span style="color: red;">(*)</span></label>
               <input type="text" class="form-control" name="tenMo" required="">
             </div>
             <div class="form-group">
              <label style="font-weight: bold; float:left; ">Quận/huyện <span style="color: red;">(*)</span></label>
              <select class="form-control" name="tenQuanHuyen" id="idtenQuanHuyen" required >
                <option value="">Chọn Quận/Huyện</option>
                @foreach($quanHuyens as $quanHuyen)
                <option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Xã/Phường <span style="color: red;">(*)</span></label>
              <select class="form-control" name="viTriXa" id="idtenXaPhuong" required >
                
              </select>
            </div>
            
            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Quy mô mỏ</label>
              <select class="form-control" name="quyMo" id="dfd" required >
                <option value="">Chọn quy mô mỏ</option>
                <option value="Quy mô lớn">Lớn</option>
                <option value="Quy mô trung bình">Trung bình</option>
                <option value="Quy mô nhỏ">Nhỏ</option>
              </select>
            </div>

            

            <div class="form-group">
              <label style="font-weight: bold; float:left; ">Cơ quan phê duyệt <span style="color: red;">(*)</span></label>
              <select class="form-control" name="coQuanPheDuyet" id="fsf" required >
                <option value="">Chọn quy cơ quan phê duyệt</option>
                @foreach($coQuanCapPheps as $coQuanCapPhep)
                <option value="{{$coQuanCapPhep->id}}">{{$coQuanCapPhep->tenCoQuan}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="usr">Nguồn ngốc mỏ  </label>
              <input type="text" class="form-control" name="nguonGoc">
            </div>

          </div>

          <div class="col-md-4">

           <p style="color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;"> Thông tin địa chất, khoáng sản</p>
           
           

           <div class="form-group">
             <label for="usr">Điều kiện khai thác</label>
             <input type="text" class="form-control" name="dieuKienKhaiThac" required="">
           </div>
           <div class="form-group">
             <label for="usr">Định hướng</label>
             <input type="text" class="form-control" name="dinhHuong" required="">
           </div>

           <div class="form-group">
            <label style="font-weight: bold; float:left; ">Nhóm khoáng sản <span style="color: red;">(*)</span></label>
            <select class="form-control" name="nhomKhoangSan" id="idnhomKhoangSan" required >
              <option value="">Chọn quy Nhóm khoáng sản </option>
              @foreach($nhomKhoangSans as $nhomKhoangSan)
              <option value="{{$nhomKhoangSan->id}}">{{$nhomKhoangSan->tenNhomKS}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label style="font-weight: bold; float:left; ">Loại hình khoáng sản <span style="color: red;">(*)</span></label>
            <select class="form-control" name="loaiKhoangSan" id="idloaiHinhKhoangSan" required >

            </select>
          </div>
          <div class="row">
             <div class="form-group col-md-6">
           <label for="usr">Trữ lượng địa chất<span style="color: red;">(*)</span></label>
           <input type="number" class="form-control" name="truLuong" required="" step=".01">

         </div>
         <div class="form-group col-md-6">
            <label style="font-weight: bold; float:left; ">Đơn vị </label>
            <select class="form-control" name="donVi" required >
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
         </textarea>
       </div>
       <div class="form-group">
        <label for="usr">Đặc điểm khoáng sản</label>
        <textarea type="text" class="form-control" name="dacdiemKhoang" required="">
        </textarea>
      </div>

    </div>
    
    <div class="col-md-4">
      <p style="color: red; font-weight: bold; font-size: 16px; border-bottom: 2px solid blue; margin-bottom: 20px;"> Tọa độ mỏ</p>
      <button id="a" type="button" class="btn btn-primary">Thêm tọa độ góc mỏ</button>
      <div class="row" style="margin-top: 10px;">
        <p id="toadoX" class="col-md-6"> </p>
        <p id="toadoY" class="col-md-6"> </p>
      </div>
      <script>
        $(document).ready(function(){
          $("#a").click(function(){
            $("#toadoX").append(' Tọa độ X:<input type="text"  name="toaDoX[]"><br>');
          });
        });

        $(document).ready(function(){
          $("#a").click(function(){
            $("#toadoY").append(' Tọa độ Y:<input type="text"  name="toaDoY[]"><br>');
          });
        });
      </script>
      
    </div>

  </div>


  <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>

</form> 


</div>

<!-- Modal footer -->


</div>
</div>
</div>
	
</div>




@if(Session::has('messgsua'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo</strong> {{Session::get('messgsua')}}
  </div>
  @endif

  @if(Session::has('messgthem'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo</strong> {{Session::get('messgthem')}}
  </div>
  @endif

  @if(Session::has('messgthemtruluong'))
  <div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo</strong> {{Session::get('messgthemtruluong')}}
  </div>
  @endif 

  @if(Session::has('messgxoa'))

  <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 {{Session::get('messgxoa')}}</div>
 @endif

@if( isset($viewseach))

  <h4 style="margin-bottom: 20px; margin-top: 20px;">KẾT QUẢ TÌM KIẾM</h4>
             
  <table class="table table-bordered">
      <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
        <th>KÝ HIỆU MỎ</th>
    		<th>TÊN MỎ</th>
    		<th>NHÓM KHOÁNG SẢN</th>
        <th>LOẠI KHOÁNG SẢN</th>
    		<th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>CHI TIẾT</th>
    	
    	</tr>
    </thead>
    <tbody>
      @foreach($viewseach as $viewseachs)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$viewseachs->kyHieuMo}}</td>
        <td>{{$viewseachs->tenMo}}</td>
        <td>{{$viewseachs->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
        <td>{{$viewseachs->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
        <td>{{$viewseachs->xaPhuong->tenXaPhuong}} - {{$viewseachs->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn </td>
        

        <td style="text-align: center;"><a title="Xem chi tiết" href="{{route('chitietdulieumo',[$viewseachs->id])}}" > <i class="fa fa-list" aria-hidden="true"></i></a></td>
      
      </tr>
      @endforeach  
   
      
    </tbody>
  </table>

@else 
  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU MỎ KHOÁNG SẢN</h4>

<table class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
        <th>STT</th>
        <th>KÝ HIỆU MỎ</th>
        <th>TÊN MỎ</th>
        <th>NHÓM KHOÁNG SẢN</th>
        <th>LOẠI KHOÁNG SẢN</th>
        <th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>CHI TIẾT</th>
       <!--  <th>THAO TÁC</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach($dulieumos as $dulieumo)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$dulieumo->kyHieuMo}}</td>
        <td>{{$dulieumo->tenMo}}</td>
        <td>{{$dulieumo->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
        <td>{{$dulieumo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
        <td>{{$dulieumo->xaPhuong->tenXaPhuong}} - {{$dulieumo->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn </td>
        

        <td><a title="Xem chi tiết" href="{{route('chitietdulieumo',[$dulieumo->id])}}" > <i class="fa fa-list" aria-hidden="true"></i></a></td>
        <!-- <td> 
          <a title="Sửa" href="{{route('suadulieumo',[$dulieumo->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
          <a title="Chuyển đổi dữ liệu mỏ"   href="{{route('getxoadulieumo',[$dulieumo->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>

        </td> -->
      </tr>
      @endforeach  
   
      
    </tbody>
  </table>
  {{$dulieumos->links()}}




@endif




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


 
<!--   @section('scriptseach')
  <script>
    $("#idtenQuanHuyenseach").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong-seach/"+idtong,function(data){
        $("#idtenXaPhuongseach").html(data);
      });
    });  </script>
    @endsection -->




  @section('script1')
  <script>
      $("#idnhomKhoangSan").change(function(){
      var idnhomks =$(this).val();
      $.get("khoang-san/ajax/loai-hinh-khoang-san/"+idnhomks,function(data){
        $("#idloaiHinhKhoangSan").html(data);
      });
    });  </script>
  @endsection
