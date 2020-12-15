
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="" method="get">
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="phongban" id="idphongban" required >
				<option value="">Chọn Quận/Huyện</option>
				<option value="">Huyện Kinh môn</option>
				<option value="">Chọn Tân tiến</option>
				<option value="">Chọn Thanh giang</option>
				<option value="">Chọn Giang kim</option>
			
			</select>
		</div>
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
			<select class="form-control" name="nam" id="idkhoa_bc" style="width: 230px;" required>
				<option value="">Chọn Xã/Phường</option>
				<option value="2015">Đồng Bành</option>
				<option value="2016">Đồng Mục</option>
				<option value="2017">Cao lỗ</option>
				<option value="2018">Yên Khê</option>
				<option value="2019">Tân tị</option>
			</select>
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
	</form>
	
	
	
</div>



  <h4 style="margin-bottom: 20px; margin-top: 20px;">DANH SÁCH DỮ LIỆU MỎ KHOÁNG SẢN</h4>            
  <table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
        <th>KÝ HIỆU MỎ</th>
    		<th>TÊN MỎ</th>
    		<th>NHÓM KHOÁNG SẢN</th>
    		<th>KÍ HIỆU KHOÁNG SẢN</th>
    		
    		<th>LOẠI KHOÁNG SẢN</th>
    		<th>VỊ TRÍ HÀNH CHÍNH</th>
        <th>TÌNH TRẠNG</th>
        <th>CHI TIẾT</th>
    		<th>THAO TÁC</th>
    	</tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>HAKHDKN</td>
        <td>Mỏ đá vôi Đồng bành</td>
        <td>Đá vôi</td>
        <td>DV</td>
        <td>Đá </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
        <td> Đang hoạt động</td>
        <td><a href=""  data-toggle="modal" data-target="#myModal" > XEM</a></td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         <tr>
        <td>2</td>
         <td>HAKHDKN</td>
        <td>Mỏ đá Ao gươm</td>
        <td>Đá vôi</td>
        <td>DV</td>
        <td>Đá </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
         <td> Đang hoạt động</td>
        <td><a href=""> XEM</a></td>

        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         <tr>
        <td>3</td>
         <td>HAKHDKN</td>
        <td>Mỏ Kim Loại Lũng cú</td>
        <td>Kim loại</td>
        <td>DV</td>
        <td>Kim loại </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
         <td> Đang hoạt động</td>
        <td><a href=""> XEM</a></td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
         <tr>
        <td>4</td>
         <td>HAKHDKN</td>
        <td>Quạng nhôm lũng lèng</td>
        <td>Nhôm</td>
        <td>DV</td>
        <td>Kim loại </td>
        <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>
         <td> Đang hoạt động</td>
        <td><a href=""> XEM</a></td>
        <td>  <img alt="Sửa" src="public/anh/b_edit.png"> <img alt="Xóa" src="public/anh/b_drop.png"></td>
      </tr>
   
      
    </tbody>
  </table>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog"style="width: 80%;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         
          <button type="button" class="close" data-dismiss="modal">X</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

    
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active">
              <a style="font-weight: bold;" class="nav-link active" data-toggle="tab" href="#home">Thông tin chúng</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu1">Đặc điểm địa chất</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Trữ lượng khai thác</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
               <table class="table table-bordered" style="width: 90%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>

                 <tr>
                  <td>Ký hiệu</td>
                  <td>HAKHDKN</td>

                </tr>
                <tr>
                  <td>Tên mỏ</td>
                  <td>Mỏ đá vôi Đồng bành</td>

                </tr>
                <tr>
                  <td>Vị trí hành chính</td>
                  <td>Đồng Tâm - Hũy Lũng -Lạng Sơn</td>

                </tr>
             

               <tr>
                <td>Nguồn gốc</td>
                <td>Nhiệt dịch</td>
              </tr>
              <tr>
                <td>Quy Mô</td>
                <td>Mỏ trung Bình</td>
              </tr>
              <tr>
                <td>Điều kiện khai thác</td>
                <td>....</td>
              </tr>

              <tr>
                <td>Định hướng</td>
                <td>....</td>
              </tr>


              <tr>
                <td>Cơ quan phê duyệt</td>
                <td>Sở Tài Nguyên Môi Trường Lạng Sơn</td>
              </tr>

                 <tr>
                  <td>Vị trí tọa độ</td>
                  <td>Góc 1 : X:1202120 Y:01021521 <br>
                   Góc 2 : X:1202120 Y:01021521 <br>
                   Góc 3 : X:1202120 Y:01021521 <br>
                   Góc 4 : X:1202120 Y:01021521 <br>
                 </td>

               </tr>
            </tbody>
          </table>

        </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <table class="table table-bordered" style="width: 90%;">
                <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <td>Nhóm khoáng sản</td>
                    <td>Đá</td>

                  </tr>
                  <tr>
                    <td>Ký hiệu khoáng sản</td>
                    <td>DV</td>

                  </tr>
                  <tr><td>
                  Loại khoáng sản</td>
                  <td>Đá vôi</td>

                </tr>

                <tr>
                  <td>Nguồn gốc</td>
                  <td>Nhiệt dịch</td>
                </tr>




                <tr>
                  <td>Đặc điểm địa chất</td>
                  <td>Vùng lộ đá granit phức hệ Pia Oắc (g K2 po) và đá trầm tích lục nguyên-phun trào hệ tầng Sông Hiến (T1 sh).</td>
                </tr>
                <tr>
                  <td>Đặc điểm khoáng sản</td>
                  <td>Có 4 mạch quặng đạt yêu cầu công nghiệp nằm ở ranh giới ngoại tiếp xúc giữa đá granit phức hệ Pia Oắc (g K2 po) với đá trầm tích lục nguyên-phun trào hệ tầng Sông Hiến (T1 sh). Các mạch dày 0,2-0,8m. </td>
                </tr>
                <tr>
                  <td>Công tác tiến hành</td>
                  <td>Tìm kiếm, thi công các công trình giếng, hào, dọn sạch vỉa lộ; lấy và phân tích mẫu giã đãi,hóa Sn - W, khoáng tướng.</td>
                </tr>

              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>

              <table class="table table-bordered" style="width: 90%;">
                <thead>
                 <tr>
                  <th colspan="3">Tổng trữ lượng : 50.000 Tấn</th>
                </tr>
                  <tr>
                  
                    <th>Năm khai thác</th>
                    <th>Trữ lượng khai thác</th>
                    <th>Trữ lượng còn lại</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>2010 </td>
                    <td>1000 Tấn</td>
                    <td>49.000 Tấn</td>
                  </tr>
                  <tr>
                    <td>2011 </td>
                    <td>1000 Tấn</td>
                    <td>48.000 Tấn</td>
                  </tr>

                </tbody>
              </table>

            </div>
          </div>
          

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>

  <a href="" style="float: right;" class="btn btn-info" role="button">Thêm dữ liệu</a>
</div>



  @endsection