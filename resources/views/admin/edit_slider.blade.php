@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật slider
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
                                @foreach($edit_slider as $key => $slider)
                                <form role="form" action="{{URL::to('/update-slider/'.$slider->slider_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề slider</label>
                                    <input type="text" name="slider_tieude" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$slider->slider_tieude}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea style="resize: none" rows="8" type="text" name="slider_noidung" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" >{{$slider->slider_noidung}}
                                     </textarea> 
                                    <script>
                                        CKEDITOR.replace( 'slider_noidung' );
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="slider_hinhanhSP" class="form-control" id="exampleInputEmail1" >
                                    <img src="{{URL::to('public/uploads/slider/'.$slider->slider_hinhanhSP)}}" height="100" width="100">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Chèn link Sản phẩm</label>
                                    <input type="text" name="slider_chenlinkSP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$slider->slider_chenlinkSP}}">
                                </div>
                                 
                                <button type="submit" name="add_slider" class="btn btn-info">Cập nhật slider</button>
                                </form>
                                 @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection