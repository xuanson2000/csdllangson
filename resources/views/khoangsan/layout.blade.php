<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>HỆ THỐNG QUẢN TRỊ Dashboard</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{asset('')}}"/> 

   
  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   

    <!-- Theme style -->
    <link href="public/admin2/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="public/admin2/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
     
     <!-- phan sẹc jquery -->
     <script src="public/js/select2.js"></script>
    <link href="public/css/select2.css" rel="stylesheet"/>

<!--sech -->


<script src="public/js/datatable.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper" >


     @include('khoangsan.header')

     <!-- Left side column. contains the logo and sidebar -->

     @include('khoangsan.menu')

     <!-- Content Wrapper. Contains page content -->
     


     <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <section class="content-header" style="">
        <p style="font-size: 20px; color: #1BB2BA; margin-bottom: 2px;">
          CƠ SỞ DỮ LIỆU TÀI NGUYÊN KHOÁNG SẢN TỈNH LẠNG SƠN
        </p>
        <!--   <h1>
            CƠ SỞ DỮ LIỆU TÀI NGUYÊN KHOÁNG SẢN TỈNH LẠNG SƠN
            
          </h1> -->
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <!--  <li class="active">Database</li> -->
          </ol>
        </section>

        @yield('content12')

        
      </div><!-- /.content-wrapper -->



     
@include('khoangsan.footer')
      <!-- Control Sidebar -->

    </div><!-- ./wrapper -->

 
  
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
 
   
    
    <!-- AdminLTE App -->
    <script src="public/admin2/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  
   
 
    



    

    <script >
      
      function xacnhanxoa(msg){

        if(window.confirm(msg)){
          return true;

        }
        else

          return false;

      }
      function confirmAction() {
        return confirm("Thông báo?")
      }

    </script>

    @yield('script')
    @yield('script1')
      @yield('scriptseach')
 

  </body>
</html>
