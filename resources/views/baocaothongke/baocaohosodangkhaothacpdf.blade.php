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

		<p style="margin-bottom:20px; margin-top: 20px; font-weight: bold; text-align: center; color: blue; font-size: 14px;">DANH SÁCH HỒ SƠ KHOÁNG SẢN KHOÁNG SẢN ĐANG KHAI THÁC
			 
		</p>

  
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">STT</th>
					<th style="width:80px;text-align: center; ">Số GPKH</th>
					<th style="width:80px;text-align: center;  ">Tên mỏ</th>
					
					<th style="text-align: center; width:100px;">Doanh nghiệp KT</th>
                    <th style="width:150px; text-align: center;">Vị trí mỏ </th>
                    <th style="width:150px; text-align: center;">Năm bắt đầu KT </th>
                    <th style="width:80px; text-align: center;">Thời gian KT</th>
				</tr>
			</thead>
			<tbody>
				 @foreach($reportHoSoDangKhaithacpdf as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        
          <td>{{$product->soGiayPhepKhaiThac}}</td>



        <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

        @if($product->note==2)
        <?php
        $iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();

        ?>
        <td>{{$iddn->tenDoanhNghiep}}</td>
        @else
        <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        @endif

        <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
         <td>{{date('d-m-Y', strtotime($product->ngaygiayphep))}}</td>
        <td>{{$product->thoigiancapphepkhaithac}} năm</td>

      </tr>
        @endforeach

			</tbody>
		</table>


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

