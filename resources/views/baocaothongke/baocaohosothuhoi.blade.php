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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72; color: white; margin-bottom: 10px;">
<div class="col-md-10"><h4> DANH SÁCH HỒ SƠ KHOÁNG SẢN BỊ THU HỒI</h4></div>
<div class="col-md-2">  <div class="btn-group" style="margin-top:3px;" >
  <button type="button" class="btn btn-warning"><i class="fa fa-cloud-download" aria-hidden="true"></i> Xuất file</button>
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
    <span style="height: 17px;" class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{route('baocaohosothuhoiex')}}"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file Excel</a></li>
    
  </ul>
</div>
</div>
</div>



<table class="table table-bordered">
    <thead>
      <tr style="background-color: #AAC1C6;">
        <th>STT</th>
        <th>Số GPKH</th>
        <th>Tên mỏ</th>
        <th>Tên Doanh nghiệp</th>
         <th>Năm bắt đầu khai thác</th>
        <th>Thời gian khai thác</th>
        <th>Lý do thu hồi</th>
        <th>Chi tiết</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($reportHoSoThuHoi as $txtthongkehoso)
      <tr>
        <td>{{$loop->index+1}}</td>
       
          <td>{{$txtthongkehoso->soGiayPhepKhaiThac}}</td>

        


        <td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>

     
        <td>{{$txtthongkehoso->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        

        <td>{{date('d-m-Y', strtotime($txtthongkehoso->ngaygiayphep))}}</td>    
        <td>{{$txtthongkehoso->thoigiancapphepkhaithac}} năm</td>

        <?php
        $hosothuhoitralais=App\hosothuhoitralaimo::where('id_khaithac',$txtthongkehoso->id)->first();
        ?>
        <td>{{$hosothuhoitralais->lydo}}</td>

        
        <td><a href="{{route('chitiethosobiendong',[$txtthongkehoso ->id])}}" > XEM</a></td>
      
      </tr>
        @endforeach
    </tbody>
  </table>




</div>



  @endsection

