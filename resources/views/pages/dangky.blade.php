@extends('layout.index')
@section('content')


<div class="container">
	<div id="content">
		
		<form action="dang-nhap/dangky" method="POST" class="beta-form-checkout" enctype="multipart/form-data">
	          <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				 
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					@if(count($errors)>0)
		           <div class="alert alert-danger">
		               @foreach($errors->all() as $err)
		               {{ $err }} <br>
		               @endforeach
		           </div>
		           @endif
		           @if(session('thongbao'))
		            <div class="alert alert-danger">
		                {{ session('thongbao') }}
		            </div>
	          		@endif
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-group">
						<label for="email">Địa chỉ Email*</label>
						<input type="email" name="email" placeholder="Nhập địa chỉ email ! " >
					</div>
					<div class="form-group">
						<label for="your_last_name">Họ và tên *</label>
						<input type="text" name="name" placeholder="Nhập họ tên ! " >
					</div>

					<div class="form-group">
						<label for="adress">Địa chỉ *</label>
						<input type="text" name="address" placeholder="Bạn phải nhập đúng địa chỉ để chúng tôi giao hàng ! ">
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại *</label>
						<input type="number" name="phone" required  class="form-control" placeholder="vui lòng nhập đúng số điện thoại ! ">
					</div>
					<div class="form-group">
						<label for="phone">Mật khẩu *</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
					</div>
					<div class="form-group">
						<label for="phone">Nhập lại mật khẩu*</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="passwordAgain">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Đăng ký </button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection