
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
   <h4 style="color: #225C69; font-weight: bold;">MỎ ĐÃ VÔI AO GƯƠM</h4>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active">
      <a style="font-size: 16px; font-weight: bold;"  class="nav-link active" data-toggle="tab" href="#home">Thông tin doanh nghiệp </a>
    </li>

   
    <li class="nav-item">
      <a   style="font-size: 16px; font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu1">Thông tin mỏ</a>
    </li>
    <li class="nav-item">
      <a   style="font-size: 16px; font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép</a>
    </li>
      <li class="nav-item">
      <a   style="font-size: 16px; font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu3">Giấy tờ khác </a>
    </li>
     <!--  <li class="nav-item">
      <a   style="font-size: 16px; font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu4">Bản đồ địa giới</a>
    </li> -->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
           

    	<table class="table table-bordered" style="font-size: 15px; width: 88%;">
    		<thead>
    			<tr>
    				<th>Thuộc tính </th>
    				<th>Giá trị</th>
    				
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>Tên doanh nghiệp</td>
    				<td>Công ty Xi măng ACC-78</td>
    			</tr>
    			<tr>
    				<td>Địa chỉ</td>
    				<td>Sô 12 Đường Bờ Sông -Thành phố Lạng Sơn-Tỉnh Lạng Sơn</td>
    			</tr>
    			<tr>
    				<td>Số điện thoại</td>
    				<td>0425 252 05</td>
    			</tr>
    			<tr>
    				<td>Người đại diện pháp luật</td>
    				<td>Lê Hoàng</td>
    			</tr>
    			
    		</tbody>
    	</table>


  

    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      
     

    	<table class="table table-bordered" style="font-size: 15px; width: 88%;">
    		<thead>
    			<tr>
    				<th>Thuộc tính </th>
    				<th>Giá trị</th>
    				
    			</tr>
    		</thead>
    		<tbody>

    			<tr>
    				<td>Tên mỏ </td>
    				<td>Mỏ đá vôi Ao gươm</td>
    			</tr>
    			<tr>
    				<td>Diện tích thăm dò</td>
    				<td>6 Ha</td>
    			</tr>
    			<tr>
    				<td>Vị trí hành chính</td>
    				<td>Xã Đồng tâm -Huyện Huxu Lũng -Tỉnh Lạng Sơn</td>
    			</tr>

                <tr>
                    <td>Vị trí tọa độ</td>
                    <td> X: 9826.58  - Y: 485755.556</td>
                </tr>

    			<tr>
    				<td>Loại hình khoáng sản thăm dò</td>
    				<td>Đá vôi</td>
    			</tr>
    			<tr>
    				<td>Thời gian thăm dò </td>
    				<td>7/20210 -9/2020</td>
    			</tr>
    			<tr>
    				<td>Nguồn kinh phí </td>
    				<td>Vốn tư nhân</td>
    			</tr>
    			<tr>
    				<td>Phương pháp thăm dò</td>
    				<td>Thủ công</td>
    			</tr>
    			<tr>
    				<td>Khối lượng thăm dò </td>
    				<td>40000 Tấn /tháng</td>
    			</tr>

    			
    		</tbody>
    	</table>


    </div>
    <div id="menu2" class="container tab-pane fade"><br>
       	<table class="table table-bordered" style="font-size: 15px; width: 88%;">
    		<thead>
    			<tr>
    				<th>Thuộc tính </th>
    				<th>Giá trị</th>
    				
    			</tr>
    		</thead>
    		<tbody>

    			<tr>
    				<td>Số giấy phép thăm dò </td>
    				<td>1005/ GP-UBNN</td>
    			</tr>
    			<tr>
    				<td>Ngày giấy phép</td>
    				<td>05/07/2010</td>
    			</tr>
    			<tr>
    				<td>Tên giấy phép</td>
    				<td>Giấy phép thăm dò khoáng sản Mỏ đá vôi Ao gươm.</td>
    			</tr>
    			<tr>
    				<td>Người ký</td>
    				<td>Hồ Công Khánh</td>
    			</tr>
    			<tr>
    				<td>Chức vụ </td>
    				<td>Phó Chủ tịch Tỉnh</td>
    			</tr>
    			<tr>
    				<td>File scan giấy phép </td>
    				<td><a href="public/tailieu/54-td.pdf"><img src="public/anh/baseline_attach_file_black_18dp.png"></a></td>
    			</tr>
    			<tr>
    				<td>File scan bản đồ địa giới </td>
    				<td><a href="public/tailieu/20200108212602347.pdf"><img src="public/anh/baseline_attach_file_black_18dp.png"></a></td>
    			</tr>
    			
    		</tbody>
    	</table>
    </div>

      <div id="menu3" class="container tab-pane fade"><br>
       	<table class="table table-bordered" style="font-size: 15px;width: 88%;">
    		<thead>
    			<tr>
    				<th>Thuộc tính </th>
    				<th>Giá trị</th>
    				
    			</tr>
    		</thead>
    		<tbody>

    			<tr>
    				<td>Số giấy phép thăm dò </td>
    				<td>1005/ GP-UBNN</td>
    			</tr>
    			<tr>
    				<td>Ngày giấy phép</td>
    				<td>05/07/2010</td>
    			</tr>
    			<tr>
    				<td>Tên giấy phép</td>
    				<td>Giấy phép thăm dò khoáng sản Mỏ đá vôi Ao gươm.</td>
    			</tr>
    			<tr>
    				<td>Người ký</td>
    				<td>Hồ Công Khánh</td>
    			</tr>
    			<tr>
    				<td>Chức vụ </td>
    				<td>Phó Chủ tịch Tỉnh</td>
    			</tr>
    			<tr>
    				<td>File Scan giấy phép </td>
    				<td><a href=""><img src="public/anh/baseline_attach_file_black_18dp.png"></a></td>
    			</tr>
    			
    			
    			
    			
    		</tbody>
    	</table>
    </div>


     <div id="menu4"   class="container tab-pane fade"><br>
     	
      

        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d199648.78134800724!2d106.18871882225856!3d21.59583115507599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zw6MgxJHhu5NuZyB0w6JtIGh1eeG7h24gaHV4dSBsxaluZyB04buJbmggZ-G6p24gTOG6oW5nIFPGoW4!5e0!3m2!1svi!2s!4v1583649967055!5m2!1svi!2s" width="90%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->



     </div>

  </div>   

 <h4 style="color: blue;"> BẢN ĐỒ ĐỊA GIỚI</h4>
 <div id = "map" style = "width: 95%; height: 380px; border: 1px solid #797986; "></div>
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

   
         
        
      </script>



</div>



  @endsection