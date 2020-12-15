
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
  <h4>CẬP NHẬT TÊN KHOÁNG SẢN</h4> 

<!-- The Modal -->

        <!-- Modal body -->
        <div class="row modal-body" style="width: 60%;" >
  
          <form action="{{route('sualoaihinhkhoangsanpost',[$loaiHinhKhoangSanedit->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{csrf_token()}}" >
             
          <div class=" form-group" style="">
            <label style="font-weight: bold; float:left;">Nhóm khoáng sản <span style="color: red;">(*)</span></label>

            <select class="form-control" name="idNhomKhoangSan" required>
             
              <option value="{{$loaiHinhKhoangSanedit->nhomKhoangSan->id}}">{{$loaiHinhKhoangSanedit->nhomKhoangSan->tenNhomKS}}</option>

              @foreach($nhomkhoangsans as $nhomkhoangsan)

            <option value="{{$nhomkhoangsan->id}}">{{$nhomkhoangsan->tenNhomKS}}</option>
              @endforeach
             
            </select>
          </div>


        		<div class="form-group">
            <label for="usr">Tên loại hình khoáng sản <span style="color: red;">(*)</span></label>
            <input type="text" class="form-control" name="tenLoaiHinhKS" required="" value="{{$loaiHinhKhoangSanedit->tenLoaiHinhKS}}">
          </div>
            <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
             
          </form>

        </div>
            
       </div> 
  

  @endsection