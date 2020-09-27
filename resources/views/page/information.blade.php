@extends('layout.index2')
@section('css')
<style>
	.woocommerce-MyAccount-navigation {
		float: left;
		width: auto;
		margin-right: 30px;
		margin-bottom: 10px;
	}

	.woocommerce-MyAccount-navigation>ul {
		list-style: none;
		margin: 0;
		border: 1px solid #ccc
	}

	.woocommerce-MyAccount-navigation>ul>li>a {
		display: block;
		font-family: 'PoppinsRegular', Helvetica, Arial, sans-serif;
		min-width: 180px;
		padding: 10px 20px;
		border-bottom: 1px solid #ccc;
	}

	form {
		float: left;
		width: 900px;
	}

	.product-quantity {
		width: 10%;
	}

	.quantity {
		width: 50px !important;
		height: 35px !important;
	}

	ul>li {
		position: relative;
		list-style: none;
		padding: 0xp 30px;
		height: 30xp;
		line-height: 30px;
	}

	ul>li>ul {
		display: none;
		right: -10px;
		position: absolute;
	}

	.product-price {
		width: 150px;
	}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="post-6 page type-page status-publish hentry">
				<div class="entry">
					<div class="entry-content">
						<header>
							<h2 class="entry-title">
								<!-- @if(Auth::check())
											{{Auth::user()->name}}
										@endif -->
							</h2>
						</header>

						<div class="entry-content">
							<div class="woocommerce">
								<nav class="woocommerce-MyAccount-navigation">
									<ul>
									
										<li id="button">
											<a href="{{route('account')}}">Thông tin cá nhân</a>
											<!-- <ul id="show">
														<li><a href="">anhmv</a></li>
													</ul> -->
										</li>
										<!-- <li>
											<a href="{{route('trangchu')}}">Đặt hàng</a>
										</li> -->
										<li>
											<a href="{{route('getCart')}}">Cập nhật giỏ hàng</a>
										</li>


										<li>
											<a href="{{route('orders')}}">Cập nhật đơn hàng</a>
										</li>
										<li>
											<a href="{{route('ordersCanceled')}}">Xem đon hàng đã hủy</a>
										</li>
										<li>
											<a href="{{route('clientLogout')}}">Thoát</a>
										</li>
									</ul>
								</nav>

								<div class="woocommerce-MyAccount-content">
									@yield('content2')
									<!-- <p>
												Hello <strong>Tester</strong> (not Tester? <a href="create_account.html">Sign out</a>)
											</p>
											<p>
												From your account dashboard you can view your 
												<a href="order.html">recent orders</a>, 
												manage your <a href="addresses.html">shipping and billing addresses</a> 
												and <a href="account_details.html">edit your password and account details</a>.
                                            </p> -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection