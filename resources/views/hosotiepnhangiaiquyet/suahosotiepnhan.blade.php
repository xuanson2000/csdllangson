
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
  
          <form action="{{route('suahosotiepnhanpost',[$suahosotiepnhan->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
          
         <div class="form-group">
                    <label for="usr">Tên hồ sơ <span style="color: red;">(*)</span></label>
                    <textarea type="text" class="form-control" name="tenHoSo" required="" >
                        {{$suahosotiepnhan->tenHoSo}}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="usr">Đơn vị/ cá nhân trình <span style="color: red;">(*)</span></label>

                    <input type="text" class="form-control" name="donViTrinh" required="" value="{{$suahosotiepnhan->donViTrinh}}">

                </div>
                <div class="form-group">
                    <label for="usr">Ngày hẹn trả kết quả<span style="color: red;">(*)</span></label>
                    <input type="date" class="form-control" name="ngayHenTra" required="" value="{{$suahosotiepnhan->ngayHenTra}}">
                </div>

                <div class="form-group">
                    <label for="usr">file giấy phép  </label>
                    <input type="file" class="form-control" name="fileGiayPhep" multiple >
                </div>

                <div class="form-group">
                    <button style="float: right;" type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Lưu lại</button>

                </div>
             
          </form>

        </div>
        
      
       </div> 
    
  
 

  @endsection