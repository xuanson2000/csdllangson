  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="public/anh/{{Auth::guard('quantri')->user()->anh}}" class="img-circle" alt="User Image" />
            </div>

            <div class="pull-left info">
              @if(Auth::guard('quantri')->check())
              <p>{{Auth::guard('quantri')->user()->namclass}} </p>
              <a><i class="fa fa-circle text-success"></i> Trực tuyến</a>
              @endif
            </div>


          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Tìm kiếm ...." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           <!--  <li class="header">MAIN NAVIGATION</li> -->
        <!--     <li class="active treeview">
              <a href="public/admin2/#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="public/admin2/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="public/admin2/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li> -->
            <li class="treeview">
              <a href="">
                <i class="fa fa-cog"></i> <span>CẬP NHẬT HỆ THỐNG</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('doanhnghiep')}}"><i class="fa fa-circle-o"></i> Cập nhật loại hình doanh nghiệp</a></li>
                <li><a href="{{route('coquancapphep')}}"><i class="fa fa-circle-o"></i> Cập nhật cơ quan cấp phép</a></li>
                <li><a href="{{route('quanhuyen')}}"><i class="fa fa-circle-o"></i> Cập nhật Quận/Huyện</a></li>
                <li><a href="{{route('xaphuong')}}"><i class="fa fa-circle-o"></i> Cập nhật Xã/ phường</a></li>

                <li><a href="{{route('phongban')}}"><i class="fa fa-circle-o"></i> Cập nhật phòng ban</a></li>

                 <li><a href="{{route('chucvu')}}"><i class="fa fa-circle-o"></i> Cập nhật Chức vụ</a></li>
                  <li><a href="{{route('nhomkhoangsan')}}"><i class="fa fa-circle-o"></i> Cập nhật nhóm khoáng sản </a></li>

                 <li><a href="{{route('loaihinhkhoangsan')}}"><i class="fa fa-circle-o"></i> Cập nhật tên khoáng sản</a></li>




              </ul>
            </li>

                 <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-th"></i>
                <span>DỮ LIỆU KHOÁNG SẢN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="{{route('dulieudieutradanhgiakhoangsan')}}"><i class="fa fa-circle-o"></i>DL Điều tra đánh giá kháng sản</a></li>

                <li><a href="{{route('dlmo')}}"><i class="fa fa-circle-o"></i>Dữ liệu mỏ khoáng sản</a></li>

                <!-- <li><a href="{{route('dldongmo')}}"><i class="fa fa-circle-o"></i>Dữ liệu đóng cửa mỏ</a></li>
 -->
                <li><a href="{{route('dulieucamhanchekhaithac')}}"><i class="fa fa-circle-o"></i>DL Vùng cấm và hạn chế khai thác</a></li>
               <li><a href="{{route('dulieuvungquyhoachkhaithac')}}"><i class="fa fa-circle-o"></i>DL Vùng quy hoạch khai thác</a></li>
                
              
              <!--   <li><a href="public/admin2/pages/charts/flot.html"><i class="fa fa-circle-o"></i> da </a></li>
                <li><a href="public/admin2/pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> -->
              </ul>
            </li>


            <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-area-chart"></i>
                <span> HỒ SƠ KHOÁNG SẢN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('thamdokhoangsan')}}"><i class="fa fa-circle-o"></i>Thăm dò khoáng sản</a></li>
                <li><a href="{{route('truluongkhoangsan')}}"><i class="fa fa-circle-o"></i>Phê duyệt trữ lượng</a></li>
                <li><a href="{{route('capphepkhaithac')}}"><i class="fa fa-circle-o"></i>Cấp phép khai thác</a></li>
                <li><a href="{{route('biendongkhoangsan')}}"><i class="fa fa-circle-o"></i>Biến động khoáng sản</a></li>

              </ul>
            </li>

         

            
            
          <!--   <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-files-o"></i>
                <span>QUY HOẠCH KHAI THÁC</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="public/admin2/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Danh sách hồ sơ</a></li>
                <li><a href="public/admin2/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Cập nhật hồ sơ</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-files-o"></i>
                <span>VÙNG CẤM VÀ HCKT</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="public/admin2/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Danh sách hồ sơ</a></li>
                <li><a href="public/admin2/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Cập nhật hồ sơ</a></li>
              </ul>
            </li>
          -->


          <!--   <li>
              <a href="public/admin2/pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> -->


       

            <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-university"></i>
                <span>THỦ TỤC HÀNH CHÍNH</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('hosotiepnhangiaiquyet')}}"><i class="fa fa-circle-o"></i> Hồ sơ tiếp nhận giải quyết</a></li>
                <li><a href="{{route('hopdongthuedat')}}"><i class="fa fa-circle-o"></i>Hợp đồng thuê đất </a></li>
                <li><a href="{{route('tiencapquyenkhaithac')}}"><i class="fa fa-circle-o"></i>Tiền cấp quyền khai thác </a></li>
                <li><a href="{{route('phuchoimoitruong')}}"><i class="fa fa-circle-o"></i>Phí cải tạo, phục hồi môi trường </a></li>

                <!-- <li><a href="{{route('nopngansach')}}"><i class="fa fa-circle-o"></i> Nộp ngân sách khoáng sản </a></li> -->
               
                <li><a href="{{route('baocaoketquakhaithackshangnam')}}"><i class="fa fa-circle-o"></i>Nộp ngân sách hàng năm</a></li>
              
              </ul>
            </li>





       <!--      <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="public/admin2/pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="public/admin2/pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="public/admin2/pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="public/admin2/pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="public/admin2/pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="public/admin2/pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li> -->

         <!--    <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="public/admin2/pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="public/admin2/pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="public/admin2/pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li> -->


         


            <li class="treeview">
              <a href="" >
                <i class="fa fa-line-chart"></i> <span>BÁO CÁO THỐNG KÊ</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                <li><a href="{{route('baocaothongke')}}"><i class="fa fa-circle-o"></i> Báo cáo - thống kê</a></li>
              
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{route('lichsutruycap')}}"><i class="fa fa-circle-o"></i> Lịch sử truy cập</a></li>
              
              </ul>


            </li>

            <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-university"></i>
                <span>PHÂN QUYỀN </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('nguoidung')}}"><i class="fa fa-circle-o"></i> Quản trị người dùng</a></li>
                <!-- <li><a href="{{route('thuedat')}}"><i class="fa fa-circle-o"></i> Hợp đồng thuê đất </a></li> -->
                <!-- <li><a href="{{route('nopngansach')}}"><i class="fa fa-circle-o"></i> Nộp ngân sách khoáng sản </a></li> -->

                <li><a href="{{route('vaitro')}}"><i class="fa fa-circle-o"></i>Quản trị vai trò</a></li>

              </ul>
            </li>


            </li>

             
               <li >
                <a href="http://123.16.176.44:8888/mapkhoangsan/index.blade.php"> <i  class="fa fa-map-marker"></i>  <span>BẢN ĐỒ KHOÁNG SẢN </span></a>
              <!-- <a >
                <a href=""> <i  class="fa fa-folder"></i>  <span>BẢN ĐỒ KHOÁNG SẢN</span></a>
                <i class="fa fa-angle-left pull-right"></i>
              </a> -->
              <!-- <ul class="treeview-menu">
                <li><a href="{{route('bando')}}"><i class="fa fa-circle-o"></i>Bản đồ</a></li>
                <li><a href="public/admin2/pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="public/admin2/pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="public/admin2/pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="public/admin2/pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="public/admin2/pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="public/admin2/pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul> -->
            </li>
           
         <!--    <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="public/admin2/#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li> -->



           <!--  <li><a href="public/admin2/documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
           <?php 
           $today = date("d-m-Y H:i:s");
            ?>
            <li style="font-size: 15px; color: #07F41E;" class="header">Hôm nay: {{$today}}</li>
            <!-- <li><a href="public/admin2/#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="public/admin2/#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="public/admin2/#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>