
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

<div class="model">
	<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
	 <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; ">Hồ sơ cấp phép khai thác: <span style="color: #FFB724; font-weight: bold;"> {{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}} </span></h4>
         


   <a title="Đóng" href="{{route('capphepkhaithac')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>
   
   <a title="Chuyển đổi khai thác" href="{{route('chuyendoikhaithac',[$hoSoCapPhepKhaiThacid->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-success" > <i class="fa fa-refresh" aria-hidden="true"></i></a>

   <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('xoahosocapphepkhaithac',[$hoSoCapPhepKhaiThacid->id])}}"  type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>

   <a title="Sửa" href="{{route('suakhaithac',[$hoSoCapPhepKhaiThacid->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>



	</div>
	<div class="row" style="width: 95%; background-color: #FAFBFC; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">

		 <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active">
              <a style="font-weight: bold;" class="nav-link active" data-toggle="tab" href="#home">Thông tin doanh nghiệp</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu1">Thông tin mỏ</a>
            </li>

            @if($hoSoCapPhepKhaiThacid ->note==1)
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép điều chỉnh khai thác</a>

            </li>
             <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu4">Thông tin giấy phép khai thác</a>
            </li>
            @elseif($hoSoCapPhepKhaiThacid ->note==2)

            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép khai thác chuyển nhượng</a>

            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu4">Thông tin giấy phép khai thác</a>
            </li>

            @else
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép khai thác</a>
            </li>
            @endif

          </ul>



          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>


              @if($hoSoCapPhepKhaiThacid->note==2)
              <?php
              $iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();
              ?>

              <h3>Doanh nghiệp khai thác hiện tại</h3>
              <table class="table table-bordered" style="width: 86%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tên doanh nghiệp</td>
                    <td>{{$iddn->tenDoanhNghiep}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{$iddn->diaChi}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$iddn->soDienThoai}}</td>
                  </tr>
                  
                </tbody>
              </table>

              <h3>Doanh nghiệp khai thác trước đó</h3>
              <table class="table table-bordered" style="width: 86%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tên doanh nghiệp</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->diaChi}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->soDienThoai}}</td>
                  </tr>
                  
                </tbody>
              </table>

             
              @else

              <table class="table table-bordered" style="width: 86%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tên doanh nghiệp</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->diaChi}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->soDienThoai}}</td>
                  </tr>
                
                </tbody>
              </table>
            

              @endif

              
            </div>

            <div id="menu1" class="container tab-pane fade"><br>
              <table class="table table-bordered" style="width: 86%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>


                 <tr>
                  <td>Tên mỏ </td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
                </tr>

                 <tr>
                  <td>Loại khoáng sản </td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
                </tr>


                <tr>
                  <td>Vị trí hành chính</td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
                </tr>
                <tr>
                  <td>Cơ quan quản lý phê duyệt </td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->coQuanCapPhep->tenCoQuan}}</td>
                </tr>
                
            


              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>

            
              <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                   <th style="width: 250px;">Thuộc tính</th>
                   <th>Giá trị</th>

                 </tr>
               </thead>
               <tbody>

                 <tr>
                  <td>Số giấy phép khai thác </td>
                  <td>{{$hoSoCapPhepKhaiThacid ->soGiayPhepKhaiThac}}</td>
                </tr>
                <tr>
                  <td>Ngày cấp phép khai thác</td>
                  <td> {{date('d-m-Y', strtotime($hoSoCapPhepKhaiThacid->ngaygiayphep))}} </td>
                </tr>
                <tr>
                  <td>Tên giấy phép</td>
                  <td>{{$hoSoCapPhepKhaiThacid ->tenGiayPhep}}</td>
                </tr>
                <tr>
                  <td>Người ký</td>
                  <td>{{$hoSoCapPhepKhaiThacid->nguoiKy}}</td>
                </tr>

                <tr>
                  <td>Chức vụ </td>
                  
                  <td>{{$hoSoCapPhepKhaiThacid->chucVu->tenChucVu}}</td>
                </tr>
                
                <tr>
                  <td>Thời gian cấp phép khai thác</td>
                  <td>{{$hoSoCapPhepKhaiThacid->thoigiancapphepkhaithac}} năm</td>
                </tr>

                <tr>
                  <td>diện tích cấp phép khai thác</td>
                  <td>{{$hoSoCapPhepKhaiThacid->dienTichKhaiThac}} ha</td>
                </tr>
                  
                <tr>
                	<td>Trữ lượng địa chất</td>
                	<td>{{$hoSoCapPhepKhaiThacid->truLuongDiaChat}} {{$hoSoCapPhepKhaiThacid->donVi}}</td>
                </tr>

                 <tr>
                	<td>Trữ lượng khai thác</td>
                	<td>{{$hoSoCapPhepKhaiThacid->truLuongKhaiThac}} {{$hoSoCapPhepKhaiThacid->donVi}}</td>
                </tr>

                <tr>
                	<td>Công suất khai thác</td>
                	<td>{{$hoSoCapPhepKhaiThacid->congSuatKhaiThac}} {{$hoSoCapPhepKhaiThacid->donVi}}</td>
                </tr>
                <tr>
                  <td>Vị trí tọa độ khai thác</td>
                  <td>
                   <?php
                   $toaDos=DB::table('toaDo')->where('id_loaihoso','1')->where('id_hoso',$hoSoCapPhepKhaiThacid->id)->get();
                   ?>
                   @foreach($toaDos as $toaDo)
                   Góc {{$loop->index+1}}: X :{{$toaDo->toadox}} - Y:{{$toaDo->toadoy}}<br>
                   @endforeach


                 </td>

               </tr>


                <tr>
                  <td>File scan giấy phép </td>

                  <td>
                    @foreach($filedinhkemgiaypheps as $filedinhkemgiayphep)
                    <a href="public/tailieu/{{$filedinhkemgiayphep->tenFile}}"> {{$filedinhkemgiayphep->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
                      @endforeach
                  </td>
                </tr>
                <tr>
                  <td>File scan bản đồ</td>
                   <td>
                    @foreach($filedinhkembandos as $filedinhkembando)
                    <a href="public/tailieu/{{$filedinhkembando->tenFile}}"> {{$filedinhkembando->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a> 
                      @endforeach
                  </td>
                </tr>

              </tbody>
            </table>

            </div>


<!-- gd -->
  @if($hoSoCapPhepKhaiThacid ->note==1 || $hoSoCapPhepKhaiThacid ->note==2)
          <div id="menu4" class="container tab-pane fade"><br>


            <table class="table table-bordered" style="width: 86%;">
              <thead>
               <tr>
                 <th style="width: 250px;">Thuộc tính dg</th>
                 <th>Giá trị</th>

               </tr>
             </thead>

             <?php
             $hosokhiathacold=App\hosocapphepkhaithacdieuchinh::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->first();

            

              ?>
             <tbody>

                 <tr>
                  <td>Số giấy phép khai thác </td>
                  <td>{{$hosokhiathacold ->soGiayPhepKhaiThac}}</td>
                </tr>
                <tr>
                  <td>Ngày giấy phép</td>
                  <td>{{$hosokhiathacold->ngaygiayphep}}</td>
                </tr>
                <tr>
                  <td>Tên giấy phép</td>
                  <td>{{$hosokhiathacold ->tenGiayPhep}}</td>
                </tr>
                <tr>
                  <td>Người ký</td>
                  <td>{{$hosokhiathacold->nguoiKy}}</td>
                </tr>

                <tr>
                  <td>Chức vụ </td>
                  
                  <td></td>
                </tr>
                
                <tr>
                  <td>Thời gian cấp phép khai thác</td>
                  <td>{{$hosokhiathacold->thoigiancapphepkhaithac}}</td>
                </tr>
                  
                <tr>
                  <td>Trữ lượng địa chất</td>
                  <td>{{$hosokhiathacold->truLuongDiaChat}} {{$hosokhiathacold->donVi}}</td>
                </tr>

                 <tr>
                  <td>Trữ lượng khai thác</td>
                  <td>{{$hosokhiathacold->truLuongKhaiThac}} {{$hosokhiathacold->donVi}}</td>
                </tr>

                <tr>
                  <td>Công suất khai thác</td>
                  <td>{{$hosokhiathacold->congSuatKhaiThac}} {{$hosokhiathacold->donVi}}</td>
                </tr>
                <tr>
                  <td>File scan giấy phép </td>
                    <td>
                  <?php 
                  $filedinhkemgiayphepolds=App\fileDinhKemGiayPhep::where('id_HoSo',$hosokhiathacold->id)->where('id_loaiHoSo','4')->where('note','1')->get();

                  ?>
                  @foreach($filedinhkemgiayphepolds as $filedinhkemgiayphepold)
                  <a href="public/tailieu/{{$filedinhkemgiayphepold->tenFile}}"> {{$filedinhkemgiayphepold->tenFile}} <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
                  @endforeach
                    

                  
                   
                  </td>
                </tr>
                <tr>
                  <td>File scan bản đồ</td>
                    <td>
                  <?php 
                 
                 $filedinhkembandoolds=App\fileDinhKemBanDo::where('id_HoSo',$hosokhiathacold->id)->where('id_loaiHoSo','4')->where('note','1')->get();

                  ?>
                  @foreach($filedinhkembandoolds as $filedinhkembandoold)
                  <a href="public/tailieu/{{$filedinhkembandoold->tenFile}}"> {{$filedinhkembandoold->tenFile}} <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
                  @endforeach



                
                  
                  </td>
                </tr>



            </tbody>
          </table>

        </div>
<!-- df -->
 @endif

          </div>
          

        </div>

		
	</div>

	

<!--  <h4 style="color: blue; padding-left: 25px;"> BẢN ĐỒ ĐỊA GIỚI</h4>
 <div id = "map" style = "width: 95%; height: 380px; border: 1px solid #797986; margin: 0 auto; ">

   
 </div>
      <script>
         // Creating map options
         var mapOptions = {
            center: [21.852836, 106.744909],
            zoom: 17
         }
         // Creating a map object
         var map = new L.map('map', mapOptions);
         
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);
         
         // Creating latlng object
          var latlang = [[[21.853168, 106.745359], [21.853123, 106.746392],[21.852419, 106.745519],[21.852319, 106.745221]]];
         // Creating multi polygon options
         var multiPolygonOptions = {color:'red', weight:2};
         
         // Creating multi polygons
         var multipolygon = L.multiPolygon(latlang , multiPolygonOptions);
         multipolygon.bindPopup("Feature Group");
          multipolygon.setStyle({color:'red',opacity:.5});
        
         // Adding multi polygon to map
         multipolygon.addTo(map);

   
         
        
      </script>
 -->


</div>



  @endsection