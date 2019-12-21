@extends('layout')
@section('content')
@foreach($khuyenmai_details as $key => $value)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <h2>{{$value->khuyenmai_name}}</h2>
            <p>Mã ID: {{$value->khuyenmai_id}}</p>
            <img src="images/product-details/rating.png" alt="" />

            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <span style=" text-decoration: line-through;">{{number_format($value->khuyenmai_giaSP).'VNĐ'}}</span>
                <span>{{number_format($value->khuyenmai_giaKM).'VNĐ'}}</span>

                <label>Số lượng:</label>
                <input name="qty" type="number" min="1" value="1" />
                <input name="productid_hidden" type="hidden" value="{{$value->khuyenmai_id}}" />
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                </button>

                </span>
            </form>

            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Mơi 100%</p>
            <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
            <p><b>Danh mục:</b> {{$value->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>

<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$value->product_desc!!}</p>

        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$value->product_content!!}</p>

        </div>

        <div class="tab-pane fade" id="reviews">
        </div>

    </div>
</div>
@endforeach
@include('pages/sanphamhot/like_sanphamKM')
@endsection