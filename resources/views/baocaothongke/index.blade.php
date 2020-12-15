
@extends('khoangsan.layout')
@section("content12")


<div class="container" style="background-color: #658189; padding: 20px 20px 140px 30px; width: 100%;">

<div  class="row">
  <div class="col-md-4" style="margin-top: 100px;">
      <div class="col-md-12">
      <a href="{{route('baocaotheohoso')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid white; "><center><h5 style=" line-height: 1.5; color:white;"> THỐNG KÊ THEO LOẠI HỒ SƠ</h5></center>  </div>
      </a>
    </div>

      <div class="col-md-12" style="margin-top: 50px;">
      <a href="{{route('baocaonamkhaithac')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid white; "><center><h5 style=" line-height: 1.5; color:white;"> THỐNG KÊ THEO THỜI HẠN KHAI THÁC</h5></center>  </div>
      </a>
    </div>

      <div class="col-md-12" style="margin-top: 50px;">
      <a href="{{route('test')}}">
        <div class="boxshow" style="width: 80%; height: 50px; border: 2px solid white; "><center><h5 style=" line-height: 1.5; color:white;"> THỐNG KÊ THEO LOẠI HỒ SƠ</h5></center>  </div>
      </a>
    </div>

  </div>
    <div class="col-md-8" style="margin-top: 150px;">
     <center> <h3 style="color:white;text-shadow: 1px 2px 4px white;">BÁO CÁO - THỐNG KÊ </h3></center>
  </div>
 </div>




   




</div>
<style type="text/css">
  .boxshow:hover {

  box-shadow:  0 0 10px white;
  text-shadow: 2px 2px 4px white;

}{
border: 2px solid red;

  }

</style>



  @endsection


  