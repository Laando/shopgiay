@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật khuyến mãi
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($edit_khuyenmai as $key => $km)
    
                                <form role="form" action="{{URL::to('/update-khuyenmai/'.$km->khuyenmai_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input   type="text" name="khuyenmai_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$km->khuyenmai_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Sản phẩm Khuyến mãi (Hãy nhập đúng mã ID sản phẩm cần khuyến mãi nếu không sẽ lỗi ! )</label>
                                    <input type="text" name="khuyenmai_maSP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$km->khuyenmai_maSP}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="khuyenmai_giaSP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$km->khuyenmai_giaSP}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến mãi</label>
                                    <input type="text" name="khuyenmai_giaKM" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$km->khuyenmai_giaKM}}">
                                </div>
                                
                            <!--       <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="khuyenmai_hinhanhSP" class="form-control" id="exampleInputEmail1"  >
                                      <img src="{{URL::to('public/uploads/khuyenmai/'.$km->khuyenmai_hinhanhSP)}}" height="100" width="100">
                                </div>
            -->
                                <button type="submit" name="add_khuyemai" class="btn btn-info">Cập nhật</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection