@extends('layout.index')
@section('content')
<div class="container">
<div id="content">
<div class="row">
<div class="col-sm-9">

<div class="row">
	<div class="col-sm-4">
		<img src="upload/sanpham/{{ $sanpham->images }}" alt="">
	</div>
	<div class="col-sm-8">
		<div class="single-item-body">
			<p class="single-item-title">{{ $sanpham->name }}</p>
			<p class="single-item-price">
				<span style="color: red;">{{ number_format($sanpham->count) }}VNĐ</span>
			</p>
		</div>

		<div class="clearfix"></div>
		<div class="space20">&nbsp;</div>

		<div class="single-item-desc">
			<p>{{ $sanpham->content }}</p>
		</div>
		<div class="space20">&nbsp;</div>

		{{-- <p>Số lượng:</p> --}}
		<div class="single-item-options">
			{{-- <select class="wc-select" name="size">
				<option>Size</option>
				<option value="XS">XS</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
			</select>
			<select class="wc-select" name="color">
				<option>Color</option>
				<option value="Red">Red</option>
				<option value="Green">Green</option>
				<option value="Yellow">Yellow</option>
				<option value="Black">Black</option>
				<option value="White">White</option>
			</select> --}}
			{{-- <select class="wc-select" name="soluong">
				<option>Số lượng</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select> --}}
			<a class="add-to-cart" href="cart/add_chitiet/{{ $sanpham->id }}"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="space40">&nbsp;</div>
<div class="woocommerce-tabs">
	<ul class="tabs">
		<li><a href="#tab-description">Mô tả </a></li>
		<li><a href="#tab-reviews">Đánh giá </a></li>
		 <span style="color: red;">
		 	@if(session('thongbao'))
		        <div>
		            {{ session('thongbao') }}
		        </div>
		       @endif
		 </span>
	</ul>

	<div class="panel" id="tab-description">
		<p>{{ $sanpham->mota }}</p>
	</div>
	<div class="panel" id="tab-reviews">
		@if(!Auth::user())
		<a  style="color: red; font-size: 15px;" href="dang-nhap/login">Đăng nhập !</a>
		@else
		<div class="well">
            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form" action="comment/{{ $sanpham->id }}" method="post">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>
        @endif
		@foreach($sanpham->comment as $cm)
		<p style="color: gray;">{{ $cm->user->email }} <span style="color: gray; font-size: 9px">{{ $cm->created_at }}</span></p>  
		 + {{ $cm->content }} 
		@endforeach
	</div>
</div>
<div class="space50">&nbsp;</div>
<div class="beta-products-list">
	<h4>Sản phẩm liên quan </h4>

	<div class="row">
		@foreach($sanphamlienquan as $lq)
			<div class="col-sm-4">
				<div class="single-item">
					<div class="single-item-header">
						<a href="thongtinsanpham/{{ $lq->id }}"><img src="upload/sanpham/{{ $lq->images }}" alt="" width="270px" height="320px"></a>
					</div>
					<div class="single-item-body">
						<p class="single-item-title">{{ $lq->name }}</p>
						<p class="single-item-price">
							<span style="color: red;">{{ number_format($lq->count) }}VNĐ</span>
						</p>
					</div>
					<div class="single-item-caption">
						<a class="add-to-cart pull-left" href="thongtinsanpham/{{ $lq->id }}"><i class="fa fa-shopping-cart"></i></a>
						<a class="beta-btn primary" href="thongtinsanpham/{{ $lq->id }}">Xem <i class="fa fa-chevron-right"></i></a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div style="text-align: center;">
        {{ $sanphamlienquan->links() }} {{-- this is phân trang quá là vi dieu :)))))) --}}
     </div>
</div> <!-- .beta-products-list -->
</div>



<div class="col-sm-3 aside">
<div class="widget">
	<h3 class="widget-title">Best Sellers</h3>
	<div class="widget-body">
		<div class="beta-sales beta-lists">
			@foreach($sanphamhot as $hot)
			<div class="media beta-sales-item">
				<a class="pull-left" href="thongtinsanpham/{{ $hot->id }}"><img src="upload/sanpham/{{ $hot->images }}" alt=""></a>
				<div class="media-body">
					<p>{{ $hot->name }}</p>
					<span class="beta-sales-price">{{ number_format($hot->count) }}.VNĐ</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div> <!-- best sellers widget -->
<div class="widget">
	<h3 class="widget-title">New Products</h3>

	<div class="widget-body">
		<div class="beta-sales beta-lists">
			@foreach($sanphammoi as $new)
			<div class="media beta-sales-item">
				<a class="pull-left" href="thongtinsanpham/{{ $new->id }}"><img src="upload/sanpham/{{ $new->images }}" alt=""></a>
				<div class="media-body">
					<p>{{ $new->name }}</p>
					<span class="beta-sales-price">{{ number_format($new->count) }}.VNĐ</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div> <!-- best sellers widget -->
</div>
</div>
</div> <!-- #content -->
	</div> <!-- .container -->
@endsection