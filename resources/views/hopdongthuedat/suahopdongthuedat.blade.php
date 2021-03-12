
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
  <h4>SỬA HỢP ĐỒNG THUÊ ĐẤT</h4> 

<!-- The Modal -->

        <!-- Modal body -->
        <div class="row modal-body" style="width: 60%;" >
  
          <form action="{{route('suahopdongthuedatpost',[$suahopdongthuedat->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
          
            <div class="col-md-12">
            	<div class="form-group ">
            		<label style="font-weight: bold; float:left; ">Hồ sơ cấp phép khai thác <span style="color: red;">(*)</span></label>
            		<select class="" style="width: 100%; "  name="id_khaithac" id="states" required >

            			<option value="{{$suahopdongthuedat->hoSoCapPhepKhaiThac->id}}">{{$suahopdongthuedat->hoSoCapPhepKhaiThac->tenGiayPhep}}
            			</option>
            			<option value="">Chọn hồ sơ</option>


            			@foreach($hoSoCapPhepKhaiThacs as $hoSoCapPhepKhaiThac)
            			@if($hoSoCapPhepKhaiThac->lancapphep==1)
            			<option value="{{$hoSoCapPhepKhaiThac->id}}">{{$hoSoCapPhepKhaiThac ->tenGiayPhep}}
            			</option>
            			@else
            			<option  value="{{$hoSoCapPhepKhaiThac->id}}"> <h1> Khai thác lần {{$hoSoCapPhepKhaiThac->lancapphep}} - {{$hoSoCapPhepKhaiThac ->tenGiayPhep}}</h1> 
            			</option>
            			@endif


            			@endforeach


            		</select>
            		<script>

            			$(document).ready(function(){
            				$("#states").select2({
            					placeholder: "Select a State",
            					allowClear: true
            				});
            			});
            		</script>
            	</div>




            	<div class="form-group">
            		<label for="usr">Số hợp đồng thuê đất<span style="color: red;">(*)</span></label>
            		<input type="text" class="form-control" name="soHopDong" required="" value="{{$suahopdongthuedat->soHopDong}}">
            	</div>

            	<div class="form-group">
            		<label for="usr">Ngày thuê đất <span style="color: red;">(*)</span></label>
            		<input type="date" class="form-control" name="ngayThue" required=""  value="{{$suahopdongthuedat->ngayThue}}">


            	</div>

            	<div class="form-group">
            		<label for="usr">Thời hạn thuê (năm)<span style="color: red;">(*)</span></label>

            		<input type="number" class="form-control" name="thoiGianThue" required="" value="{{$suahopdongthuedat->thoiGianThue}}">

            	</div>

            	<div class="form-group">
            		<label for="usr">Diện tích thuê (ha)<span style="color: red;">(*)</span></label>

            		<input type="number" class="form-control" name="dienTich" required="" value="{{$suahopdongthuedat->dienTich}}" >

            	</div>

            </div>



            <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
             
          </form>

        </div>
        
      
       </div> 
    
  
 

  @endsection