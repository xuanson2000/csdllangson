
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

	<form action="{{route('kqbaocaonamkhaithac')}}" method="get">

		<div class="col-md-5 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Số năm khai thác còn lại</label>
			<input type="number" class="form-control" id="usr" name="nam" required="">
		</div>
		<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

    @if(isset($products) && $products!=null)
    <div class="btn-group" style="margin-top: 35px; margin-left:10px;" >
      <button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
        <span style="height: 17px;" class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('kqbaocaonamkhaithacexcel',[$sonam])}}"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file Excel</a></li>
        <li><a href="{{route('kqbaocaonamkhaithacpdf',[$sonam])}}"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Xuất file PDF</a></li>
      </ul>
    </div>

    @endif

	</form>
	
	



</div>





 

@if(isset($products) && $products!=null)
  

  <h4 style="margin-bottom: 20px; margin-top: 20px;">Danh sách mỏ khoáng sản còn dưới {{$sonam}} năm khai thác </h4>
             
 <table class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
        <th>STT</th>
        <th>Số GPKH</th>
        <th>Tên mỏ</th>
        <th>Doanh nghiệp KT</th>
        <th>Vị trí mỏ</th>
        <th>Năm bắt đầu KT</th>
        <th>Thời gian KT</th>
        <th>Chi tiết</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        @if($product->index_biendong==1)
        <?php
        $hoSoBienDongKhoangSan=App\hoSoBienDongKhoangSan::where('id_hoSoCapPhepKhaiThac',$product->id)->first();
        ?>
        <td>{{$hoSoBienDongKhoangSan->soGiayPhep}}</td>
        @else
          <td>{{$product->soGiayPhepKhaiThac}}</td>

        @endif

        <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

        @if($product ->index_biendong==1)
        <td>{{$hoSoBienDongKhoangSan->doanhNghiepChuyenNhuong->tenDoanhNghiep}}</td>
        @else
         <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        @endif

        <td>{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$product->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
       
       <td>{{date('d-m-Y', strtotime($product->ngaygiayphep))}}</td>

        <td>{{$product->thoigiancapphepkhaithac}} năm</td>
        
        
        <td><a href="{{route('chitietcapphepkhaithac',[$product ->id])}}" > XEM</a></td>
      
      </tr>
        @endforeach

        
      
    </tbody>
  </table>
 
@else
 
<h4 style="margin-left: 10px; color: red;">Không có kết quả nào ... </h4>



@endif




</div>



  @endsection


  @section('script')
  <script>
      $("#idtenQuanHuyen").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong/"+idtong,function(data){
        $("#idtenXaPhuong").html(data);
      });
    });  </script>
  @endsection


 
  @section('scriptseach')
  <script>
    $("#idtenQuanHuyenseach").change(function(){
      var idtong =$(this).val();
      $.get("khoang-san/ajax/xa-phuong-seach/"+idtong,function(data){
        $("#idtenXaPhuongseach").html(data);
      });
    });  </script>
    @endsection




  @section('script1')
  <script>
      $("#idnhomKhoangSan").change(function(){
      var idnhomks =$(this).val();
      $.get("khoang-san/ajax/loai-hinh-khoang-san/"+idnhomks,function(data){
        $("#idloaiHinhKhoangSan").html(data);
      });
    });  </script>
  @endsection
