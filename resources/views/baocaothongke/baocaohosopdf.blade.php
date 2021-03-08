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
			@if($loaihoso==1)
			THĂM DÒ KHOÁNG SẢN
			@elseif($loaihoso==2)
			PHÊ DUYỆT TRỮ LƯỢNG
			@elseif($loaihoso==3)
			CẤP PHÉP KHAI THÁC
			@endif
			TRONG NĂM {{$nam}}
		</p>

     @if($loaihoso==1)
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">STT</th>
					<th style="width:80px;text-align: center; ">Số GPTD</th>
					<th style="width:80px;text-align: center;  ">Tên mỏ</th>
					
					<th style="text-align: center; width:100px;">Tên Doanh nghiệp</th>
                    <th style="width:150px; text-align: center;">Vị trí hành chính </th>
					<th style="width:80px; text-align: center;">Diện tích thăm dò</th>
                    <th style="width:80px; text-align: center;">Thời gian thăm dò</th>
				</tr>
			</thead>
			<tbody>
				@foreach($txtthongkehosos as $txtthongkehoso)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$txtthongkehoso->soGiayPhepThamDo}}</td>
					<td>{{$txtthongkehoso->duLieuMo->tenMo}}</td>
					<td>{{$txtthongkehoso->doanhNghiep->tenDoanhNghiep}}</td>
					<td>{{$txtthongkehoso->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
					<td>{{$txtthongkehoso->dienTichThamDo}} ha</td>
					<td>{{$txtthongkehoso->thoiGianThamDo}} tháng</td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
@elseif($loaihoso==2)

<table class="table table-bordered">
	<thead>
		<tr style="background-color: #AAC1C6;">
			<th>STT</th>
			<th>Số GPTD</th>
			<th>Tên mỏ</th>
			<th>Tên Doanh nghiệp</th>
			<th>Vị trí hành chính</th>
			<th>Tổng trữ lượng</th>
		</tr>
	</thead>
	<tbody>
		@foreach($txtthongkehosos as $txtthongkehoso)
		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$txtthongkehoso ->soGiayPhepPheDuyet}}</td>
			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
			<td>{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
			<td>{{$txtthongkehoso->tongTruLuong}} {{$txtthongkehoso->donVi}}</td>

		</tr>
		@endforeach



	</tbody>
</table>
@elseif($loaihoso==3)

<table class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
    		<th>STT</th>
    		<th>Số GPKH</th>
    		<th>Tên mỏ</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Vị trí hành chính</th>
    		<th>Thời gian khai thác</th>
    	</tr>
    </thead>
    <tbody>
    	@foreach($txtthongkehosos as $txtthongkehoso)
    	<tr>
    		<td>{{$loop->index+1}}</td>
        @if($txtthongkehoso->index_biendong==1)
        <?php
        $hoSoBienDongKhoangSan=App\hoSoBienDongKhoangSan::where('id_hoSoCapPhepKhaiThac',$txtthongkehoso->id)->first();
        ?>
    		<td>{{$hoSoBienDongKhoangSan->soGiayPhep}}</td>
        @else
          <td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>

        @endif


    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

        @if($txtthongkehoso ->index_biendong==1)
        <td>{{$hoSoBienDongKhoangSan->doanhNghiepChuyenNhuong->tenDoanhNghiep}}</td>
        @else
         <td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        @endif

    		<td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

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

