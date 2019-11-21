@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->

                       
                       
                        <h2 class="title text-center">Sản phẩm khuyến mãi</h2>

                        
                        @foreach($all_khuyenmai as $key => $km)
                        <a href="{{URL::to('/show-sanphamKM/'.$km->khuyenmai_maSP)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
        
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$km->khuyenmai_hinhanhSP)}}" alt="" />
                                            <h2 style=" text-decoration: line-through;">{{number_format($km->khuyenmai_giaSP).' '.'VNĐ'}}</h2>
                                            <h2>{{number_format($km->khuyenmai_giaKM).' '.'VNĐ'}}</h2>
                                            <p>{{$km->khuyenmai_name}}</p>
                                            <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết </a>
                                        </div>
                                      
                                </div>

                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>

                            </div>
                    
                        </div>
                        </a>
                        @endforeach
                    </div><!--features_items-->
        <!--/recommended_items-->
@endsection