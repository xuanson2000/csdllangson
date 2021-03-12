<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xuất báo cáo</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{

  	font-family: Times New Roman;
  	}
  </style>
</head>
<body>
	<div class="container12" style="width: 1000px;  margin: 0 auto; margin-top: 50px; margin-bottom: 20px;"> 

		<div class="row top" style="width: 100%; ">
			<div style="float: left; width: 50%; text-align: center; " > <p style="font-size: 13px; margin-bottom: 3px; font-family: times new roman;  "> ỦY BAN NHÂN DÂN TỈNH LẠNG SƠN</p> <p style="font-size: 14px; font-weight: bold; margin-bottom: 3px; font-family: times new roman;  "> SỞ TÀI NGUYÊN VÀ MÔI TRƯỜNG </p>
				<p> </p>

			</div>

			<div style="float: right;width: 50%;text-align: center;"> <p style="font-weight: bold; margin-bottom: 3px; font-family: times new roman;font-size: 14px;  ">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </p> <p>Độc lập - Tự do - Hạnh phúc</p> 
				<i style="font-family: times new roman; font-size: 12px;">Lạng Sơn, ngày...tháng...năm 2021</i></div>
			</div>

		</div>

		<p style="margin-bottom:20px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 14px;">DANH SÁCH HỒ SƠ 
			
		</p>

		@if($loaihoso==1)

		<h4 style="margin-bottom: 20px; margin-top: 20px;color: #0C5EBD;"> Danh sách hồ sơ cấp phép thăm dò khoáng sản {{$KSName->tenLoaiHinhKS}} @if($quanhuyen==0) trên toàn tỉnh Lạng Sơn @else trên địa bàn {{$qhname->tenQuanHuyen}}@endif

		</h4>


		<table class="table table-bordered">
			<thead>
				<tr style="background-color: #AAC1C6;">
					<th>STT</th>
					<th>Số GPTD</th>
					<th>Ngày câp phép</th>
					<th>Tên mỏ</th>
					<th>Vị trí mỏ</th>
					<th>Doanh nghiệp</th>
					<th>Diện tích thăm dò</th>
					<th >Thời gian thăm dò</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($baocaotinhhinhkt as $txtthongkehoso)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$txtthongkehoso ->soGiayPhepThamDo}}</td>
					<td>{{date('d-m-Y', strtotime($txtthongkehoso->ngayGiayPhep))}}</td>
					<td>{{$txtthongkehoso->duLieuMo->tenMo}}</td>

					<td>{{$txtthongkehoso->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

					<td>{{$txtthongkehoso->doanhNghiep->tenDoanhNghiep}}</td>

					<td>{{$txtthongkehoso->dienTichThamDo}} ha</td>
					<td>{{$txtthongkehoso->thoiGianThamDo}} tháng</td>

					

				</tr>
				@endforeach

			</tbody>
		</table>

		@elseif($loaihoso==3)

		<h4 style="margin-bottom: 20px; margin-top: 20px;color: #0C5EBD;"> Danh sách hồ sơ cấp phép khai thác khoáng sản {{$KSName->tenLoaiHinhKS}} @if($quanhuyen==0) trên toàn tỉnh Lạng Sơn @else trên địa bàn {{$qhname->tenQuanHuyen}}@endif

		</h4>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: #AAC1C6;">
					<th>STT</th>
					<th>Số GPKT</th>
					<th>Ngày cấp phép</th>
					<th>Tên mỏ</th>
					<th>Vị trí mỏ</th>
					<th>Doanh nghiệp</th>
					<th>Trữ lượng cấp phép</th>
					<th>Trữ lượng còn lại</th>
					<th>Thời gian khai thác</th>

					

				</tr>
			</thead>
			<tbody>
				@foreach($baocaotinhhinhkt as $txtthongkehoso)
				<tr>
					<td>{{$loop->index+1}}</td>

					<td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>
					<td>{{date('d-m-Y', strtotime($txtthongkehoso->ngaygiayphep))}}</td>
					<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
					<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

					@if($txtthongkehoso->note==2)
					<?php
					$iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();
					?>

					<td>{{$iddn->tenDoanhNghiep}}</td>
					@else
					<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
					@endif
					<td>{{number_format($txtthongkehoso->truLuongKhaiThac)}} {{$txtthongkehoso->donVi}}</td>

					<?php 
					$time=strtotime($txtthongkehoso->ngaygiayphep);
					$namcapphep=date("Y",$time);
					$namdakhaithac=$namnow-$namcapphep;
					$truluongdakhaithac=($txtthongkehoso->congSuatKhaiThac)*$namdakhaithac;
					$truluongconlai=($txtthongkehoso->truLuongKhaiThac)-$truluongdakhaithac;
					?>
					<td>{{number_format($truluongconlai)}} {{$txtthongkehoso->donVi}}</td>

					<td>{{$txtthongkehoso->thoigiancapphepkhaithac}} năm</td>


					

				</tr>
				@endforeach



			</tbody>
		</table>

		@endif



		<div class="ttsv" style="width: 90%; margin:0 auto; margin-top:0px; margin-bottom: 30px;" >

			<div style="float: left; width: 40%; text-align: left;" > 
				<p style=" margin-bottom: -0px;  font-family: times new roman;"> <span style="font-weight: bold; font-family: times new roman; "> Nơi nhận:</span> <br>  
					- UBND Tỉnh;<br>
					- Lãnh đạo sở TN&MT:<br>
					- Các phòng, ban thuộc sở TN&MT ;<br>
					- Lưu VP, NV.<br>
				</p>

			</div>

			<div style="float: right;width: 50%;text-align: center;"> 
				<!-- <p style="">Hồ Chí Minh, ngày 12 tháng 10 năm 2019</p> -->
				<p style="font-weight:bold;  font-family: times new roman;">TM. SỞ TÀI NGUYÊN & MÔI TRƯỜNG<br>
					GIÁM ĐỐC
				</p>
				<p style="margin-top: 80px; font-weight:bold;"></p>

			</div>
		</div>

	
<style type="text/css">
	
td{
	padding: 5px 5px 5px 5px;
}
th{
	padding: 5px 5px 5px 5px;
}
</style>
		
</body>
</html>

