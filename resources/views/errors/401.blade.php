<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body> 
 
<div class="container">
  <div class="card" style=" margin-top: 40px;">
    <div class="card-body" style="font-weight: bold;">Bạn không có quyền vào phân hệ này!</div>
  </div>
</div>

</body>
</html>
 -->


 @extends('khoangsan.layout')

@section("content12")


  

          <div class="error-page" style="margin-top: 100px;">
            <h2 class="headline text-red">500</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> Bạn không có quyền ở chức năng này</h3>
              <p>

                Bạn vui lòng liên hệ với quản trị viên để biết thêm thông tin chi tiết, quay về 
                 <a href="{{route('khoangsan')}}">Trang chủ</a> hoặc tìm kiếm trợ giúp thông tin tại đây.
              </p>
              <form class="search-form">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search" />
                  <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i></button>
                  </div>
                </div><!-- /.input-group -->
              </form>
            </div>
          </div><!-- /.error-page -->

    

  @endsection