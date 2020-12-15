
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

@if(Session::has('messgxoa'))
<div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo</strong> {{Session::get('messgxoa')}}
</div>
@endif


     
 <h4 style="margin-bottom: 20px; margin-top: 20px;">BÁO CÁO TÌNH KHAI THÁC KHOÁNG SẢN HÀNG NĂM</h4>

  <table class="table table-bordered" style="width: 86%;">
                <thead>
                	 <tr>
                  <th colspan="3">{{$tenmo->tenMo}}</th>
                </tr>
               
                  <tr>
                  
                    <th>Năm</th>
                    <th>Trữ lượng khai thác</th>
                    <th>Thuế tài nguyên</th>
                    <th>Thuế GTGT</th>
                    <th>Phí môi trường</th>
                    <th>Tiền thuê đất</th>
                    <th>File đính kèm</th>
                    <th>Thao tác</th>

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

                  <td style="text-align: center;"> 

                  	<a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('xoabaocaokhoangsanhangnam',[$nopNganSachKhoangSan->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
                @endforeach

                </tbody>
              </table>






	
</div>


</div>



@endsection