
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

<div class="model">
	<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
	 <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; ">Hồ sơ phê duyệt trữ lượng: <span style="color: #FFB724; font-weight: bold;">  {{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->duLieuMo->tenMo}} </span></h4>

   <a title="Đóng" href="{{route('truluongkhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>
   
    <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('xoahosopheduyet',[$hoSoPheDuyetTruLuongid->id])}}"  type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>

     <a title="Sửa" href="{{route('suatruluong',[$hoSoPheDuyetTruLuongid ->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


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
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
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
            				<td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
            			</tr>
            			<tr>
            				<td>Địa chỉ</td>
            				<td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->doanhNghiep->diaChi}}</td>
            			</tr>
            			<tr>
            				<td>Số điện thoại</td>
            				<td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->doanhNghiep->soDienThoai}}</td>
            			</tr>
            			<tr>
            				<td>Người đại diện pháp luật</td>
            				<td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->doanhNghiep->nguoiDaiDienPhapLuat}}</td>
            			</tr>
            		</tbody>
            	</table>

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
                  <td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
                </tr>

                <tr>
                  <td>Vị trí hành chính</td>
                  <td>{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoPheDuyetTruLuongid->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
                </tr>

                
                


              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>

             

              <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                   <th>Thuộc tính</th>
                   <th>Giá trị</th>



                 </tr>
               </thead>
               <tbody>

                 <tr>
                  <td>Số giấy phép phê duyệt trữ lượng </td>
                  <td>{{$hoSoPheDuyetTruLuongid ->soGiayPhepPheDuyet}}</td>
                </tr>
                <tr>
                  <td>Ngày giấy phép</td>
                  <td>{{date('d-m-Y', strtotime($hoSoPheDuyetTruLuongid->ngayGiayPhep))}} </td>
                </tr>
                <tr>
                  <td>Tên giấy phép</td>
                  <td>{{$hoSoPheDuyetTruLuongid ->tenGiayPhep}}</td>
                </tr>
                <tr>
                  <td>Người ký</td>
                  <td>{{$hoSoPheDuyetTruLuongid->nguoiKy}}</td>
                </tr>

                <tr>
                  <td>Chức vụ </td>
                  
                  <td>{{$hoSoPheDuyetTruLuongid->chucVu->tenChucVu}}</td>
                </tr>
                
                
                
                <tr>
                  <td>Tổng trữ lượng</td>
                  <td>{{$hoSoPheDuyetTruLuongid->tongTruLuong}} {{$hoSoPheDuyetTruLuongid->donVi}}</td>
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
          </div>
          

        </div>

		
	</div>

	
<!-- 
 <h4 style="color: blue; padding-left: 25px;"> BẢN ĐỒ ĐỊA GIỚI</h4>
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
         multipolygon.bindPopup(" <span style='color:blue; font-weight: bold;text-align: center; '>Mỏ đá vôi Ao gươm  </span> <br> Tọa độ : <br> Góc 1: x:21.853168 - y: 106.745359 <br> Góc 2: x:21.853123 - y: 106.746392 <br> Góc 3: x:21.853123 - y: 106.746392 <br> Góc 4: x:21.853123 - y: 106.746392  <br> Vị trí hành chính: Xã Đồng tâm -Huyện Huxu Lũng -Tỉnh Lạng Sơn   <br> Diện tích thăm dò :6 Ha. ");
         // Adding multi polygon to map
         multipolygon.addTo(map);

   
         
        
      </script> -->



</div>



  @endsection