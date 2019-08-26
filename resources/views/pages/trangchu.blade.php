@extends('layout.index');
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
				<h4>Sản phẩm đang hot nhất</h4>
				<div class="beta-products-details">
					<p class="pull-left">
						tìm thấy {{ count($sanpham) }} sản phẩm 
					</p>
					<div class="clearfix"></div>
				</div>
		@foreach($sanpham as $sp)	
			<div class="col-sm-3">
				<div class="single-item">
					<div class="single-item-header">
						<a href="thongtinsanpham/{{ $sp->id }}"><img src="upload/sanpham/{{ $sp->images }}" alt="lỗi ảnh" width="270px" height="320px"></a>
					</div>
					<div class="single-item-body">
						<p class="single-item-title">{{ $sp->name }}</p>
						<p class="single-item-price">
							<span style="color: red;">{{ number_format($sp->count) }}VNĐ</span>
						</p>
					</div>
					<div class="single-item-caption">
						<a class="add-to-cart pull-left" href="cart/add/{{ $sp->id }}" onclick="alert(' Đã thêm vào 1 giỏ hàng !')" ><i class="fa fa-shopping-cart"></i></a>
						<a class="beta-btn primary" href="thongtinsanpham/{{ $sp->id }}">xem <i class="fa fa-chevron-right"></i></a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		@endforeach	
	</div> <!-- .beta-products-list -->
				<h4>Sản phẩm mới</h4>
				<div class="beta-products-details">
					<p class="pull-left"> Tìm thấy {{ count($sanphammoi) }} sản phẩm</p>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					@foreach($sanphammoi as $new)
					<div class="col-sm-3">
						<div class="single-item">
							<div class="single-item-header">
								<a href="thongtinsanpham/{{ $new->id }}"><img src="upload/sanpham/{{ $new->images }}" alt="lỗi" width="270px" height="320px"></a>
							</div>
							<div class="single-item-body">
								<p class="single-item-title">{{ $new->name }}</p>
								<p class="single-item-price">
									<span style="color: red;">{{ number_format($sp->count) }}VNĐ</span>
								</p>
							</div>
							<div class="single-item-caption">
								<a class="add-to-cart pull-left" onclick="alert('Đã thêm vào 1 giỏ hàng !')" href="cart/add/{{ $new->id }}"><i class="fa fa-shopping-cart"></i></a>
								<a class="beta-btn primary" href="thongtinsanpham/{{ $new->id }}">Xem <i class="fa fa-chevron-right"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div style="text-align: center;">
                		{{ $sanphammoi->links() }} {{-- this is phân trang quá là vi dieu :)))))) --}}
             	</div>
	</div>
</div>
	
@endsection