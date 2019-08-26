@extends('layout.index')
@section('content')
<?php $data_tien = Cart::getTotal();?>

<div class="container">
		<div id="content">
		<form action="cart/thanhtoan" method="post" class="beta-form-checkout">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		@if(!Auth::user())
			
			<div class="col-sm-6">
			<h4>Đặt hàng</h4>
			<div class="space20">&nbsp;</div>

			<div class="form-block">
				<label for="name">Họ tên*</label>
				<input type="text" id="name" placeholder="Họ tên" name="name" required value="">
			</div>
			<div class="form-block">
				<label for="email">Email*</label>
				<input type="email" name="email" required placeholder="expample@gmail.com" value="" >
			</div>

			<div class="form-block">
				<label for="adress">Địa chỉ*</label>
				<input type="text" name="address" placeholder="Nhập địa chỉ ! " required value="">
			</div>
			

			<div class="form-block">
				<label for="phone">Điện thoại*</label>
				<input type="text" name="phone" placeholder="Nhập đúng số điện thoại !" required value="">
			</div>
		</div>
		@else
		<div class="col-sm-6">
			<h4>Đặt hàng</h4>
			<div class="space20">&nbsp;</div>

			<div class="form-block">
				<label for="name">Họ tên*</label>
				<input type="text" id="name" placeholder="Họ tên" name="name" required value="{{ Auth::user()->name }}">
			</div>
			<div class="form-block">
				<label for="email">Email*</label>
				<input type="email" name="email" required placeholder="expample@gmail.com" value="{{ Auth::user()->email }}" disabled readonly="" >
			</div>

			<div class="form-block">
				<label for="adress">Địa chỉ*</label>
				<input type="text" name="address" placeholder="Street Address" required value="{{ Auth::user()->address }}">
			</div>
			<div class="form-block">
				<label for="phone">Điện thoại*</label>
				<input type="text" name="phone" required value="{{ Auth::user()->phone }}">
			</div>
		</div>
		@endif
		<div class="col-sm-6">
			<div class="your-order">
				<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
				<div class="your-order-body" style="padding: 0px 10px">
					<div class="your-order-item">
						<div>
						<!--  one item	 -->
						@foreach($data as $dt)
							<div class="media">
								<img width="25%" src="upload/sanpham/{{ $dt->attributes->img }}" alt="" class="pull-left">
								<input type="hidden" name="id_pro" value="{{ $dt }}">
								<div class="media-body">
									<p class="font-large">{{ $dt->name }}</p>
									<input type="hidden" name="name_product">
									<span class="color-gray your-order-info">Giá : {{ number_format($dt->price) }}VNĐ</span>
									<span class="color-gray your-order-info">Số lượng :{{ $dt->quantity }} </span>
									<input type="hidden" name="qty" value="{{ $dt->quantity }}">
									<span class="color-gray your-order-info">Tổng :<span style="color: red;">{{ number_format($dt->price*$dt->quantity) }}VNĐ</span> </span>
									<input type="hidden" name="amount" value="{{ number_format($dt->price*$dt->quantity) }}">
									<hr>
									<p><a style="color: gold; font-weight: bold;" href="cart/xoa/{{ $dt->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</a></p>
								</div>
							</div>
						@endforeach
						<!-- end one item -->
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="your-order-item">
						<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
						<div class="pull-right"><span style="font-size: 15px; color: red;">{{ number_format($data_tien) }}VNĐ</span></div>
						
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
				
				<div class="your-order-body">
					<ul class="payment_methods methods">
						<li class="payment_method_bacs">
							<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
							<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
							<div class="payment_box payment_method_bacs" style="display: block;">
								Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
							</div>						
						</li>

						<li class="payment_method_cheque">
							<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
							<label for="payment_method_cheque">Chuyển khoản </label>
							<div class="payment_box payment_method_cheque" style="display: none;">
								Hệ thống chưa cập nhập tính năng này !
								
							</div>						
						</li>
						
					</ul>
				</div>

				<div class="text-center">
					<button type="submit" class="beta-btn primary">Đặt hàng </button>
					@if(!Auth::user())
						<p style="color: gray; font-size: 9px;">Bạn phải đăng nhập mới click được ! </p>
					@else
						<p style="color: gray; font-size: 9px;">Click đặt hàng ngay ! </p>
					@endif
				</div>
			</div> <!-- .your-order -->
		</div>
	</div>
</form>
</div> <!-- #content -->
</div> <!-- .container -->

@endsection