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
				<?php
						$message = Session::get('message-update-customer');
						if($message){
							echo '<span class="text-alert">'.$message.'</span>';
							Session::put('message',null);
						}
				?>
			<div class="registber-req">
				<a href="{{URL::to('/edit-customer')}}"><p> Bạn muốn chỉnh sữa thông tin ?</p></a>
			</div>
			<div class="register-req">
				<p>Bạn đã đăng nhập thành công, bây giờ hãy điền thông tin vào phiếu mua hàng !</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" placeholder="Phone">
									<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div style="height: 50px; width: auto;">
				
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection