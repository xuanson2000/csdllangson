
@extends('khoangsan.layout')

@section("content12")

<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: white;
   font-size: 16px;
  }
 td{
  font-family: "Times New Roman", Times, serif;
  font-size: 16px;
 }
 
</style>
<div class="container" style="background-color: white; padding: 20px 20px 20px 30px; width: 100%;">
  
  
<script src="public/data/HanhChinhTinh_0.js"></script>
        <script src="public/data/HanhChinhHuyen_1.js"></script>
        <script src="public/data/LuuVucSong_2.js"></script>
        <script src="public/data/QuyHoach_3.js"></script>
        <script src="public/data/DiaHinh_4.js"></script>
        <script src="public/data/ThuyHe_5.js"></script>
        <script src="public/data/DanCu_6.js"></script>
        <script src="public/data/GiaoThong_7.js"></script>
<script src="public/data/ks/bando/NenDC_0.js"></script>
        <script src="public/data/ks/bando/VungQuyHoachKS_1.js"></script>
        <script src="public/data/ks/bando/VungCamKT_2.js"></script>
        <script src="public/data/ks/bando/QuyHoachVL_3.js"></script>
        <script src="public/data/ks/bando/DiemKTKS_4.js"></script>
        <script src="public/data/ks/bando/DiemTDKS_5.js"></script>
        <script src="public/data/ks/bando/DutGayDC_6.js"></script>
        <script src="public/data/ks/bando/DiemKS_7.js"></script>

      <!-- Navigation end -->
<!-- *************
        ************ Main container start *************
      ************* -->
      <div class="main-container">


<!-- Page header start -->
<!-- Page header end -->
<!-- Content wrapper start -->
       

          

          <!-- Row start -->
          <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title"><p style="color: blue; font-weight: bold; font-size: 16px;">Bản đồ Tài nguyên khoáng sản tỉnh Lạng Sơn</p> </div>
                </div>
                <div class="card-body">
                  <div id="map"  style="width: 100%; height: 700px;"></div>
                  <script src="public/jsmap/mapks.js">
                  </script>
                </div>
              </div>
            </div>
          </div>
          <!-- Row end -->

          

     
        <!-- Content wrapper end -->
        
 
</div>



  @endsection