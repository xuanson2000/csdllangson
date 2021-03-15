 @extends('khoangsan.layout')

@section("content12")

 <!-- Main content -->
 <section class="content" >
          <!-- Small boxes (Stat box)background:url(public/web/images/bann.jpg) no-repeat 0px 0px; height: 500px;  public/web/images/bann.jpg-->
          

          <!-- /.row -->
          <div class="row" style="background:url(public/admin2/dist/img/238212-gaussian-blur.jpg);background-position: center;  background-repeat: no-repeat;background-size: cover; height: 100%; padding-top: 25px;">

            <div class="col-md-4" >
            <figure class="snip1482">
              <figcaption>
               <ul>
                <li> <a class="abc" href="{{route('doanhnghiep')}}">loại hình doanh nghiệp </a> </li>
                <li><a class="abc" href="{{route('coquancapphep')}}">Cơ quan cấp phép </a></li>
                <li><a class="abc" href="{{route('phongban')}}">Phòng ban </a></li>
                 <li><a class="abc" href="{{route('chucvu')}}">Chức vụ </a></li>
                <li> <a class="abc" href="{{route('loaikhoangsan')}}">Nhóm khoáng sản </a></li>
                 <li> <a class="abc" href="{{route('loaikhoangsan')}}">Loại khoáng sản </a> </li>
                
              </ul>
      

              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/123456111.jpg" alt="sample45" />
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="snip1482">
              <figcaption>
               <ul>
                <li> <a class="abc" href="{{route('dulieudieutradanhgiakhoangsan')}}">Dữ liệu điều tra khoáng sản </a> </li>
                <li><a class="abc" href="{{route('dlmo')}}">Dữ liệu mỏ khoáng sản </a></li>
                <li><a class="abc" href="{{route('dulieucamhanchekhaithac')}}">DL vùng cấm và hạn chế khai thác</a></li>
                <li><a class="abc" href="{{route('dulieuvungquyhoachkhaithac')}}">DL vùng quy hoạch khai thác </a></li>
                
              </ul>
              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/Data111.jpg" alt="sample45" />
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="snip1482">
              <figcaption>
                <ul>
                <li> <a class="abc" href="{{route('thamdokhoangsan')}}">Thăm dò khoáng sản </a> </li>
                <li><a class="abc" href="{{route('truluongkhoangsan')}}">Phê duyệt trữ lượng</a></li>
                <li><a class="abc" href="{{route('capphepkhaithac')}}">Cấp  phép khai thác</a></li>
                 <li><a class="abc" href="{{route('biendongkhoangsan')}}">Thu hồi khai thác</a></li>
                
              </ul>
              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/mining-services111.jpg" alt="sample45" />
            </figure>
          </div>


          <div class="col-md-4"  style="margin-top: 15px;">
            <figure class="snip1482">
              <figcaption>
                <ul>
                <li> <a class="abc" href="{{route('hosotiepnhangiaiquyet')}}">Hồ sơ tiếp nhận giải quyết</a> </li>
                <li><a class="abc" href="{{route('hopdongthuedat')}}">Hợp đồng thuê đất</a></li>
                <li><a class="abc" href="{{route('tiencapquyenkhaithac')}}">Tiền cấp quyền khai thác</a></li>
                 <li><a class="abc" href="{{route('phuchoimoitruong')}}">Phí cải tạo môi trường</a></li>
              </ul>
              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/file-manager11.jpg" alt="sample45" />
            </figure>
          </div>

        
          <div class="col-md-4"style="margin-top: 15px; padding: 0 auto;" >
            <figure class="snip1482">
              <figcaption>
                <h4>BÁO CÁO - THỐNG KÊ</h4>
              
              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/dong111.jpg" alt="sample45" />
            </figure>
          </div>


          <div class="col-md-4" style="margin-top: 15px;">
            <figure class="snip1482">
               <figcaption>
                <ul>
                <li> <a  style="font-size: 16px;" class="abc" href="">BẢN ĐỒ KHOÁNG SẢN</a> </li>
              
              </ul>
              </figcaption>
              <a href="#"></a><img src="public/admin2/dist/img/digital1 (1).jpg" alt="sample45" />
            </figure>
          </div>
            
 <!--      <div class="col-md-4" style="margin-bottom: 30px;">
            <figure class="snip1482">
              <figcaption>
               <ul>
                <li> <a class="abc" href="">Hồ sơ điều tra KS </a> </li>
                <li><a class="abc" href="">Dữ liệu mỏ khoáng sản </a></li>
                <li><a class="abc" href="">DL vùng cấm và hạn chế khai thác</a></li>
                <li><a class="abc" href="">DL vùng quy hoạch khai thác </a></li>
                
              </ul>
            </figcaption>
            <a href="#"></a><img src="public/admin2/dist/img/Data1.jpg" alt="sample45" />
          </figure>
        </div>
        <div class="col-md-4" style="margin-bottom: 30px;">
          <figure class="snip1482">
            <figcaption>
              <ul>
                <li> <a class="abc" href="">Hồ sơ thăm dò khoáng sản </a> </li>
                <li><a class="abc" href="">Hồ sơ phê duyệt trữ lượng</a></li>
                <li><a class="abc" href="">Hồ sơ cấp  phép khai thác</a></li>

                
              </ul>
            </figcaption>
            <a href="#"></a><img src="public/admin2/dist/img/mining-services1.jpg" alt="sample45" />
          </figure>
        </div>


        <div class="col-md-4"  style="margin-bottom: 30px;">
          <figure class="snip1482">
            <figcaption>
              <ul>
                <li> <a class="abc" href="">Hồ sơ tiếp nhận giải quyết</a> </li>
                <li><a class="abc" href="">Hợp đồng thuê đất</a></li>
                <li><a class="abc" href="">Quỹ phục hồi môi trường</a></li>
                <li><a class="abc" href="">Văn bản chỉ đạo</a></li>
              </ul>
            </figcaption>
            <a href="#"></a><img src="public/admin2/dist/img/Data-st1.jpg" alt="sample45" />
          </figure>
        </div> -->


           


          </div>
   
         

          <!-- Main row -->

      <!--     <div class="row" style="background:url(public/admin2/dist/img/238212-gaussian-blur.jpg);background-position: center;  background-repeat: no-repeat;background-size: cover; height: 100%; padding-top: 25px;">

     



          </div> -->
         <!--  ------- -->
        
</section><!-- /.content -->
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Playfair+Display);
@import url(https://fonts.googleapis.com/css?family=Fauna+One);
.snip1482 {
  font-family: 'Fauna One', Arial, sans-serif;
  position: relative;
  margin: 10px 20px;
  min-width: 230px;
  max-width: 295px;
  min-height: 220px;
  width: 100%;
  color: #ffffff;
  text-align: right;
  line-height: 1.4em;
  background-color: rgba(192,192,192,0.08);
  font-size: 16px;
}
.snip1482 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
.snip1482 img {
  position: absolute;
  right: 0%;
  top: 50%;
  opacity: 1;
  width: 100%;
  -webkit-transform: translate(0%, -50%);
  transform: translate(0%, -50%);
}
.snip1482 figcaption {
  position: absolute;
  width: 70%;
  top: 50%;
  left: 0;

  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  padding:-15px 0 20px -25px;
}
.snip1482 h2,
.snip1482 p {
  margin: 0;
  width: 100%;
  -webkit-transform: translateX(20px);
  transform: translateX(20px);
  opacity: 0;
  text-align: left;

}

.snip1482 li {
text-align: left;
 margin: 0;
 font-size: 14px;
 color: white;
 list-style: none;
 border-bottom: #CFD5E4 solid 1px;
margin-left: -20px;
margin-right: 10px;
padding: 5px 0px 5px 0px;

}
.snip1482 li a {
 color: white;

}

.snip1482 li a:hover {
  /*font-weight: bold;
  text-shadow: rgba(255,255,255,1) -1px -2px 0.5em;*/
}
.snip1482 li:hover {
 background-color: #525D6C;

}

.snip1482 h2 {
  font-family: 'Playfair Display', Arial, sans-serif;
  text-transform: uppercase;
  margin-bottom: 5px;
}
.snip1482 p {
  font-size: 0.8em;
}
.snip1482 a {
/*  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;*/
}
.snip1482:hover img,
.snip1482.hover img {
  width: 40%;
  right: -10%;
}
.snip1482:hover figcaption h2,
.snip1482.hover figcaption h2,
.snip1482:hover figcaption p,
.snip1482.hover figcaption p {
  -webkit-transform: translateX(0px);
  transform: translateX(0px);
  opacity: 1;
}

</style>
<script type="text/javascript">
  /* Demo purposes only */
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);

</script>

  @endsection