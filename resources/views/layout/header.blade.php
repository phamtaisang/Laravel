<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Thanh Oai - Hà Nội </a></li>
						<li><a href=""><i class="fa fa-phone"></i>0988888888</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(!Auth::user())
                    <li>
                        <a href="dang-nhap/dangky">Đăng ký</a>
                    </li>
                    <li>
                        <a href="dang-nhap/login">Đăng nhập</a>
                    </li>
                @else
                    <li>
                    	<a href="dang-nhap/info/{{ Auth::user()->id }}">
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{ Auth::user()->name }}
                    	</a>
                    </li>

                    <li>
                    	<a href="dang-nhap/dangxuat">Đăng xuất</a>
                    </li>
                @endif    
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="trangchu" id="logo">Learn-Laravel</a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<?php $data_tien = Cart::getTotal(); $data = Cart::getContent();?>
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{ count($data) }}) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($data as $dt)
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="thongtinsanpham/{{ $dt->id }}"><img src="upload/sanpham/{{ $dt->attributes->img }}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{ $dt->name }}</span>
											<span class="cart-item-amount">x{{ $dt->quantity }}<span>( {{ number_format($dt->price) }}VNĐ )</span></span>
										</div>
									</div>
								</div>
								@endforeach

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ number_format($data_tien) }}VNĐ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="cart/show" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							
						
							
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="trangchu">Trang chủ</a></li>
						<li><a>Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loaisp as $i)
							@if(count($i->sanpham)>0)
								<li><a href="loaisanpham/{{ $i->id }}">{{ $i->name }}</a></li>
							@endif
							@endforeach	
							</ul>
						</li>
						<li><a href="gioithieu">Giới thiệu</a></li>
						<li><a href="lienhe">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->