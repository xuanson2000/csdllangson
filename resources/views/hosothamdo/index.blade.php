
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

<!-- 	<form action="" method="get">
		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Từ khóa tìm kiếm</label>
			<input type="text" class="form-control" id="usr">
		</div>

		<div class="col-md-3 form-group" style="margin-left: -8px;  margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Quận/huyện</label>
			<select class="form-control" name="tenQuanHuyenseach" id="idtenQuanHuyenseach" required >
				<option value="">Chọn Quận/Huyện</option>
				@foreach($quanHuyens as $quanHuyen)
				<option value="{{$quanHuyen->id}}">{{$quanHuyen->tenQuanHuyen}}</option>
			  @endforeach
			
			</select>
		</div>
		<div class="col-md-3 form-group" style="margin-left: 10px; margin-top: 10px;">
			<label style="font-weight: bold; float:left; color: #DDE1F8;">Xã/Phường </label>
			<select class="form-control" name="tenXaPhuongseach" id="idtenXaPhuongseach" style="width: 230px;" required>
				
			</select>
		</div>
		<div class="col-md-1 form-group" style="; margin-top: 0px;">
			<button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tra cứu</button>
		</div>


	</form> -->
 <div class="col-md-10 form-group" style="margin-top: 10px;">
  <h4 style=" color: white; font-weight: bold;">DANH SÁCH HỒ SƠ THĂM DÒ KHOÁNG SẢN</h4>
</div>

    <div class="col-md-2 form-group" style=" margin-top: 10px;">
      <a href="{{route('themhosothamdo')}}" style="float: right;" class="btn btn-warning" role="button"> <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm hồ sơ</a>
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

              
<table id="thamdo"  class="display"  >
  <thead>
   <tr style="background-color: #AAC1C6;">
   
    <th>Số GPTD</th>
    <th>Tên mỏ</th>
    <th>Tên Doanh nghiệp</th>
    <th>Vị trí hành chính</th>
    <th>Diện tích thăm dò</th>
    <th >Thời gian thăm dò</th>
    <th>Lần thăm dò</th>
    <th>Thao tác</th>
  </tr>
</thead>
<tbody>
 @foreach($hoSoCapPhepthamdos as $hoSoCapPhepthamdo)
 <tr>

  <td>{{$hoSoCapPhepthamdo ->soGiayPhepThamDo}}</td>
  <td>{{$hoSoCapPhepthamdo->duLieuMo->tenMo}}</td>
  <td>{{$hoSoCapPhepthamdo->doanhNghiep->tenDoanhNghiep}}</td>
  <td>{{$hoSoCapPhepthamdo->duLieuMo->xaPhuong->tenXaPhuong}}-{{$hoSoCapPhepthamdo->duLieuMo->xaPhuong->quanHuyen->tenQuanHuyen}}- Tỉnh Lạng Sơn</td>
  <td>{{$hoSoCapPhepthamdo->dienTichThamDo}} ha</td>
  <td>{{$hoSoCapPhepthamdo->thoiGianThamDo}} tháng</td>

  <td>{{$hoSoCapPhepthamdo->lanthamdo}}</td>
  <td> 
    <a href="{{route('chitietthamdo',[$hoSoCapPhepthamdo ->id])}}" > <i class="fa fa-folder-open" aria-hidden="true"></i></a>/
   <a title="Sửa" href="{{route('suathamdo',[$hoSoCapPhepthamdo ->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
   <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('xoahosothamdo',[$hoSoCapPhepthamdo->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <th style="color: blue;"> </th>
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
    $('#thamdo tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#thamdo').DataTable({
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


