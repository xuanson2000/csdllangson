
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
    <h4 style="float: left; margin: 10px 10px 10px 10px; color: white; font-weight: bold;">{{$chitietdulieumos->tenMo}}</h4>

    <a  title="Trở về" href="{{route('dlmo')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a>
    <a title="Sửa" href="{{route('suadulieumo',[$chitietdulieumos->id])}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	</div>
	<div class="row" style="width: 95%; background-color:white; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; border: 1px solid #AEB3B7;">

		 <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active">
              <a style="font-weight: bold;" class="nav-link active" data-toggle="tab" href="#home">Thông tin chung</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu1">Đặc điểm địa chất, khoáng sản</a>
            </li>
            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu3">Các công tác tiến hành</a>
            </li>

             <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu4">Thủ tục hành chính</a>
            </li>

            <li class="nav-item">
              <a style="font-weight: bold;" class="nav-link" data-toggle="tab" href="#menu2">Báo cáo khai thác hàng năm</a>
            </li>
          

          </ul>

          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
               <table class="table table-bordered" style="width: 86%; ">
              
                <tbody>

                 <tr>
                  <td>Ký hiệu mỏ</td>
                  <td>{{$chitietdulieumos->kyHieuMo}}</td>

                </tr>
                <tr>
                  <td>Tên mỏ</td>
                  <td>{{$chitietdulieumos->tenMo}}</td>

                </tr>
                <tr>
                  <td>Vị trí hành chính</td>
                  <td>{{$chitietdulieumos->xaPhuong->tenXaPhuong}} - {{$chitietdulieumos->xaPhuong->quanHuyen->tenQuanHuyen}} -Tỉnh Lạng Sơn</td>

                </tr>
             

               <tr>
                <td>Nguồn gốc</td>
                <td>{{$chitietdulieumos->nguonGoc}}</td>
              </tr>
              <tr>
                <td>Quy Mô</td>
                <td>{{$chitietdulieumos->quyMo}}</td>
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
                <td>{{$chitietdulieumos->coQuanCapPhep->tenCoQuan}}</td>
              </tr>

                 <tr>
                  <td>Vị trí tọa độ</td>
                  <td>
                   <?php
                   $toaDos=DB::table('toaDo')->where('id_loaiHoSo','1')->where('id_HoSo',$chitietdulieumos->id)->get();
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
            <!--     <thead>
                  <tr>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>

                  </tr>
                </thead> -->
                <tbody>


                  <tr>
                    <td>Nhóm khoáng sản</td>
                    <td>{{$chitietdulieumos->loaiHinhKhoangSan->nhomKhoangSan->tenNhomKS}}</td>
                  </tr>
                
                  <tr><td>
                  Loại khoáng sản</td>
                  <td>{{$chitietdulieumos->loaiHinhKhoangSan->tenLoaiHinhKS}}</td>
                </tr>

                <tr>
                  <td>Nguồn gốc</td>
                  <td>{{$chitietdulieumos->nguonGoc}}</td>
                </tr>




                <tr>
                  <td>Đặc điểm địa chất</td>
                  <td>{{$chitietdulieumos->dacDiemDiaChat}}.</td>
                </tr>
                <tr>
                  <td>Đặc điểm khoáng sản</td>
                  <td> {{$chitietdulieumos->dacdiemKhoang}}</td>
                </tr>
                <tr>
                  <td>Công tác tiến hành</td>
                  <td>{{$chitietdulieumos->congTacTienHanh}}</td>
                </tr>

              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>

             

              <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                  <th colspan="3">Tổng trữ lượng : {{number_format($chitietdulieumos->truLuong)}} {{$chitietdulieumos->donVi}}</th>
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


            </div>

            <div id="menu4" class="container tab-pane fade"><br>

             <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                  <th  style="background-color: #3060B7;" colspan="3">Hợp đồng thu đất</th>
                </tr>
                  <tr>
                  
                    <th style="width: 100px;">Số HĐTĐ</th>
                    <th style="width: 100px;">Tên mỏ</th>
                    <th style="width: 100px;">Doanh nghiệp</th>
                    <th>Ngày Thuê</th>
                    <th>Diện tích thuê</th>
                    <th>Tiền thuê</th>
                  </tr>
                </thead>
                <tbody>
               
                 @foreach($hoDongThueDat as $hoDongThueDats)
                 <tr>
                  <td> {{$hoDongThueDats->soHopDong}} </td>
                  <td> {{$hoDongThueDats->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}} </td>
                  <td> {{$hoDongThueDats->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}} </td>
                  <td> {{$hoDongThueDats->ngayThue}} </td>
                  <td> {{$hoDongThueDats->dienTich}} </td>
                  <td> {{$hoDongThueDats->chiPhi}} </td>
                </tr>
                @endforeach

                </tbody>
              </table>



             <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                  <th  style="background-color: #3060B7;"  colspan="3">Tiền cấp quyền khai thác</th>
                </tr>
                  <tr>
                   <th style="width: 100px;">SỐ QĐ</th> 
                   <th style="width: 100px;">NGÀY QĐ</th>
                   <th style="width: 100px;">TÊN MỎ</th>
                   <th>DOANH NGHIỆP</th>

                   <th>TỔNG TIỀN PHẢI NỘP </th>
                   <th> SỐ LẦN NỘP </th>
                   <th>SỐ TIỀN NỘP LẦN ĐẦU</th>
                  </tr>
                </thead>
                <tbody>
               
                 @foreach($tiencapquyenkhaithac as $tiencapquyenkhaithacs)
                 <tr>
                  <td>{{$tiencapquyenkhaithacs->soqd}}</td>
                  <td> {{date('d-m-Y', strtotime($tiencapquyenkhaithacs->ngayquyetdinh))}}</td>
                  <td>{{$tiencapquyenkhaithacs->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
                  <td>{{$tiencapquyenkhaithacs->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}} </td>
                  <td>{{$tiencapquyenkhaithacs->tongtien}} VNĐ</td>
                  <td>{{$tiencapquyenkhaithacs->solannop}} Lần</td>
                  <td>{{$tiencapquyenkhaithacs->sotiennoplandau}} VNĐ</td>
                </tr>
                @endforeach

                </tbody>
              </table>

              <table class="table table-bordered" style="width: 86%;">
                <thead>
                 <tr>
                  <th  style="background-color: #3060B7;" colspan="3">Tiền ký quỹ phục hồi môi trường</th>
                </tr>
                <tr>
                 
                 
                 <th style="width: 100px;">SỐ QĐ</th> 
                 <th style="width: 100px;">NGÀY QĐ</th>
                 <th  style="width: 100px;">TÊN MỎ</th>
                 <th>DOANH NGHIỆP</th>

                 <th>TỔNG KINH PHÍ CẢI TẠO PHỤC HỒI, MÔI TRƯỜNG</th>
                 <th>SỐ LẦN KÝ QUỸ </th>
                 <th>SỐ TIỀN KÝ QUỸ LẦN ĐẦU</th>
                 <th>SỐ TIỀN KÝ QUỸ HÀNG NĂM</th>
               </tr>
             </thead>
             <tbody>

               @foreach($tienkyquymoitruong as $tienkyquymoitruongs)
               <tr>
                <td>{{$tienkyquymoitruongs->soqd}}</td>
                <td>{{$tienkyquymoitruongs->ngayquyetdinh}}</td>
                <td>{{$tienkyquymoitruongs->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
                <td>{{$tienkyquymoitruongs->hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}} </td>
                <td>{{$tienkyquymoitruongs->tongtien}} VNĐ</td>
                <td>{{$tienkyquymoitruongs->solannop}} Lần</td>
                <td>{{$tienkyquymoitruongs->tiennoplandau}} VNĐ</td>
                <td>{{$tienkyquymoitruongs->tiennoplanhai}} VNĐ</td>
              </tr>
              @endforeach

            </tbody>
          </table>



            </div>



            <div id="menu3" class="container tab-pane fade"><br>

              <table class="table table-bordered" style="width: 80%;">
                <thead>
                 <?php 

                 $idhosthamdo=App\hoSoCapPhepthamdo::where('id_mo',$chitietdulieumos->id)->first();

                 if($idhosthamdo!=null){


                  $idhosopheduyet=App\hoSoCapPhepPheDuyetTruLuong::where('id_giayPhepThamDo',$idhosthamdo->id)->first();

                 

                }

                if(isset($idhosopheduyet)&&$idhosopheduyet!=null){
                 $idhosokhaithac=App\hoSoCapPhepKhaiThac::where('id_hoSoCapPhepPheDuyetTruLuong',$idhosopheduyet->id)->first();

               }

               ?>

                  <tr>
                    <th>HỒ SƠ THĂM DÒ KHOÁNG SẢN</th>
                    <th>
                      @if($idhosthamdo!=null)
                      <a type="button" class="btn btn-info" href="{{route('chitietthamdo',[$idhosthamdo->id])}}">Xem chi tiết</a>
                       
                      @else
                      <a type="button" class="btn btn-danger" >Chưa có hoạt động</a>
                       @endif
                    </th>
                  </tr>

                   <tr>
                    <th>HỒ SƠ PHÊ DUYỆT TRỮ LƯỢNG KHOÁNG SẢN</th>
                    <th>
                     
                      @if(isset($idhosopheduyet))
                      <a type="button" class="btn btn-primary " href="{{route('chitietpheduyettrucluong',[$idhosopheduyet->id])}}">Xem chi tiết</a>
                      @else
                      <a type="button" class="btn btn-danger" >Chưa có hoạt động</a>
                      @endif

                    </th>
                  </tr>


                   <tr>
                    <th>HỒ SƠ CẤP PHÉP KHAI THÁC KHOÁNG SẢN</th>
                    <th>
                     @if(isset($idhosokhaithac))
                     <a type="button" class="btn btn-warning" href="{{route('chitietcapphepkhaithac',[$idhosokhaithac->id])}}">Xem chi tiết</a>
                     @else
                      <a type="button" class="btn btn-danger" >Chưa có hoạt động</a>


                     @endif

                    </th>
                  </tr>

                </thead>

              </table>



            </div>


          </div>
          

        </div>

		
	</div>
	
</div>
 

</div>



  @endsection