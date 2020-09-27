<!DOCTYPE html>
<html lang="en">

<head>
	<title>Etro Store - Premium Multipurpose HTML5/CSS3 Theme</title>
	<base href="{{asset('')}}">
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- FAVICONS -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="icons/apple-touch-icon-144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="icons/apple-touch-icon-114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="icons/apple-touch-icon-72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="icons/apple-touch-icon-57-precomposed.png" />
	<link rel="shortcut icon" href="icons/favicon.png" />

	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="css/slick-1.6.0/slick.css" />

	<link rel="stylesheet" href="css/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/yith-woocommerce-compare/colorbox.css" />
	<link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css" />
	<link rel="stylesheet" href="css/js_composer/js_composer.min.css" />
	<link rel="stylesheet" href="css/woocommerce/woocommerce.css" />
	<link rel="stylesheet" href="css/yith-woocommerce-wishlist/style.css" />


	<link rel="stylesheet" href="css/yith-woocommerce-wishlist/style.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/app-orange.css" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="css/app-responsive.css" />
	@yield('css')
</head>

<body class="page home-style1">
	<div class="body-wrapper theme-clearfix">
		@include('layout.header')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>Home</h1>

					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="home_page_1.html">Home</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>Home</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								@include('layout.menu')

								<div class="vc_row-full-width vc_clearfix"></div>

								@yield('content')

								<div class="vc_row vc_row-fluid">
									<div class="vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

		@include('layout.footer')
	</div>

	<!-- DIALOGS -->

	<div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-login">
			<a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>

			<div class="tt_popup_login">
				<strong>Sign in Or Register</strong>
			</div>

			<div class="block-content">
				<div class="col-reg registered-account">
					<div class="email-input">
						<input type="text" class="form-control input-text username" name="username" id="username" placeholder="Username" />
					</div>

					<div class="pass-input">
						<input class="form-control input-text password" type="password" placeholder="Password" name="password" id="password" />
					</div>

					<div class="ft-link-p">
						<a href="lost_password.html" title="Forgot your password">Forgot your password?</a>
					</div>

					<div class="actions">
						<div class="submit-login">
							<input type="submit" class="button btn-submit-login" name="login" value="Login" />
						</div>
					</div>
				</div>

				<div class="col-reg login-customer">
					<h2>NEW HERE?</h2>

					<p class="note-reg">Registration is free and easy!</p>

					<ul class="list-log">
						<li>Faster checkout</li>

						<li>Save multiple shipping addresses</li>

						<li>View and track orders and more</li>
					</ul>

					<a href="create_account.html" title="Register" class="btn-reg-popup">Create an account</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<a id="etrostore-totop" href="#"></a>

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery/js.cookie.min.js"></script>

	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/slick-1.6.0/slick.min.js"></script>

	<script type="text/javascript" src="js/yith-woocommerce-compare/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/isotope/isotope.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/sw_woocommerce/category-ajax.js"></script>
	<script type="text/javascript" src="js/sw_woocommerce/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="js/js_composer/js_composer_front.min.js"></script>

	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/megamenu.min.js"></script>
	<script type="text/javascript" src="js/main.min.js"></script>

	<script type="text/javascript">
		var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
		var sticky_navigation = function() {
			var scroll_top = $(window).scrollTop();
			if (scroll_top > sticky_navigation_offset_top) {
				$("#header .header-bottom").addClass("sticky-menu");
				$("#header .header-bottom").css({
					"top": 0,
					"left": 0,
					"right": 0
				});
			} else {
				$("#header .header-bottom").removeClass("sticky-menu");
			}
		};
		sticky_navigation();
		$(window).scroll(function() {
			sticky_navigation();
		});

		$(document).ready(function() {
			$(".show-dropdown").each(function() {
				$(this).on("click", function() {
					$(this).toggleClass("show");
					var $element = $(this).parent().find("> ul");
					$element.toggle(300);
				});
			});
		});
		$(document).ready(function() {
			$("#click123").click(function() {
				window.location = "myaccount/cart"
			})
		});
		$(document).ready(function() {
			$("#click123b").click(function() {
				window.location = "myaccount/cart"
			})
		})
		
	</script>
	@yield('script')

</body>

</html>