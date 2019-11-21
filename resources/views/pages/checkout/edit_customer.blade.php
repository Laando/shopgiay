@extends('layout')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					
					<div class="signup-form"><!--sign up form-->
						<h2>Chỉnh sữa costumer</h2>
						@foreach($all_customer as $key => $oneCustomer)
						<form action="{{URL::to('/update-customer')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="customer_name" placeholder="Họ và tên" value="{{$oneCustomer->customer_name}}" />
							<input type="email" name="customer_email" placeholder="Địa chỉ email" value="{{$oneCustomer->customer_email}}" />
							<input type="password" name="customer_password" placeholder="Mật khẩu" value="{{$oneCustomer->customer_password}}"  />
							<input type="text" name="customer_phone" placeholder="Phone" value="{{$oneCustomer->customer_phone}}"  />
							<button type="submit" class="btn btn-default">Cập nhật</button>
						</form>
						@endforeach
					</div><!--/sign up form-->
					
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection