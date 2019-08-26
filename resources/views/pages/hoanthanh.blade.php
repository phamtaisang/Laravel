@extends('layout.index')
@section('content')
<?php $data_tien = Cart::getTotal(); $data = Cart::getContent();?>

<div style="color: green; height:auto; padding-top: 50px; text-align: center;">
	<p> ĐẶT HÀNG THÀNH CÔNG !</p>
	<p>
		@foreach($data as $dt)
			<p>{{ $dt->name }}   <span class="color-gray">X{{ $dt->quantity }}</span></p>
		@endforeach
	</p>
	<p><span class="color-gray your-order-info">Tổng số tiền bạn phải trả là :<span style="color: red;">{{ number_format($data_tien) }}VNĐ</span> </span> .<br></p>
	<p>Kiểm tra email để biết thêm thông tin đơn hàng ! </p>
	<p>Chúng tôi sẽ giao hàng trong thời gian sớm nhất ! </p><br>
	<p>Cảm ơn bạn đã mua hàng ! </p>
	<p> <br>Phone : 0355161412 <br> email : phamtaisang97@gmail.com</p>
	
</div>
@endsection