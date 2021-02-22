
@extends('khoangsan.layout')
@section("content12")


<div class="container" style="background-color: #B8DBF1; padding: 20px 20px 55px 30px; width: 100%;">

<div  class="row">
  <div class="col-md-4" style="margin-top: 40px;">
      <div class="col-md-12">
      <a href="{{route('baocaotheohoso')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid #2861F0; "><center><h5 style=" line-height: 1.5; color:#2861F0;"> <i class="fa fa-area-chart" aria-hidden="true"></i> THEO LOẠI HỒ SƠ</h5></center>  </div>
      </a>
    </div>

      <div class="col-md-12" style="margin-top: 50px;">
      <a href="{{route('baocaonamkhaithac')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid #2861F0; "><center><h5 style=" line-height: 1.5; color:#2861F0;"> <i class="fa fa-bar-chart" aria-hidden="true"></i> THEO THỜI HẠN KHAI THÁC</h5></center>  </div>
      </a>
    </div>

      <div class="col-md-12" style="margin-top: 50px;">
      <a href="{{route('test')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid #2861F0; "><center><h5 style=" line-height: 1.5; color:#2861F0;"> <i class="fa fa-line-chart" aria-hidden="true"></i> THEO LOẠI HỒ SƠ</h5></center>  </div>
      </a>
    </div>

  </div>

    <div class="col-md-8" >
     <!-- <center> <h3 style="color:white;text-shadow: 1px 2px 4px white;">BÁO CÁO - THỐNG KÊ </h3></center> -->
     <img style="  max-width: 90%; " src="public/anh/mind1.png">
  </div>
 </div>




   




</div>
<style type="text/css">
  .boxshow:hover {

  box-shadow:  0 0 10px #2861F0;
  text-shadow: 2px 2px 4px #2861F0;

}{
border: 2px solid red;

  }

</style>



  @endsection


  