@extends('layout.index')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loaisp as $l)
							@if(count($l->sanpham)>0)
							<li><a href="loaisanpham/{{ $l->id }}">{{ $l->name }}</a></li>
							@endif
							@endforeach
							
						</ul>
					</div>
					<div class="col-sm-9">
							<div class="beta-products-list">
							<h4></h4>
							<div class="beta-products-details">
								<p class="pull-left">
									Tìm thấy {{ count($sanpham) }} sản phẩm
								</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">

							@foreach($sanpham as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="thongtinsanpham/{{ $sp->id }}"><img src="upload/sanpham/{{ $sp->images }}" alt="lỗi ảnh" width="100%" height="320px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $sp->name }}</p>
											<p class="single-item-price">
												<span style="color: red;">{{ number_format($sp->count) }}VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" onclick="alert('đã thêm vào 1 giỏ hàng !')" href="cart/add/{{ $sp->id }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="thongtinsanpham/{{ $sp->id }}">xem <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach	

						</div> <!-- .beta-products-list -->
						<div style="text-align: center;">
                            {{ $sanpham->links() }} {{-- this is phân trang quá là vi dieu :)))))) --}}
                         </div>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left"> Tìm thấy {{ count($sanphammoi) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanphammoi as $new)
								<div class="col-sm-4">
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
						</div> <!-- .beta-products-list -->
					</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div> <!-- .container -->
@endsection