
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
    <div class="col-md-11"> <h4 style=" float: left; margin: 5px 20px 5px 10px; color: white; font-weight: bold;  line-height:1.5;">DỮ LIỆU ĐIỀU TRA ĐÁNH GIÁ KHOÁNG SẢN</h4></div>
	
            <div class="col-md-1">   <a href="{{route('dulieudieutradanhgiakhoangsan')}}" type="button" style="float: right; margin-top: 5px; margin-right:5px; margin-bottom: 5px;" class="btn btn-danger" > <i class="fa fa-times" aria-hidden="true"></i></a></div>
       
	</div>
	<div class="row" style="width: 95%; background-color: #F0F4F5; padding-top: 20px;padding-bottom: 10px; margin: 0 auto; ">
   
   <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 250px;">Tên trường</th>
       
        <th>Giá trị</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       
        <td>Tên báo cáo</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->tenBaoCao}}</td>
      </tr>
      <tr>
        
        <td>Chủ nhiệm</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->chuNhiem}}</td>
      </tr>
      <tr>
       
        <td>Tên đơn vị lập báo cáo </td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->tenDoanhNghiep}}</td>
      </tr>
      <tr>
       
        <td>Năm báo cáo </td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->nam}}</td>
      </tr>
      <tr>
       
        <td>Số QĐPD</td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->soQuyetDinhPheDuyet}}</td>
      </tr>
      <tr>
       
        <td>Số ký hiệu lưu trữ </td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->soKyHieuLuuTru}}</td>
      </tr>
      <tr>
       
        <td>Diện tích thực hiện </td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->dienTichThucHien}} ha</td>
      </tr>
     

      <tr>
        <td>Ghi chú </td>
        <td>{{$duLieuDieuTraDanhGiaKhoangSanid->ghiChu}}</td>
      </tr>
       <tr>
        <td>File đính kèm </td>

        <td>
          @foreach($filedinhkemgiaypheps as $filedinhkemgiayphep)
          <a href="public/tailieu/{{$filedinhkemgiayphep->tenFile}}"> {{$filedinhkemgiayphep->tenFile}}   <i class="fa fa-download" aria-hidden="true"></i> &nbsp</a>
          @endforeach
        </td>
      </tr>
    </tbody>
  </table>




  </div>

		
	</div>
	
</div>
 

</div>



  @endsection