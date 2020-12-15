
 @extends('khoangsan.layout')

@section("content12")
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">

<div class="model">
	<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
	 <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">Hồ sơ cấp phép khai thác bị thu hồi {{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}} {{$hoSoCapPhepKhaiThacid->id}}</h4>
          <a href="{{route('biendongkhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>
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

            

            @if($hoSoCapPhepKhaiThacid->thuhoitralai==1)
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu3">Thông tin quyết định thu hồi mỏ</a>
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
                  <td>Vị trí hành chính</td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
                </tr>
                <tr>
                  <td>Cơ quan quản lý phê duyệt </td>
                  <td>{{$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->coQuanCapPhep->tenCoQuan}}</td>
                </tr>
                
                <tr>
                  <td>Vị trí tọa độ khai thác</td>
                  <td>
                    <h5>Hệ tọa độ: VN200</h5>
                   <?php
                   $toaDos=DB::table('toaDo')->where('id_loaiHoSo','1')->where('id_HoSo',$hoSoCapPhepKhaiThacid->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->id)->get();
                   ?>
                   @foreach($toaDos as $toaDo)
                   Góc {{$loop->index+1}}: X :{{$toaDo->toaDoX}} - Y:{{$toaDo->toaDoY}}<br>
                   @endforeach


                 </td>

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
                  <td>Ngày giấy phép</td>
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
                  <td>{{$hoSoCapPhepKhaiThacid->thoigiancapphepkhaithac}}</td>
                </tr>

                <tr>
                  <td>diện tích cấp phép khai thác</td>
                  <td>{{$hoSoCapPhepKhaiThacid->dienTichKhaiThac}}</td>
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


 @if($hoSoCapPhepKhaiThacid->thuhoitralai==1)

 <div id="menu3" class="container tab-pane fade"><br>


 	<table class="table table-bordered" style="width: 86%;">
<?php
 		$hosothuhoitralais=App\hosothuhoitralaimo::where('id_khaithac',$hoSoCapPhepKhaiThacid->id)->first();
 		?>
 		<thead>
 			<tr>
 				<th style="width: 250px;">Thuộc tính</th>
 				<th>Giá trị</th>

 			</tr>
 		</thead>
 		<tbody>
 			<tr>
 				<td> Số quyết định</td>
 				<td> {{$hosothuhoitralais->soquyetdinh}}</td>
 			</tr>
 			<tr>
 				<td> Ngày quyết định</td>
 				<td> {{$hosothuhoitralais->ngayquyetdinh}}</td>
 			</tr>
 			<tr>
 				<td> Lý do thu hồi</td>
 				<td>{{$hosothuhoitralais->lydo}} </td>
 			</tr>
 			<tr>
 				<td> File quyết định</td>
 				<td> <a href="public/tailieu/{{$hosothuhoitralais->file}}">{{$hosothuhoitralais->file}}</a> </td>
 			</tr>

 			

 		</tbody>
 	</table>

 </div>

 @endif



          </div>
          

        </div>

		
	</div>

	

 


</div>



  @endsection