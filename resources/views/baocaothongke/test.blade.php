
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
  
  <div class="row" style="margin-left: 1px; margin-right: 1px; margin-top:0px;background-color: #525C72;">

  <form action="{{route('kqbaocaonamkhaithac')}}" method="get">

    <div class="col-md-5 form-group" style="margin-left: -8px;  margin-top: 10px;">
      <label style="font-weight: bold; float:left; color: #DDE1F8;">Số năm khai thác còn lại</label>
      <input type="number" class="form-control" id="usr" name="nam" required="">
    </div>


  
    <button style="margin-top: 35px; margin-left:10px;" type="submit" class="btn btn-primary"><img src="public/anh/search-3-16.png"> Tìm kiếm</button>

   

  </form>
  


  



</div>


<table id="example"  class="table table-bordered" style="width: 80%;">
        <thead>
            <tr style="width: 80%;">
                <th>Tên báo cáo</th>
                <th>fh</th>
                <th>hfh</th>
                <th>fh</th>
               
            </tr>
        </thead>
        <tfoot>
          <tr>
            <th style="color: blue;">gjg</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($test as $tests)
          <tr>
            <td>{{$tests->soQuyetDinhPheDuyet}}</td>
            <td>{{$tests->tenBaoCao}}</td>
            <td>{{$tests->nam}}</td>

            <td>{{$tests->tenDoanhNghiep}}</td>
          </tr>
          @endforeach
        </tbody>

   
    </table>




</div>


    <script>
     
      $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#example').DataTable({
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





