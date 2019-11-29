@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật liên hệ
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($lienhe as $key => $lh)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-lienhe/'.$lh->lienhe_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                              <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin liên hệ </label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="lienhe_noidung" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">{{$lh->lienhe_noidung}}</textarea>
                                    <script>
                                        CKEDITOR.replace( 'lienhe_noidung' );
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Link nhúng website</label>
                                    <input type="text" value="{{$lh->lienhe_link}}" name="lienhe_link" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <button type="submit" name="update_lienhe" class="btn btn-info">Cập nhật liên hệ</button>
                                </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
@endsection