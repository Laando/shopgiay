@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			
			<div class="review-payment">
				<h2>Bạn đã điền thành công đơn hàng, và bây giờ hãy xem lại đơn hàng và chọn hình thức thanh toán!</h2>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$content = Cart::content();
				
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sp</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'vnđ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'vnđ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{ csrf_field() }}
			<ul class="row" style="list-style-type: none;">
                <li class="col-md-3">
                    <div class="gwitem text-center ">
                    	<input value="1" type="radio" name="payment_option">
                        <p>Thanh toán chuyển khoản MOMO</p>
                        <!-- <img src="../public/frontend/images/momo.jpg" alt="" width="200px"> -->
                    </div>
                </li>
                <li class="col-md-3 text-center">
                    <div class="gwitem text-center ">
                    	<input value="2" type="radio" name="payment_option">
                        <p>Thanh toán thẻ tín dụng</p>
                        <!-- <img src="https://library.kissclipart.com/20181216/zse/kissclipart-mastercard-logo-png-clipart-mastercard-credit-card-e1dd82cbbdc63d51.png" alt="" width="200px"> -->
                    </div>
                </li>
            </ul>
			<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection