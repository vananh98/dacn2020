@extends('layout.index2')
@section('content')
<div class="listings-title">
	<div class="container">
		<div class="wrap-title">
			<h1>My Account</h1>
			<div class="bread">
				<div class="breadcrumbs theme-clearfix">
					<div class="container">
						<ul class="breadcrumb">
							<li>
								<a href="home_page_1.html">Home</a>
								<span class="go-page"></span>
							</li>

							<li class="active">
								<span>My account</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="height:20px">

</div>
<div class="container">
	<div class="row">
		<div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="single page type-page status-publish hentry">
				<div class="entry">
					<div class="entry-content">
						<!-- <header>
									<h2 class="entry-title">My Account</h2>
								</header> -->
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if(session('thongbao'))
						<div class="alert alert-danger">
							{{session('thongbao')}}
						</div>
						@endif

						<div class="entry-content">
							<div class="woocommerce">
								<div class="col2-set row" id="customer_login">
									<div class="col-lg-6">
										<h2>Đăng nhập</h2>

										<form method="post" class="login" action="{{Route('clientLogin')}}">
											@csrf
											<input hidden type="text" value="{{csrf_token()}}">
											<p class="form-row form-row-wide">
												<label for="username">
													Tên tài khoản <span class="required">*</span>
												</label>

												<input type="text" class="input-text" name="username" id="username" placeholder="Tên tài khoản" />
											</p>

											<p class="form-row form-row-wide">
												<label for="password">
													Mật khẩu <span class="required">*</span>
												</label>
												<input class="input-text" type="password" name="password" id="password" placeholder="Mật khẩu" />
											</p>

											<!-- <p class="form-row">
														<label for="rememberme" class="inline">
															<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
														</label>
													</p> -->

											<p class="form-row">
												<input type="submit" class="button" name="login" value="Đăng nhập" />
											</p>

											<p class="lost_password">
												<a href="lost_password.html">Lost your password?</a>
											</p>
										</form>
									</div>


									<div class="col-lg-6">
										@if(session('thongbao2'))
										<div class="alert alert-success">
											{{session('thongbao2')}}
										</div>
										@endif
										<h2>Đăng kí tài khoản</h2>

										<form method="post" class="register" action="{{route('regis2')}}">
											@csrf
											<input type="text" name="_token" value="{{csrf_token()}}" hidden>
											<p class="form-row form-row-wide">
												<label for="reg_email">
													Tên tài khoản <span class="required">*</span>
												</label>
												<input type="text" class="input-text" name="name" id="" placeholder="Tên tài khoản" required />
												<label for="reg_email">
													Họ tên<span class="required">*</span>
												</label>

												<input type="text" class="input-text" name="fullname" id="reg_email" placeholder="Họ tên" required />
												<label for="reg_email">
													Email<span class="required">*</span>
												</label>

												<input type="email" class="input-text" name="email" id="reg_email" placeholder="Email" required />
												<label for="reg_email">
													Địa chỉ<span class="required">*</span>
												</label>

												<input type="text" class="input-text" name="address" id="reg_email" placeholder="Địa chỉ" required />
												<label for="reg_email">
													Số điện thoại<span class="required">*</span>
												</label>

												<input type="tel" class="input-text" name="phone" id="reg_email" pattern="[0-9]{10}" placeholder="Số điện thoại" required />
											</p>

											<p class="form-row form-row-wide">
												<label for="reg_password">
													Mật khẩu <span class="required">*</span>
												</label>

												<input type="password" class="input-text" name="password" id="reg_password" placeholder="Mật khẩu" required />
											</p>
											<p class="form-row form-row-wide">
												<label for="password">
													Nhập lại mật khẩu <span class="required">*</span>
												</label>
												<input class="input-text" type="password" name="password2" id="password" placeholder="NHập lại mật khẩu" required />
											</p>

											<p class="form-row">
												<input type="submit" class="button " name="register" value="Đăng kí" />
											</p>
										</form>
									</div>
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