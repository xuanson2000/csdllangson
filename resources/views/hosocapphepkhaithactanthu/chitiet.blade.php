
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

<div class="model">
	<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
	 <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; ">Hồ sơ cấp phép khai thác: <span style="color: #FFB724; font-weight: bold;"> {{$hoSoCapPhepKhaiThacTanThu->duLieuMo->tenMo}} </span></h4>
         


   <a title="Đóng" href="{{route('capphepkhaithactanthu')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-info" > <i class="fa fa-times" aria-hidden="true"></i></a>
   
  <!--  <a title="Chuyển đổi khai thác" href="{{route('chuyendoikhaithac',[$hoSoCapPhepKhaiThacTanThu->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-success" > <i class="fa fa-refresh" aria-hidden="true"></i></a> -->

   <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('capphepkhaithactanthuxoa',[$hoSoCapPhepKhaiThacTanThu->id])}}"  type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>

   <a title="Sửa" href="{{route('capphepkhaithactanthuedit',[$hoSoCapPhepKhaiThacTanThu->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>



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
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Thông tin giấy phép khai thác</a>
            </li>
           

          </ul>



          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>


              
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
                    <td>{{$hoSoCapPhepKhaiThacTanThu->doanhNghiep->tenDoanhNghiep}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{$hoSoCapPhepKhaiThacTanThu->doanhNghiep->diaChi}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$hoSoCapPhepKhaiThacTanThu->doanhNghiep->soDienThoai}}</td>
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
                  <td>{{$hoSoCapPhepKhaiThacTanThu->duLieuMo->tenMo}}</td>
                </tr>

                 <tr>
                  <td>Loại khoáng sản </td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->duLieuMo->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
                </tr>


                <tr>
                  <td>Vị trí hành chính</td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoCapPhepKhaiThacTanThu->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
                </tr>
                <tr>
                  <td>Cơ quan quản lý phê duyệt </td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->duLieuMo->coQuanCapPhep->tenCoQuan}}</td>
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
                  <td>{{$hoSoCapPhepKhaiThacTanThu ->soGiayPhepKhaiThac}}</td>
                </tr>
                <tr>
                  <td>Ngày cấp phép khai thác</td>
                  <td> {{date('d-m-Y', strtotime($hoSoCapPhepKhaiThacTanThu->ngaygiayphep))}} </td>
                </tr>
                <tr>
                  <td>Tên giấy phép</td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu ->tenGiayPhep}}</td>
                </tr>
                <tr>
                  <td>Người ký</td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->nguoiKy}}</td>
                </tr>

                <tr>
                  <td>Chức vụ </td>
                  
                  <td>{{$hoSoCapPhepKhaiThacTanThu->chucVu->tenChucVu}}</td>
                </tr>
                
                <tr>
                  <td>Thời gian cấp phép khai thác</td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->thoigiancapphepkhaithac}} năm</td>
                </tr>

                <tr>
                  <td>diện tích cấp phép khai thác</td>
                  <td>{{$hoSoCapPhepKhaiThacTanThu->dienTichKhaiThac}} ha</td>
                </tr>
                  
                <tr>
                	<td>Trữ lượng địa chất</td>
                	<td>{{$hoSoCapPhepKhaiThacTanThu->truLuongDiaChat}} {{$hoSoCapPhepKhaiThacTanThu->donVi}}</td>
                </tr>

                 <tr>
                	<td>Trữ lượng khai thác</td>
                	<td>{{$hoSoCapPhepKhaiThacTanThu->truLuongKhaiThac}} {{$hoSoCapPhepKhaiThacTanThu->donVi}}</td>
                </tr>

                <tr>
                	<td>Công suất khai thác</td>
                	<td>{{$hoSoCapPhepKhaiThacTanThu->congSuatKhaiThac}} {{$hoSoCapPhepKhaiThacTanThu->donVi}}</td>
                </tr>
                <tr>
                  <td>Vị trí tọa độ khai thác</td>
                  <td>
                   <?php
                   $toaDos=DB::table('toaDo')->where('id_loaihoso','3')->where('id_hoso',$hoSoCapPhepKhaiThacTanThu->id)->get();
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




          </div>
          

        </div>

		
	</div>

	

</div>



  @endsection