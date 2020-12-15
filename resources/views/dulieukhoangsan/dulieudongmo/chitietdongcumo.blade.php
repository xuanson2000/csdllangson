
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


<div class="model">
	<div class="row" style="background-color: #4276BB; width: 95%; margin: 0 auto;">
	 <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">{{$chitietdulieumodongcuas->tenMo}}</h4>
          <a href="{{route('dlmo')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>
	</div>
	<div class="row" style="width: 95%; background-color: #F0F4F5; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">

		 <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active">
              <a style="font-weight: bold;" class="nav-link active" data-toggle="tab" href="#home">Thông giấy quyết định</a>
            </li>
        
            <li class="nav-item">
            	<a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu0">Thông tin chung</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu1">Đặc điểm địa chất, khoáng sản</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu3">Các công tác đã tiến hành</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Báo cáo khai thác khoáng sản hàng năm</a>
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
                  <td>Số quyết định</td>
                  <td>{{$chitietdulieumodongcuas->soQuyetDinhDongMo}}</td>

                </tr>
                 <tr>
                  <td>Ngày quyết định</td>
                  <td>{{$chitietdulieumodongcuas->ngayThuHoi}}</td>

                </tr>
                 <tr>
                  <td>Người ký quyết định</td>
                  <td>{{$chitietdulieumodongcuas->nguoiKy}}</td>

                </tr>
                 <tr>
                  <td>Chức vụ</td>
                  <td>{{$chitietdulieumodongcuas->chucVu->tenChucVu}}</td>

                </tr>

                 <tr>
                  <td>File đính kèm</td>
                  <td> <a href="public/tailieu/{{$chitietdulieumodongcuas->file}}"></a>{{$chitietdulieumodongcuas->file}}</td>

                </tr>
           
          
            </tbody>
          </table>

        </div>

        <div id="menu0" class="container tab-pane fade"><br>
        	<table class="table table-bordered" style="width: 86%;">
        		<thead>
        			<tr>
        				<th>Thuộc tính</th>
        				<th>Giá trị</th>

        			</tr>
        		</thead>
        		<tbody>

        			<tr>
        				<td>Ký hiệu</td>
        				<td>{{$chitietdulieumodongcuas->kyHieuMo}}</td>

        			</tr>
        			<tr>
        				<td>Tên mỏ</td>
        				<td>{{$chitietdulieumodongcuas->tenMo}}</td>

        			</tr>
        			<tr>
        				<td>Vị trí hành chính</td>
        				<td>{{$chitietdulieumodongcuas->xaPhuong->tenXaPhuong}} - {{$chitietdulieumodongcuas->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn</td>

        			</tr>


        			<tr>
        				<td>Nguồn gốc</td>
        				<td>{{$chitietdulieumodongcuas->nguonGoc}}</td>
        			</tr>
        			<tr>
        				<td>Quy Mô</td>
        				<td>{{$chitietdulieumodongcuas->quyMo}}</td>
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
        				<td>{{$chitietdulieumodongcuas->coQuanCapPhep->tenCoQuan}}</td>
        			</tr>

        			<tr>
        				<td>Vị trí tọa độ</td>
        				<td>
        					<?php
        					$toaDos=DB::table('toaDo')->where('id_loaiHoSo','1')->where('id_HoSo',$chitietdulieumodongcuas->id)->get();
        					?>
        					@foreach($toaDos as $toaDo)
        					Góc {{$loop->index+1}}: X :{{$toaDo->toaDoX}} - Y:{{$toaDo->toaDoY}}<br>
        					@endforeach


        				</td>

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
                    <td>Nhóm khoáng sản</td>
                    <td>{{$chitietdulieumodongcuas->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
                  </tr>
                
                  <tr><td>
                  Loại khoáng sản</td>
                  <td>{{$chitietdulieumodongcuas->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
                </tr>

                <tr>
                  <td>Nguồn gốc</td>
                  <td>{{$chitietdulieumodongcuas->nguonGoc}}</td>
                </tr>




                <tr>
                  <td>Đặc điểm địa chất</td>
                  <td>{{$chitietdulieumodongcuas->dacDiemDiaChat}}.</td>
                </tr>
                <tr>
                  <td>Đặc điểm khoáng sản</td>
                  <td> {{$chitietdulieumodongcuas->dacdiemKhoang}}</td>
                </tr>
                <tr>
                  <td>Công tác tiến hành</td>
                  <td>{{$chitietdulieumodongcuas->congTacTienHanh}}</td>
                </tr>

              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>

             

              <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                  <th colspan="3">Tổng trữ lượng : {{number_format($chitietdulieumodongcuas->truLuong)}} {{$chitietdulieumodongcuas->donVi}}</th>
                </tr>
                  <tr>
                  
                    <th>Năm</th>
                    <th>Trữ lượng khai thác</th>
                    <th>Thuế tài nguyên</th>
                    <th>Thuế GTGT</th>
                    <th>Phí môi trường</th>
                    <th>Tiền thuê đất</th>
                    <th>File đính kèm</th>

                  </tr>
                </thead>
                <tbody>
               
                 @foreach($nopNganSachKhoangSans as $nopNganSachKhoangSan)
                 <tr>
                  <td> {{$nopNganSachKhoangSan->nam}} </td>
                  <td>{{number_format($nopNganSachKhoangSan->truLuongKhaiThac)}} {{$nopNganSachKhoangSan->donVi}}</td>
                  <td>{{number_format($nopNganSachKhoangSan->thueTaiNguyen)}}</td>
                  <td>{{number_format($nopNganSachKhoangSan->thueGiaTriGiaTang)}}</td>
                  <td>{{number_format($nopNganSachKhoangSan->phiBaoVeMoiTruong)}}</td>
                  <td>{{number_format($nopNganSachKhoangSan->thueThueDat)}}</td>
                  <td> <a href="public/tailieu/{{$nopNganSachKhoangSan->file}}">  {{$nopNganSachKhoangSan->file}}</a></td>
                </tr>
                @endforeach

                </tbody>
              </table>


           <!--   <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm trữ lượng khai thác</button>
              
               <div id="demo" class="collapse" style="margin-top: 20px;">
              
                <form action="{{route('themtruluong',[$chitietdulieumodongcuas->id])}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden"  name="_token" value="{{csrf_token()}}" >
                  <div class="row form-group">
                    <label class="col-md-2" for="email">Năm khai thác (<span style="color: red">*</span>) </label>
                    <input class="col-md-2"  type="number" class="form-control"  name="namKhaiThac" required="">
                   
                    <label class="col-md-2" for="pwd">Trữ lượng (<span style="color: red">*</span>)</label>
                    <input class="col-md-2" type="number" class="form-control"  name="truLuongKhaiThac" required="">
                  </div>
                <button type="submit" class="btn btn-warning">Lưu lại</button>

              </form> 

              </div> -->


            </div>

            <div id="menu3" class="container tab-pane fade"><br>

             

              <table class="table table-bordered" style="width: 86%;">
                <thead>
               
                  <tr>
                  
                    <th>Thăm dò khoáng sản</th>
                    <th>Phê duyệt trữ lượng</th>
                    <th>Cấp phép khai thác</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                 <tr>
                  <?php 

                  $idhosthamdo=App\hoSoCapPhepthamdo::where('id_mo',$chitietdulieumodongcuas->id)->first();

                  if($idhosthamdo!=null){
                    $idhosopheduyet=App\hoSoCapPhepPheDuyetTruLuong::where('id_giayPhepThamDo',$idhosthamdo->id)->first();
                  }
                  
                  if( isset($idhosopheduyet)&&$idhosopheduyet!=null){
                   $idhosokhaithac=App\hoSoCapPhepKhaiThac::where('id_hoSoCapPhepPheDuyetTruLuong',$idhosopheduyet->id)->first();
                 }

                 ?>

                  <td>
                    @if($idhosthamdo!=null)

                  <p>Số giấy phép thăm dò: <span style="color: blue;">{{$idhosthamdo ->soGiayPhepThamDo}}</span>  </p>
                  <p>Ngày giấy phép: <span style="color: blue;">{{$idhosthamdo ->ngayGiayPhep}}</span>  </p>
                  <p>Diện tích cấp phép thăm dò: <span style="color: blue;">{{$idhosthamdo ->dienTichThamDo}}</span>  </p>
                  <p>Doanh nghiệp thăm dò: <span style="color: blue;">{{$idhosthamdo ->doanhNghiep->tenDoanhNghiep}}</span>  </p>
                  <p>Địa chỉ doanh nghiệp <span style="color: blue;">{{$idhosthamdo ->doanhNghiep->diaChi}}</span>  </p>

                    <a href="{{route('chitietthamdo',[$idhosthamdo->id])}}" >Xem chi tiết tại đây</a>
                    @endif
                  </td>
                  <td>
                    @if(isset($idhosopheduyet))


                  <p>Số giấy phép PDTL: <span style="color: blue;">{{$idhosopheduyet ->soGiayPhepPheDuyet}}</span>  </p>
                  <p>Ngày giấy phép: <span style="color: blue;">{{$idhosopheduyet ->ngayGiayPhep}}</span>  </p>
                  <p>Tổng trữ lượng phê duyệt: <span style="color: blue;"> 15535</span>  </p>
                  <p>Doanh nghiệp thăm dò: <span style="color: blue;">{{$idhosopheduyet->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</span>  </p>
                  <p>Địa chỉ doanh nghiệp <span style="color: blue;">{{$idhosopheduyet->hoSoCapPhepthamdo->doanhNghiep->diaChi}}</span>  </p>

                    <a href="{{route('chitietpheduyettrucluong',[$idhosopheduyet->id])}}" > Xem chi tiết tại đây</a>
                    @endif
                  </td>
                  <td>
                    @if(isset($idhosokhaithac))

                    <p>Số giấy phép CPKT: <span style="color: blue;">{{$idhosokhaithac ->soGiayPhepKhaiThac}}</span>  </p>
                    <p>Ngày giấy phép: <span style="color: blue;">{{$idhosokhaithac ->ngayGiayPhep}}</span>  </p>
                    <p>Thời gian cấp phép khai thác: <span style="color: blue;"> {{$idhosokhaithac ->thoiGianCapPhepKhaiThac}}</span>  </p>
                     <p>Trữ lượng cấp phép khai thác: <span style="color: blue;"> {{$idhosokhaithac ->truLuongKhaiThac}} {{$idhosokhaithac->donVi}}</span>  </p>

                    <p>Doanh nghiệp thăm dò: <span style="color: blue;">{{$idhosokhaithac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</span>  </p>
                    <p>Địa chỉ doanh nghiệp <span style="color: blue;">{{$idhosokhaithac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->diaChi}}</span>  </p>


                    <a href="{{route('chitietcapphepkhaithac',[$idhosokhaithac->id])}}" > Xem chi tiết tại đây</a>
                    @endif
                  </td>


                </tr>
               

                </tbody>
              </table>


            </div>


          </div>
          

        </div>

		
	</div>
	
</div>
 

</div>



  @endsection