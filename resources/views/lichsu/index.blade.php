
 @extends('khoangsan.layout')
 


@section("content12")
<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 15px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  <h4>LỊCH SỬ NGƯỜI DÙNG TRUY CẬP HỆ THỐNG</h4>   


  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>TÊN NGƯỜI DÙNG</th>
        <th>THAO TÁC</th>
         <th>TÊN BẢN GHI</th>
         <th>BẢNG DỮ LIỆU</th>
         <th>NGÀY THÁNG</th>
         <th>ĐỊA CHỈ IP NGƯỜI DÙNG</th>
      </tr>
    </thead>
    <tbody>

    	@foreach($lichSuTruyCaps as $lichSuTruyCap)
      <tr>
        <td style="text-align: center;">{{$loop->index+1}}</td>
        <td>{{$lichSuTruyCap->quantri->namclass}}</td>
        <td>{{$lichSuTruyCap->thaoTac}}</td>
        <td>{{$lichSuTruyCap->tenBanGhi}}</td>
        <td>{{$lichSuTruyCap->tenBang}}</td>
        <td>{{$lichSuTruyCap->created_at}}</td>
        <td>{{$lichSuTruyCap->ip_client}}</td>
        
      </tr>
      @endforeach
   
    </tbody>
  </table>
{{$lichSuTruyCaps->links()}}
  

</div>


  @endsection

