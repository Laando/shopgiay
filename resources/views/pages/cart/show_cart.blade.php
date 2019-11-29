@extends('layout')
@section('content')
<section id="cart_items" class="row">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
			<li class="active">Giỏ hàng</li>
		</ol>
	</div>
	<h4>Sản phẩm bạn thêm vào giỏ hàng</h5>
	<div class="table-responsive cart_info">
		<?php
		$content = Cart::content();
		
		?>
		<table class="table">
			<thead>
				<tr class="cart_menu">
					<th class="image text-center">Hình ảnh</th>
					<th class="description text-center">Tên sp</th>
					<th class="price text-center">Giá</th>
					<th class="quantity text-center">Số lượng</th>
					<th class="total text-center">Tổng</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($content as $v_content)
				<tr>
					<td class="cart_product text-center">
						<a href=""><img class="img-responsive" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="70" alt="" /></a>
					</td>
					<td class="cart_description text-center">
						<h5><a href="">{{$v_content->name}}</a></h5>
					</td>
					<td class="cart_price text-center">
						<span>{{number_format($v_content->price).' '.'vnđ'}}</span>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
								{{ csrf_field() }}
								<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" style="width: 35%;">
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
							</form>
						</div>
					</td>
					<td class="cart_total text-center">
						<span class="cart_total_price">
							
							<?php
							$subtotal = $v_content->price * $v_content->qty;
							echo number_format($subtotal).' '.'vnđ';
							?>
						</span>
					</td>
					<td class="cart_delete text-center" style="position: relative; bottom: 45px;">
						<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section> <!--/#cart_items-->
<section id="do_action" class="row">
			
	<div class="col-sm-6 col-md-offset-6">
		<div class="total_area">
			<ul>
				<li>Tổng <span>{{Cart::total().' '.'vnđ'}}</span></li>
				<li>Thuế <span>{{Cart::tax().' '.'vnđ'}}</span></li>
				<li>Phí vận chuyển <span>Free</span></li>
				<li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
			</ul>
			{{-- 	<a class="btn btn-default update" href="">Update</a> --}}
			<?php
			$customer_id = Session::get('customer_id');
			if($customer_id!=NULL){
			?>
			
			<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
			<?php
			}else{
			?>
			
			<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
			<?php
			}
			?>
			
			
		</div>
	</div>
</section><!--/#do_action-->
@endsection