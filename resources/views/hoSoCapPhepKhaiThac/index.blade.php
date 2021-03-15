
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

  tfoot input {
    width: 100%;
    
  }
   tfoot {
        display: table-header-group;
    }
 
</style>

<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
  <div class="row" style="margin-bottom: 20px; margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">


	
 <div class="col-md-10 form-group" style="margin-top: 10px;">
  <h4 style=" color: white; font-weight: bold;">DANH SÁCH HỒ SƠ CẤP PHÉP KHAI THÁC KHOÁNG SẢN</h4>
</div>

<div class="col-md-2 form-group" style=" margin-top: 10px;">
  <a href="{{route('themhosocapphepkhaithac')}}" style="float: right;" class="btn btn-warning" role="button"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm hồ sơ</a>
</div>

	
	
</div>

@if(Session::has('messgthem'))
<div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthem')}}
</div>
@endif

@if(Session::has('messgthemtruluong'))
<div class="alert alert-info alert-dismissible" style="background-color:#C3D9E2;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công</strong> {{Session::get('messgthemtruluong')}}
</div>
@endif 

@if(Session::has('messgxoa'))

<div class="alert alert-success">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{Session::get('messgxoa')}}</div>
@endif

@if(Session::has('messgsua'))

<div class="alert alert-success">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{Session::get('messgsua')}}</div>
@endif

            
  <table id="capphep"  class="table table-bordered">
    <thead>
    	<tr style="background-color: #AAC1C6;">
       
    		<th>Số GPKH</th>
        <th>Ngày cấp phép</th>
    		<th>Tên mỏ</th>
    		<th>Tên Doanh nghiệp</th>
    		<th>Vị trí hành chính</th>
    		<th>Thời gian khai thác</th>
    		
    		
        <th>Chi tiết</th>
    	</tr>
    </thead>
    <tbody>
    	@foreach($hoSoCapPhepKhaiThacs as $hoSoCapPhepKhaiThac)
    	<tr>
        <td>{{$hoSoCapPhepKhaiThac->soGiayPhepKhaiThac}}</td>
       <td>{{date('d-m-Y', strtotime($hoSoCapPhepKhaiThac->ngaygiayphep))}}</td>
        <td>{{$hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->tenMo}} - {{$hoSoCapPhepKhaiThac->id}}</td>

        @if($hoSoCapPhepKhaiThac->note==2)
        <?php
        $iddn=App\doanhNghiepChuyenNhuong::where('id_doanhnghiep',$hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->id)->first();

        ?>
        <td>{{$iddn->tenDoanhNghiep}}</td>
        @else
         <td>{{$hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
        @endif

    		<td>{{$hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoCapPhepKhaiThac->hoSoCapPhepPheDuyetTruLuong->hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>

    		<td>{{$hoSoCapPhepKhaiThac->thoigiancapphepkhaithac}} năm</td>
    		
    		
    		


    		<td style="text-align: center;"> 
          <a  title="chi tiết" href="{{route('chitietcapphepkhaithac',[$hoSoCapPhepKhaiThac ->id])}}" ><i class="fa fa-list" aria-hidden="true"></i></a>

    		</td>
    	</tr>
        @endforeach

        
      
    </tbody>

    <tfoot >
  <tr>
    <th style="color: blue;"></th>
    <th style="color: blue;" ></th>
    <th style="color: blue;"></th>
    <th style="color: blue;"></th>
    <th style="color: blue;"></th>
    <th style="color: blue;"></th>
    <th style="color: blue;"></th>
  </tr>
</tfoot>
  </table>

      






</div>


<script>

  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#capphep tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#capphep').DataTable({
      initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
              var that = this;
              
              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                  .search( this.value )
                  .draw();
                }
              } );
            } );
          }
        });
    
  } );


</script>
  
  @endsection


