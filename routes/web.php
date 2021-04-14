<?php


Route::get('/', function () {
    return view('trangchu.index');
});


Route::get('/khoangsan', function () {
    return view('main.index');
});



Route::get('/login-user',[
  'as'=>'loginUser',
  'uses'=>'admincontroller@getlogin'
]);

Route::post('/login-user',[
  'as'=>'loginUserpost',
  'uses'=>'admincontroller@postlogin'
]);

Route::get('reset-user/{id}', [
  'as'=>'reset-user',
  'uses'=>'admincontroller@shownhaplaiForm'
]);
Route::post('reset-user/{id}',[
  'as'=>'reset-userpost',
  'uses'=>'admincontroller@nhaplai'
]);

Route::get('/logut-user',[
  'as'=>'logout-user',
  'uses'=>'admincontroller@getlogout'
]);





Route::get('/dang-nhap-vao-he-thong',[
  'as'=>'dangnhap',
  'uses'=>'admincontroller@getdangnhap'
]);

Route::post('/dang-nhap',[
  'as'=>'dangnhappost',
  'uses'=>'admincontroller@postdangnhap'
]);
Route::get('/dang-nhap/{id}',[
  'as'=>'reset_dangnhap',
  'uses'=>'admincontroller@reset_dangnhap'
]);
Route::post('/dang-nhap/{id}',[
  'as'=>'reset_dangnhappost',
  'uses'=>'admincontroller@reset_dangnhappost'
]);
Route::get('/logut-dang-nhap',[
  'as'=>'logout-dang-nhap',
  'uses'=>'admincontroller@getlogoutdangnhap'
]);

//phân quan trị quyền
      
route::group(['prefix'=>'admin','middleware'=>'Admin'],function(){

 
});


route::group(['prefix'=>'khoang-san','middleware'=>'Quantri'],function(){


//xu lý ajax

  Route::prefix('ajax')->group(function () {
    route::get('xa-phuong/{idquanHuyen}/','AjaxController@getxaphuong');

  });


  Route::prefix('ajax')->group(function () {
    route::get('xa-phuong-seach/{idtenQuanHuyenseach}/','AjaxController@getxaphuongseach');

  });



  Route::prefix('ajax')->group(function () {
    route::get('loai-hinh-khoang-san/{idNhomKS}/','AjaxController@getloaihinhkhoangsan');

  });


  // lịch sư truy cập
  

  Route::get('/lich-su-truy-cap',[
    'as'=>'lichsutruycap',
    'uses'=>'controllerLichsu@index',
    'middleware'=>'Checkquyen:khoang-san'

  ]);




  Route::get('/',[
    'as'=>'khoangsan',
    'uses'=>'ControllerKhoangsan@index',
    'middleware'=>'Checkquyen:khoang-san'

  ]);


//loại hinh doanh nghiêp

  Route::get('/loai-hinh-doanh-nghiep',[
    'as'=>'doanhnghiep',
    'uses'=>'controllerCapnhathethong@index',
    'middleware'=>'Checkquyen:xem_loai_hinh_doanh_nghiep'

  ]);

  Route::post('/them-loai-hinh-doanh-nghiep',[
    'as'=>'themloaihinhdoanhnghiep',
    'uses'=>'controllerCapnhathethong@themloaihinhdoanhnghiep',
    'middleware'=>'Checkquyen:them_loai_hinh_doanh_nghiep'
  ]);

  Route::get('/xoa-loai-hinh-doanh-nghiep/{id}',[
    'as'=>'xoaloaihinhdoanhnghiep',
    'uses'=>'controllerCapnhathethong@xoaloaihinhdoanhnghiep',
    'middleware'=>'Checkquyen:xoa_loai_hinh_doanh_nghiep'
  ]);


  Route::get('/sua-loai-hinh-doanh-nghiep/{id}',[
    'as'=>'suadoanhnghiep',
    'uses'=>'controllerCapnhathethong@suadoanhnghiep',
    'middleware'=>'Checkquyen:xem_loai_hinh_doanh_nghiep'

  ]);



Route::post('/sua-loai-hinh-doanh-nghiep-post/{id}',[
    'as'=>'suadoanhnghieppost',
    'uses'=>'controllerCapnhathethong@suadoanhnghieppost',
    'middleware'=>'Checkquyen:them_loai_hinh_doanh_nghiep'
  ]);


//co quan cap phep

Route::get('/co-quan-cap-phep',[
  'as'=>'coquancapphep',
  'uses'=>'controllerCapnhathethong@indexcoquancapphep',
  'middleware'=>'Checkquyen:xem_co_quan_cap_phep'

]);


Route::post('/them-co-quan-cap-phep',[
  'as'=>'themcoquancapphep',
  'uses'=>'controllerCapnhathethong@themcoquancapphep',
  'middleware'=>'Checkquyen:them_co_quan_cap_phep'
]);



Route::get('/xoa-co-quan-cap-phep/{id}',[
  'as'=>'xoacoquancapphep',
  'uses'=>'controllerCapnhathethong@xoacoquancapphep',
  'middleware'=>'Checkquyen:xoa_co_quan_cap_phep'
]);


Route::get('/sua-co-quan-cap-phep/{id}',[
  'as'=>'suacoquancapphep',
  'uses'=>'controllerCapnhathethong@suacoquancapphep',
 // 'middleware'=>'Checkquyen:xoa_co_quan_cap_phep'
]);



Route::post('/sua-co-quan-cap-phep-post/{id}',[
  'as'=>'suacoquancappheppost',
  'uses'=>'controllerCapnhathethong@suacoquancappheppost',
 // 'middleware'=>'Checkquyen:xoa_co_quan_cap_phep'
]);


//nhom khoang san

Route::get('/nhom-khoang-sann',[
  'as'=>'nhomkhoangsan',
  'uses'=>'controllerCapnhathethong@indexnhomkhoangsan',
  'middleware'=>'Checkquyen:xem_nhom_khoang_san'

]);

Route::post('/them-nhom-khoang-sann',[
  'as'=>'themnhomkhoangsan',
  'uses'=>'controllerCapnhathethong@themnhomkhoangsan',
  'middleware'=>'Checkquyen:them_nhom_khoang_san'
]);



Route::get('/xoa-nhom-khoang-sann/{id}',[
  'as'=>'xoanhomkhoangsan',
  'uses'=>'controllerCapnhathethong@xoanhomkhoangsan',
  'middleware'=>'Checkquyen:xoa_nhom_khoang_san'
]);

Route::get('/sua-nhom-khoang-sann/{id}',[
  'as'=>'suanhomkhoangsan',
  'uses'=>'controllerCapnhathethong@suanhomkhoangsan',
//  'middleware'=>'Checkquyen:xoa_nhom_khoang_san'
]);


Route::post('/sua-nhom-khoang-sann-post/{id}',[
  'as'=>'suanhomkhoangsanpost',
  'uses'=>'controllerCapnhathethong@suanhomkhoangsanpost',
//  'middleware'=>'Checkquyen:xoa_nhom_khoang_san'
]);


//loai hình khoang san

Route::get('/loai-hinh-khoang-san',[
  'as'=>'loaihinhkhoangsan',
  'uses'=>'controllerCapnhathethong@indexloaihinhkhoangsan',
  'middleware'=>'Checkquyen:xem_ten_khoang_san'

]);

Route::get('/tra-cuu-loai-hinh-khoang-san',[
  'as'=>'tracuuloaikhoangsan',
  'uses'=>'controllerCapnhathethong@tracuuloaikhoangsan',
  'middleware'=>'Checkquyen:xem_ten_khoang_san'

]);

Route::post('/them-loai-hinh-khoang-san',[
  'as'=>'themloaihinhkhoangsan',
  'uses'=>'controllerCapnhathethong@themloaihinhkhoangsan',
  'middleware'=>'Checkquyen:them_ten_khoang_san'
]);


Route::get('/xoa-loai-hinh-khoang-san/{id}',[
  'as'=>'xoaloaihinhkhoangsan',
  'uses'=>'controllerCapnhathethong@xoaloaihinhkhoangsan',
  'middleware'=>'Checkquyen:xoa_ten_khoang_san'
]);


Route::get('/sua-loai-hinh-khoang-san/{id}',[
  'as'=>'sualoaihinhkhoangsan',
  'uses'=>'controllerCapnhathethong@sualoaihinhkhoangsan',
  //'middleware'=>'Checkquyen:xoa_ten_khoang_san'
]);



Route::post('/sua-loai-hinh-khoang-san-post/{id}',[
  'as'=>'sualoaihinhkhoangsanpost',
  'uses'=>'controllerCapnhathethong@sualoaihinhkhoangsanpost',
  //'middleware'=>'Checkquyen:xoa_ten_khoang_san'
]);


//cap nhat vị trí hành chính

Route::get('/quan-huyen',[
  'as'=>'quanhuyen',
  'uses'=>'controllerCapnhathethong@indexQuanHuyen',
  'middleware'=>'Checkquyen:xem_quan_huyen'
]);



Route::post('/them-quan-huyen',[
  'as'=>'themQuanHuyen',
  'uses'=>'controllerCapnhathethong@themQuanHuyen',
  'middleware'=>'Checkquyen:them_quan_huyen'
]);




Route::get('/xa-phuong',[
  'as'=>'xaphuong',
  'uses'=>'controllerCapnhathethong@indexXaPhuong',
  'middleware'=>'Checkquyen:xem_xa_phuong'
]);




Route::get('/tra-cuu-xa-phuong',[
  'as'=>'xaphuongid',
  'uses'=>'controllerCapnhathethong@tracuuxaphuong',
  'middleware'=>'Checkquyen:xem_xa_phuong'

]);


Route::post('/them-xa-phuong',[
  'as'=>'themXaPhuong',
  'uses'=>'controllerCapnhathethong@themXaPhuong',
  'middleware'=>'Checkquyen:them_xa_phuong'
]);


// phòng ban

Route::get('/cap-nhat-phong-ban',[
  'as'=>'phongban',
  'uses'=>'controllerCapnhathethong@indexphongBan',
  'middleware'=>'Checkquyen:xem_phong_ban'

]);



Route::post('/them-phong-ban',[
  'as'=>'themPhongBan',
  'uses'=>'controllerCapnhathethong@themPhongBan',
  'middleware'=>'Checkquyen:them_phong_ban'
]);



Route::get('/xoa-phong-ban/{id}',[
  'as'=>'xoaphongban',
  'uses'=>'controllerCapnhathethong@xoaphongban',
  'middleware'=>'Checkquyen:xoa_phong_ban'
]);


Route::get('/sua-phong-ban/{id}',[
  'as'=>'suaphongban',
  'uses'=>'controllerCapnhathethong@suaphongban',
//  'middleware'=>'Checkquyen:xoa_phong_ban'
]);


Route::post('/sua-phong-ban-post/{id}',[
  'as'=>'suaphongbanpost',
  'uses'=>'controllerCapnhathethong@suaphongbanpost',
 // 'middleware'=>'Checkquyen:xoa_co_quan_cap_phep'
]);


// chức vụ

Route::get('/cap-nhat-chuc-vu',[
  'as'=>'chucvu',
  'uses'=>'controllerCapnhathethong@indexchucVu',
  'middleware'=>'Checkquyen:xem_chuc_vu'

]);

Route::post('/them-chuc-vu',[
  'as'=>'themChucVu',
  'uses'=>'controllerCapnhathethong@themChucVu',
  'middleware'=>'Checkquyen:them_chuc_vu'

]);

Route::get('/xoa-chuc-vu/{id}',[
  'as'=>'xoachucvu',
  'uses'=>'controllerCapnhathethong@xoachucvu',
  'middleware'=>'Checkquyen:xoa_chuc_vu'
]);

Route::get('/sua-chuc-vu/{id}',[
  'as'=>'suachucvu',
  'uses'=>'controllerCapnhathethong@suachucvu',
  //'middleware'=>'Checkquyen:xoa_chuc_vu'
]);

Route::post('/sua-chuc-vu-posst/{id}',[
  'as'=>'suachucvuposst',
  'uses'=>'controllerCapnhathethong@suachucvuposst',
  //'middleware'=>'Checkquyen:xoa_chuc_vu'
]);
























// dư lieu mo khoáng san

Route::get('/du-lieu-mo-khoang-san',[
  'as'=>'dlmo',
  'uses'=>'controllerDuLieuMo@index',
  'middleware'=>'Checkquyen:xem_du_lieu_mo_khoang_san'

]);


Route::get('/chi-tiet-du-lieu-mo-khoang-san/{id}',[
  'as'=>'chitietdulieumo',
  'uses'=>'controllerDuLieuMo@chitietdulieumo',
  'middleware'=>'Checkquyen:xem_du_lieu_mo_khoang_san'

]);

Route::post('them-tru-luong/{id}',[
  'as'=>'themtruluong',
  'uses'=>'controllerDuLieuMo@themtruluong',
  'middleware'=>'Checkquyen:khoang-san'
]);


Route::post('/them-du-lieu-mo-khoang-san',[
  'as'=>'themdulieumo',
  'uses'=>'controllerDuLieuMo@themdulieumo',
  'middleware'=>'Checkquyen:them_du_lieu_mo_khoang_san'
]);


Route::get('/xoa-du-lieu-mo-khoang-san/{id}',[
  'as'=>'getxoadulieumo',
  'uses'=>'controllerDuLieuMo@getxoadulieumo',
  'middleware'=>'Checkquyen:xoa_du_lieu_mo_khoang_san'
]);


Route::post('/xoa-du-lieu-mo/{id}',[
  'as'=>'xoadulieumo',
  'uses'=>'controllerDuLieuMo@xoadulieumo',
  'middleware'=>'Checkquyen:xoa_du_lieu_mo_khoang_san'
]);



Route::get('/tim-kiem-du-lieu-mo-khoang-san',[
  'as'=>'timkiemmo',
  'uses'=>'controllerDuLieuMo@timkiemmo',
  'middleware'=>'Checkquyen:xem_du_lieu_mo_khoang_san'

]);


Route::get('/sua-du-lieu-mo-khoang-san/{id}',[
  'as'=>'suadulieumo',
  'uses'=>'controllerDuLieuMo@suadulieumo',
  'middleware'=>'Checkquyen:sua_du_lieu_mo_khoang_san'

]);


Route::post('/sua-du-lieu-mo-khoang-san-post/{id}',[
  'as'=>'suadulieupost',
  'uses'=>'controllerDuLieuMo@suadulieupost',
  'middleware'=>'Checkquyen:sua_du_lieu_mo_khoang_san'

]);

//du lieu dong cua mo

Route::get('/du-lieu-dong-cua-mo',[
  'as'=>'dldongmo',
  'uses'=>'controllerDulieudongmo@index',
  'middleware'=>'Checkquyen:xem_du_lieu_dong_mo_khoang_san'

]);

Route::get('/chi-tiet-du-lieu-dong-cua-mo/{id}',[
  'as'=>'chitietdulieumodongcua',
  'uses'=>'controllerDulieudongmo@chitietdulieumodongcua',
  'middleware'=>'Checkquyen:xem_du_lieu_dong_mo_khoang_san'

]);


// dữ luệ hồ sơ thăm dò
Route::get('/ho-so-tham-do-khoang-san',[
  'as'=>'thamdokhoangsan',
  'uses'=>'controllerHoSoThamDo@index',
  'middleware'=>'Checkquyen:xem_ho_so_tham_do_khoang_san'

]);

Route::get('/chi-tiet-ho-so-tham-do-khoang-san/{id}',[
  'as'=>'chitietthamdo',
  'uses'=>'controllerHoSoThamDo@chitietthamdo',
  'middleware'=>'Checkquyen:xem_ho_so_tham_do_khoang_san'

]);

    
   Route::get('/them-ho-so-tham-do-khoang-san',[
    'as'=>'themhosothamdo',
    'uses'=>'controllerHoSoThamDo@themhosothamdo',
    'middleware'=>'Checkquyen:them_ho_so_tham_do_khoang_san'

  ]);



   Route::post('/them-ho-so-tham-do-khoang-san-post',[
    'as'=>'themhosothamdopost',
    'uses'=>'controllerHoSoThamDo@themhosothamdopost',
    'middleware'=>'Checkquyen:them_ho_so_tham_do_khoang_san'

  ]);


   Route::get('/xoa-ho-so-tham-do-khoang-san/{id}',[
    'as'=>'xoahosothamdo',
    'uses'=>'controllerHoSoThamDo@xoahosothamdo',
    'middleware'=>'Checkquyen:xoa_ho_so_tham_do_khoang_san'

  ]);


   Route::get('/sua-ho-so-tham-do/{id}',[
    'as'=>'suathamdo',
    'uses'=>'controllerHoSoThamDo@suathamdo',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);
   
   Route::post('/sua-ho-so-tham-dopost/{id}',[
    'as'=>'suathamdopost',
    'uses'=>'controllerHoSoThamDo@suathamdopost',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);



// dữ liệu hồ sơ phê duyệt trữ lượng

   Route::get('/ho-so-phe-duyet-tru-luong-khoang-san',[
    'as'=>'truluongkhoangsan',
    'uses'=>'controllerPheduyetTruLuong@index',
    'middleware'=>'Checkquyen:xem_ho_so_tru_luong_khoang_san'

  ]);

   Route::get('/chi-tiet-ho-so-phe-duyet-tru-luong-khoang-san/{id}',[
    'as'=>'chitietpheduyettrucluong',
    'uses'=>'controllerPheduyetTruLuong@chitietpheduyettrucluong',
    'middleware'=>'Checkquyen:xem_ho_so_tru_luong_khoang_san'

  ]);

   Route::get('/them-ho-so-phe-duyet-tru-luong-khoang-san',[
    'as'=>'themhosopheduyettruluong',
    'uses'=>'controllerPheduyetTruLuong@themhosopheduyettruluong',
    'middleware'=>'Checkquyen:them_ho_so_tru_luong_khoang_san'
  ]);

   Route::post('/them-ho-so-phe-duyet-tru-luong-khoang-san-post',[
    'as'=>'themhosopheduyettruluongpost',
    'uses'=>'controllerPheduyetTruLuong@themhosopheduyettruluongpost',
    'middleware'=>'Checkquyen:them_ho_so_tru_luong_khoang_san'

  ]);


   Route::get('/xoa-ho-so-phe-duyet-tru-luong-khoang-san/{id}',[
    'as'=>'xoahosopheduyet',
    'uses'=>'controllerPheduyetTruLuong@xoahosopheduyet',
    'middleware'=>'Checkquyen:xoa_ho_so_tru_luong_khoang_san'

  ]);

   Route::get('/sua-ho-tru-luong/{id}',[
    'as'=>'suatruluong',
    'uses'=>'controllerPheduyetTruLuong@suatruluong',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);
  Route::post('/sua-ho-tru-luongpost/{id}',[
    'as'=>'suatruluongpost',
    'uses'=>'controllerPheduyetTruLuong@suatruluongpost',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);






//// dữ liệu hồ sơ cấp phép khai thác

   Route::get('/ho-so-cap-phep-khai-thac',[
    'as'=>'capphepkhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@index',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);


   Route::get('/chi-tiet-ho-so-cap-phep-khai-thac/{id}',[
    'as'=>'chitietcapphepkhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@chitietcapphepkhaithac',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);



  Route::get('/them-ho-so-cap-phep-khai-thac',[
    'as'=>'themhosocapphepkhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@themhosocapphepkhaithac',
    'middleware'=>'Checkquyen:them_ho_so_cap_phep_khai_thac'
  ]);


  Route::post('/them-ho-so-cap-phep-khai-thac-post',[
    'as'=>'themhosocapphepkhaithacpost',
    'uses'=>'controllerHoSoCapPhepKhaiThac@themhosocapphepkhaithacpost',
    'middleware'=>'Checkquyen:them_ho_so_cap_phep_khai_thac'
  ]);

  // Route::get('/them-ho-so-cap-phep-khai-thac-tan-thu',[
  //   'as'=>'themhosocapphepkhaithactanthu',
  //   'uses'=>'controllerHoSoCapPhepKhaiThac@themhosocapphepkhaithactanthu',
  //   'middleware'=>'Checkquyen:them_ho_so_cap_phep_khai_thac'
  // ]);




  Route::get('/xoa-ho-so-cap-phep-khai-thac/{id}',[
    'as'=>'xoahosocapphepkhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@xoahosocapphepkhaithac',
    'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);

  

    Route::get('/sua-ho-so-cap-phep-khai-thac/{id}',[
    'as'=>'suakhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@suakhaithacindex',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);
  Route::post('/sua-ho-so-cap-phep-khai-thacpost/{id}',[
    'as'=>'suahosokhaithacpost',
    'uses'=>'controllerHoSoCapPhepKhaiThac@suahosokhaithacpost',
    //'middleware'=>'Checkquyen:xoa_ho_so_cap_phep_khai_thac'

  ]);


    

  // Biến động khoáng sản

 Route::post('/dieu-chinh-khai-thac/{idhosokhaithac}',[
    'as'=>'dieuchinhkhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@dieuchinhkhaithac',
   // 'middleware'=>'Checkquyen:them-khoang-san'
  ]);



  Route::get('/chuyen-doi-ho-so-cap-phep-khai-thac/{id}',[
    'as'=>'chuyendoikhaithac',
    'uses'=>'controllerHoSoCapPhepKhaiThac@chuyendoikhaithac',
    'middleware'=>'Checkquyen:them-khoang-san'
  ]);


 Route::post('/chuyen-nhuong-mo/{idhosokhaithac}',[
    'as'=>'chuyendoikhaithacdoanhnghiep',
    'uses'=>'controllerHoSoCapPhepKhaiThac@chuyendoikhaithacdoanhnghiep',
    'middleware'=>'Checkquyen:them-khoang-san'
  ]);

 Route::post('/gia-han-mo',[
  'as'=>'chuyendoikhaithacgiahan',
  'uses'=>'controllerHoSoCapPhepKhaiThac@chuyendoikhaithacgiahan',
  'middleware'=>'Checkquyen:them-khoang-san'
]);

 Route::post('/tra-lai-mo',[
  'as'=>'chuyendoikhaithactramo',
  'uses'=>'controllerHoSoCapPhepKhaiThac@chuyendoikhaithactramo',
  'middleware'=>'Checkquyen:them-khoang-san'
]);




 Route::post('/thu-hoi-mo/{idhosokhaithac}',[
  'as'=>'chuyendoikhaithacthuhoi',
  'uses'=>'controllerHoSoCapPhepKhaiThac@chuyendoikhaithacthuhoi',
  'middleware'=>'Checkquyen:them-khoang-san'
]);

 /// câp ppheps tận thu

  Route::get('/ho-so-cap-phep-khai-thac-tan-thu',[
    'as'=>'capphepkhaithactanthu',
    'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@index',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);

   Route::get('/ho-so-cap-phep-khai-thac-tan-thu-them',[
    'as'=>'capphepkhaithactanthuthem',
    'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@add',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);

   Route::post('/ho-so-cap-phep-khai-thac-tan-thu-them-post',[
    'as'=>'capphepkhaithactanthuthempost',
    'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@addpost',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);

 Route::get('/chi-tiet-ho-so-cap-phep-khai-thac-tan-thu/{id}',[
    'as'=>'capphepkhaithactanthuchitiet',
    'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@chitiet',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);


 Route::get('/xoa-ho-so-cap-phep-khai-thac-tan-thu/{id}',[
    'as'=>'capphepkhaithactanthuxoa',
    'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@delete',
    'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

  ]);


 Route::get('/sua-ho-so-cap-phep-khai-thac-tan-thu/{id}',[
  'as'=>'capphepkhaithactanthuedit',
  'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@edit',
  'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

]);

 Route::post('/sua-ho-so-cap-phep-khai-thac-tan-thu-post/{id}',[
  'as'=>'capphepkhaithactanthueditpost',
  'uses'=>'controllerHoSoCapPhepKhaiThacTanThu@editpost',
  'middleware'=>'Checkquyen:xem_ho_so_cap_phep_khai_thac'

]);

 // danh sách hồ sơ biến động'

 Route::get('/bien-dong-khoang-san',[
  'as'=>'biendongkhoangsan',
  'uses'=>'controllerhosothuhoitralai@index',
  'middleware'=>'Checkquyen:khoang-san'
]);


 Route::get('/chi-tiet-ho-so-bien-dong/{id}',[
  'as'=>'chitiethosobiendong',
  'uses'=>'controllerhosothuhoitralai@chitiethosobiendong',
  'middleware'=>'Checkquyen:khoang-san'

]);


// dữ liệu điều tra đánh giá khoáng sản

Route::get('/du-lieu-dieu-tra-danh-gia-khoang-san',[
  'as'=>'dulieudieutradanhgiakhoangsan',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@indexdulieudieutradanhgiakhoangsan',
  'middleware'=>'Checkquyen:xem_du_lieu_dieu_tra_danh_khoang_san'

]);


Route::post('/them-du-lieu-dieu-tra-danh-gia-khoang-san',[
  'as'=>'themdulieudieutradanhgiaks',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@themdulieudieutradanhgiaks',
  'middleware'=>'Checkquyen:Them_du_lieu_dieu_tra_danh_khoang_san'
]);


Route::get('/chi-tiet-dieu-tra-danh-gia-khoang-san/{id}',[
  'as'=>'chitietdieutrakhoangsan',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@chitietdieutrakhoangsan',
  'middleware'=>'Checkquyen:xem_du_lieu_dieu_tra_danh_khoang_san'
]);


Route::get('/xoa-du-lieu-dieu-tra-danh-gia-khoang-san/{id}',[
  'as'=>'xoadulieudieutrakhoangsan',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@xoadulieudieutrakhoangsan',
  'middleware'=>'Checkquyen:xoa-du_lieu_dieu_tra_danh_khoang_san'
]);

Route::get('/sua-du-lieu-dieu-tra-danh-gia-khoang-san/{id}',[
  'as'=>'suadulieudieutrakhoangsan',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@suadulieudieutrakhoangsan',
  'middleware'=>'Checkquyen:sua-du_lieu_dieu_tra_danh_khoang_san'
]);


Route::post('/sua-du-lieu-dieu-tra-danh-gia-khoang-san/{id}',[
  'as'=>'suadulieudieutrakhoangsanpost',
  'uses'=>'controllerduLieuDieuTraDanhGiaKhoangSan@suadulieudieutrakhoangsanpost',
  'middleware'=>'Checkquyen:sua-du_lieu_dieu_tra_danh_khoang_san'
]);


// vung cấm và hạn chế khai thác

Route::get('/du-lieu-vung-cam-han-che-khai-thac',[
  'as'=>'dulieucamhanchekhaithac',
  'uses'=>'controllerKsVungCamHanChe@index',
  'middleware'=>'Checkquyen:khoang-san'

]);

Route::post('/them-du-lieu-vung-cam-han-che-khai-thac',[
  'as'=>'themdulieuvungcamhanche',
  'uses'=>'controllerKsVungCamHanChe@themdulieuvungcamhanche',
  'middleware'=>'Checkquyen:khoang-san'
]);

Route::get('/xoa-du-lieu-vung-cam-han-che-khai-thac/{id}',[
  'as'=>'xoadulieucamhanchekhaithac',
  'uses'=>'controllerKsVungCamHanChe@xoadulieucamhanchekhaithac',
  'middleware'=>'Checkquyen:khoang-san'
]);

Route::get('/sua-du-lieu-vung-cam-han-che-khai-thac/{id}',[
  'as'=>'suadulieucamhanchekhaithac',
  'uses'=>'controllerKsVungCamHanChe@suadulieucamhanchekhaithac',
  'middleware'=>'Checkquyen:khoang-san'
]);

Route::post('/sua-du-lieu-vung-cam-han-che-khai-thac-post/{id}',[
  'as'=>'suadulieucamhanchekhaithacpost',
  'uses'=>'controllerKsVungCamHanChe@suadulieucamhanchekhaithacpost',
  'middleware'=>'Checkquyen:khoang-san'
]);

// vùng quy hoạch khai thác

Route::get('/du-lieu-quy-hoach-khai-thac',[
  'as'=>'dulieuvungquyhoachkhaithac',
  'uses'=>'controllerquyHoachKhaiThac@index',
  'middleware'=>'Checkquyen:khoang-san'

]);

Route::post('/them-du-lieu-quy-hoach-khai-thac',[
  'as'=>'themdulieuvungquyhoach',
  'uses'=>'controllerquyHoachKhaiThac@themdulieuvungquyhoach',
  'middleware'=>'Checkquyen:khoang-san'

]);

Route::get('/xoa-du-lieu-quy-hoach-khai-thac/{id}',[
  'as'=>'xoadulieuquyhoachkhaithac',
  'uses'=>'controllerquyHoachKhaiThac@xoadulieuquyhoachkhaithac',
  'middleware'=>'Checkquyen:khoang-san'

]);


Route::get('/sua-du-lieu-quy-hoach-khai-thac/{id}',[
  'as'=>'suadulieuquyhoachkhaithac',
  'uses'=>'controllerquyHoachKhaiThac@suadulieuquyhoachkhaithac',
  //'middleware'=>'Checkquyen:khoang-san'

]);



Route::post('/sua-du-lieu-quy-hoach-khai-thac-post/{id}',[
  'as'=>'suadulieuquyhoachkhaithacpost',
  'uses'=>'controllerquyHoachKhaiThac@suadulieuquyhoachkhaithacpost',
  //'middleware'=>'Checkquyen:khoang-san'

]);
// Nộp ngân sách khoáng sản hàng năm

Route::get('/bao-cao-ket-qua-khai-thac-khoang-san-hang-nam',[
  'as'=>'baocaoketquakhaithackshangnam',
  'uses'=>'controllerbaocaokhaithachangnam@index',
  'middleware'=>'Checkquyen:nop_ngan_sach_khoang_san'

]);


Route::get('/chi-tiet-bao-cao-ket-qua-khai-thac-khoang-san-hang-nam/{id}',[
  'as'=>'chitietbaokhaothachangnam',
  'uses'=>'controllerbaocaokhaithachangnam@chitietbaokhaothachangnam',
  'middleware'=>'Checkquyen:nop_ngan_sach_khoang_san'

]);


Route::get('/xoa-bao-cao-ket-qua-khai-thac-khoang-san-hang-nam/{id}',[
  'as'=>'xoabaocaokhoangsanhangnam',
  'uses'=>'controllerbaocaokhaithachangnam@xoabaocaokhoangsanhangnam',
  'middleware'=>'Checkquyen:nop_ngan_sach_khoang_san'

]);



Route::post('/them-bao-cao-ket-qua-khai-thac-khoang-san-hang-nam',[
  'as'=>'thembaocaokhaithachangnam',
  'uses'=>'controllerbaocaokhaithachangnam@thembaocaokhaithachangnam',
  'middleware'=>'Checkquyen:nop_ngan_sach_khoang_san'
]);

// hồ sơ tiếp nhận giải quyết

Route::get('/ho-so-tiep-nhan-giai-quyet',[
  'as'=>'hosotiepnhangiaiquyet',
  'uses'=>'controllerHoSoTiepNhanGiaiQuyet@index',
  'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);



Route::post('/them-ho-so-tiep-nhan-giai-quyet',[
  'as'=>'themhosotiepnhan',
  'uses'=>'controllerHoSoTiepNhanGiaiQuyet@themhosotiepnhan',
  'middleware'=>'Checkquyen:Them_ho_so_tiep_nhan_giai_quyet'
]);


Route::get('/xoa-ho-so-tiep-nhan-giai-quyet/{id}',[
  'as'=>'xoahosotiepnhan',
  'uses'=>'controllerHoSoTiepNhanGiaiQuyet@xoahosotiepnhan',
  'middleware'=>'Checkquyen:khoang-san'

]);

Route::get('/sua-ho-so-tiep-nhan-giai-quyet/{id}',[
  'as'=>'suahosotiepnhan',
  'uses'=>'controllerHoSoTiepNhanGiaiQuyet@suahosotiepnhan',
  'middleware'=>'Checkquyen:khoang-san'

]);

Route::post('/sua-ho-so-tiep-nhan-giai-quyet-post/{id}',[
  'as'=>'suahosotiepnhanpost',
  'uses'=>'controllerHoSoTiepNhanGiaiQuyet@suahosotiepnhanpost',
  'middleware'=>'Checkquyen:khoang-san'

]);

// tình hình thuê đất


Route::get('/hop-dong-thue-dat',[
  'as'=>'hopdongthuedat',
  'uses'=>'controllerhopdongthudat@index',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/sua-hop-dong-thue-dat/{id}',[
  'as'=>'suahopdongthuedat',
  'uses'=>'controllerhopdongthudat@suahopdongthuedat',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::post('/sua-hop-dong-thue-dat-post/{id}',[
  'as'=>'suahopdongthuedatpost',
  'uses'=>'controllerhopdongthudat@suahopdongthuedatpost',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/xoa-hop-dong-thue-dat/{id}',[
  'as'=>'xoahopdongthuedat',
  'uses'=>'controllerhopdongthudat@xoahopdongthuedat',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);



Route::post('/them-hop-dong-thue-dat',[
  'as'=>'themhopdongthuedat',
  'uses'=>'controllerhopdongthudat@themhopdongthuedat',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);


// tiền cấp quyền khai thác

Route::get('/tien-cap-quyen-khai-thac',[
  'as'=>'tiencapquyenkhaithac',
  'uses'=>'controllertiencapquyen@index',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::post('/them-tien-cap-quyen-khai-thac',[
  'as'=>'themtiencapquyenkhaithac',
  'uses'=>'controllertiencapquyen@themtiencapquyen',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/sua-tien-cap-quyen-khai-thac/{id}',[
  'as'=>'suatiencapquyenkhaithac',
  'uses'=>'controllertiencapquyen@suatiencapquyenkhaithac',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::post('/sua-tien-cap-quyen-khai-thac-post/{id}',[
  'as'=>'suatiencapquyenkhaithacpost',
  'uses'=>'controllertiencapquyen@suatiencapquyenkhaithacpost',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/xoa-tien-cap-quyen-khai-thac/{id}',[
  'as'=>'xoatiencapquyenkhaithac',
  'uses'=>'controllertiencapquyen@xoatiencapquyenkhaithac',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);


// phí cải tạo môi trường



Route::get('/tien-ky-quy-phuc-hoi-moi-truong',[
  'as'=>'phuchoimoitruong',
  'uses'=>'controllertienkyquyphuchoimoitruong@index',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::post('/them-tien-ky-quy-phuc-hoi-moi-truong',[
  'as'=>'themphuchoimoitruong',
  'uses'=>'controllertienkyquyphuchoimoitruong@themphuchoimoitruong',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/sua-tien-ky-quy-phuc-hoi-moi-truong/{id}',[
  'as'=>'suaquyphuchoimoitruong',
  'uses'=>'controllertienkyquyphuchoimoitruong@suaquyphuchoimoitruong',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);
Route::post('/sua-tien-ky-quy-phuc-hoi-moi-truong-post/{id}',[
  'as'=>'suaquyphuchoimoitruongpost',
  'uses'=>'controllertienkyquyphuchoimoitruong@suaquyphuchoimoitruongpost',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);

Route::get('/xoa-tien-ky-quy-phuc-hoi-moi-truong/{id}',[
  'as'=>'xoaquyphuchoimoitruong',
  'uses'=>'controllertienkyquyphuchoimoitruong@xoaquyphuchoimoitruong',
 // 'middleware'=>'Checkquyen:xem_ho_so_tiep_nhan_giai_quyet'
]);


// báo cáo thông kê

Route::get('/bao-cao-thong-ke',[
  'as'=>'baocaothongke',
  'uses'=>'controllerBaocaothongke@index',
 // 'middleware'=>'Checkquyen:khoang-san'
]);

Route::get('/bao-cao-theo-ho-so',[
  'as'=>'baocaotheohoso',
  'uses'=>'controllerBaocaothongke@baocaotheohoso',
  'middleware'=>'Checkquyen:thong_ke_loai_hs'
]);


Route::get('/ket-qua-bao-cao-thong-ke',[
  'as'=>'thongkehoso',
  'uses'=>'controllerBaocaothongke@thongkehoso',
  'middleware'=>'Checkquyen:thong_ke_loai_hs'
]);


Route::get('/xuat-ket-qua-bao-cao-thong-ke/{loaihoso}/{nam}',[
  'as'=>'xuatthongkehoso',
  'uses'=>'controllerBaocaothongke@xuatthongkehoso',
  'middleware'=>'Checkquyen:thong_ke_loai_hs'
]);


Route::get('/xuat-ket-qua-bao-cao-thong-ke-pdf/{loaihoso}/{nam}',[
  'as'=>'xuatthongkehosopdf',
  'uses'=>'controllerBaocaothongke@xuatthongkehosopdf',
  'middleware'=>'Checkquyen:thong_ke_loai_hs'
]);



Route::get('/bao-cao-theo-nam-khai-thac',[
  'as'=>'baocaonamkhaithac',
  'uses'=>'controllerBaocaothongke@baocaonamkhaithac',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);


Route::get('/ket-qua-bao-cao-theo-nam-khai-thac',[
  'as'=>'kqbaocaonamkhaithac',
  'uses'=>'controllerBaocaothongke@kqbaocaonamkhaithac',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);



Route::get('/ket-qua-bao-cao-theo-nam-khai-thac-excel/{sonamconlai}',[
  'as'=>'kqbaocaonamkhaithacexcel',
  'uses'=>'controllerBaocaothongke@kqbaocaonamkhaithacexcel',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);



Route::get('/ket-qua-bao-cao-theo-nam-khai-thac-pdf/{sonamconlai}',[
  'as'=>'kqbaocaonamkhaithacpdf',
  'uses'=>'controllerBaocaothongke@kqbaocaonamkhaithacpdf',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);


Route::get('/bao-cao-ho-so-dang-khai-thac',[
  'as'=>'baocaohosodangkhaothac',
  'uses'=>'controllerBaocaothongke@baocaohosodangkhaothac',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);


Route::get('/bao-cao-ho-so-dang-khai-thac-excel',[
  'as'=>'baocaohosodangkhaothacexcel',
  'uses'=>'controllerBaocaothongke@baocaohosodangkhaothacexcel',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-ho-so-dang-khai-thac-pdf',[
  'as'=>'baocaohosodangkhaothacpdf',
  'uses'=>'controllerBaocaothongke@baocaohosodangkhaothacpdf',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-ho-so-thu-hoi-khai-thac',[
  'as'=>'baocaohosothuhoi',
  'uses'=>'controllerBaocaothongke@baocaohosothuhoi',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-ho-so-thu-hoi-khai-thac-excel',[
  'as'=>'baocaohosothuhoiex',
  'uses'=>'controllerBaocaothongke@baocaohosothuhoiex',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-tinh-hinh-khai-thac',[
  'as'=>'baocaotinhinhkhaithac',
  'uses'=>'controllerBaocaothongke@baocaotinhinhkhaithac',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-tinh-hinh-khai-thac-post',[
  'as'=>'baocaotinhinhkhaithacpost',
  'uses'=>'controllerBaocaothongke@baocaotinhinhkhaithacpost',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);


Route::get('/bao-cao-tinh-hinh-khai-thac-pdf/{loahoso}/{quanhuyen}/{khoangsan}',[
  'as'=>'baocaotinhinhkhaithacpdf',
  'uses'=>'controllerBaocaothongke@baocaotinhinhkhaithacpdf',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-hoat-dong-khoang-san',[
  'as'=>'baocaohoatdongkhoangsan',
  'uses'=>'controllerBaocaothongke@baocaohoatdongkhoangsan',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);


Route::get('/bao-cao-cap-phep-khoang-san-moi-nhat',[
  'as'=>'baocaocapphepmoinhat',
  'uses'=>'controllerBaocaothongke@baocaocapphepmoinhat',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);

Route::get('/bao-cao-cap-phep-khoang-san-moi-nhat-pdf/{nambaocao}',[
  'as'=>'baocaocapphepmoinhatpdf',
  'uses'=>'controllerBaocaothongke@baocaocapphepmoinhatpdf',
  'middleware'=>'Checkquyen:thong_ke_thoi_gian_kt'
]);



// phân quyền 


Route::get('/vai-tro-quan-tri',[
  'as'=>'vaitro',
  'uses'=>'controllerquyen@index',
    // 'middleware'=>'Checkquyen:xemSlide'
]);


Route::post('/them-vai-tro-quan-tri.html',[
  'as'=>'themvaitro',
  'uses'=>'controllerquyen@themvaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
]);

Route::get('/xoa-vai-tro-quan-tri/{id}',[
  'as'=>'xoavaitro',
  'uses'=>'controllerquyen@xoavaitro',
    // 'middleware'=>'Checkquyen:xemSlide'
]);



Route::get('/nguoi-dung',[
  'as'=>'nguoidung',
  'uses'=>'controllernguoidung@index',
    // 'middleware'=>'Checkquyen:xemSlide'
]);

Route::post('/them-nguoi-dung',[
  'as'=>'themnguoidung',
  'uses'=>'controllernguoidung@themnguoidung',
    // 'middleware'=>'Checkquyen:xemSlide'
]);


Route::get('/xoa-nguoi-dung/{id}',[
  'as'=>'xoanguoidung',
  'uses'=>'controllernguoidung@xoanguoidung',
    // 'middleware'=>'Checkquyen:xemSlide'
]);



Route::get('/sua-nguoi-dung/{id}',[
  'as'=>'suanguoidung',
  'uses'=>'controllernguoidung@suanguoidung',
    // 'middleware'=>'Checkquyen:xemSlide'
]);


Route::post('/sua-nguoi-dung-post/{id}',[
  'as'=>'suanguoidungpost',
  'uses'=>'controllernguoidung@suanguoidungpost',
    // 'middleware'=>'Checkquyen:xemSlide'
]);




Route::get('/test',[
  'as'=>'test',
  'uses'=>'controllerBaocaothongke@test',
  'middleware'=>'Checkquyen:khoang-san'
]);

















































































































































































 

  // Route::get('/cap-nhat-chuc-vu',[
  //     'as'=>'chucvu',
  //     'uses'=>'ControllerKhoangsan@chucvu',
  //     'middleware'=>'Checkquyen:khoang-san'

  // ]);

    Route::get('/tham-do-khoang-sang',[
      'as'=>'thamdog',
      'uses'=>'ControllerKhoangsan@thamdo',
      'middleware'=>'Checkquyen:khoang-san'

  ]);
   // Route::get('/chi-tiet-mo',[
   //    'as'=>'chitietthamdo',
   //    'uses'=>'ControllerKhoangsan@chitietthamdo',
   //    'middleware'=>'Checkquyen:khoang-san'

   //  ]);
   Route::get('/them-ho-so-tham-do-khoang-sang',[
    'as'=>'addhosothamdo',
    'uses'=>'ControllerKhoangsan@addhosothamdo',
    'middleware'=>'Checkquyen:them-khoang-san'

  ]);
   
   Route::get('/nhom-khoang-san',[
    'as'=>'loaikhoangsan',
    'uses'=>'ControllerKhoangsan@loaikhoangsan',
    'middleware'=>'Checkquyen:khoang-san'

  ]);

     
     Route::get('/loai-khoang-san',[
      'as'=>'nhomkhoangsanl',
      'uses'=>'ControllerKhoangsan@nhomkhoangsan',
      'middleware'=>'Checkquyen:khoang-san'

    ]);


     Route::get('/cap-phep-khai-thac',[
      'as'=>'pheduyettruluong',
      'uses'=>'ControllerKhoangsan@pheduyettruluong',
      'middleware'=>'Checkquyen:khoang-san'

    ]);

     Route::get('/chinh-sua-ho-so-cap-phep-khai-thac',[
      'as'=>'chinhsuahosocapphepkhaithac',
      'uses'=>'ControllerKhoangsan@chinhsuahosocapphepkhaithac',
      'middleware'=>'Checkquyen:khoang-san'

    ]);

    
  

     Route::get('/chi-tiet-mo-khai-thac',[
      'as'=>'chitietkhaithac',
      'uses'=>'ControllerKhoangsan@chitietkhaithac',
      'middleware'=>'Checkquyen:khoang-san'

    ]);
    //  Route::get('/du-lieu-mo',[
    //   'as'=>'dlmo',
    //   'uses'=>'ControllerKhoangsan@dlmo',
    //   'middleware'=>'Checkquyen:khoang-san'

    // ]);

     
    //  Route::get('/du-lieu-dong-cua-mo',[
    //   'as'=>'dldongmo',
    //   'uses'=>'ControllerKhoangsan@dldongmo',
    //   'middleware'=>'Checkquyen:khoang-san'

    // ]);

     Route::get('/du-vung-cam-va-han-che-khai-thac',[
      'as'=>'dlcamhanche',
      'uses'=>'ControllerKhoangsan@dlcamhanche',
      'middleware'=>'Checkquyen:khoang-san'

    ]);


     Route::get('/quy-hoach-khai-thac',[
      'as'=>'dlvungquyhoachkhaithac',
      'uses'=>'ControllerKhoangsan@dlvungquyhoachkhaithac',
      'middleware'=>'Checkquyen:khoang-san'

    ]);

     


    //  Route::get('/du-lieu-dieu-tra-khao-sat',[
    //   'as'=>'dldieutra',
    //   'uses'=>'ControllerKhoangsan@dldieutra',
    //   'middleware'=>'Checkquyen:khoang-san'

    // ]);

   
     

       Route::get('/ho-so-giai-quyet',[
        'as'=>'hosogiaiquyet',
        'uses'=>'ControllerKhoangsan@hosogiaiquyet',
        'middleware'=>'Checkquyen:khoang-san'

      ]);

       Route::get('/thue-dat',[
        'as'=>'thuedat',
        'uses'=>'ControllerKhoangsan@thuedat',
        'middleware'=>'Checkquyen:khoang-san'

      ]);

       
       Route::get('/nop-ngan-sach',[
        'as'=>'nopngansach',
        'uses'=>'ControllerKhoangsan@nopngansach',
        'middleware'=>'Checkquyen:khoang-san'

      ]);


       Route::get('/van-ban-phap-quy',[
        'as'=>'vanbanphapquy',
        'uses'=>'ControllerKhoangsan@vanbanphapquy',
        'middleware'=>'Checkquyen:khoang-san'

      ]);

    

    Route::get('/ban-do-dia-gioi',[
        'as'=>'bando',
        'uses'=>'ControllerKhoangsan@bando',
        'middleware'=>'Checkquyen:khoang-san'

      ]);



});












Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
