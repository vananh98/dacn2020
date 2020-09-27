@extends('layout.index2')
@section('css')
<style>
	#cart {
		font-size: 25px;
	}

	.quantity {
		display: block;
		font-size: 25px;
		width: 15%;
	}

	.submit {
		font-size: 25px;
		color: black;
	}

	.submit:hover {
		color: blue
	}

	.menu2 {
		width: 100%;
		height: 10px;
		background-color: white;
	}

	.input {
		border: none;
		text-transform: capitalize
	}

	.product-thumb-hover {
		height: 246px;
	}

	.images {
		height: 500px;
	}

	.attachment-shop_single {
		height: 450px;
	}
</style>
@endsection
@section('content')
<div class=menu2>

</div>
<!-- <div class="listings-title">
	<div class="container">
		<div class="wrap-title">
			<h1>Turkey Qui</h1>
			<div class="bread">
				<div class="breadcrumbs theme-clearfix">
					<div class="container">
						<ul class="breadcrumb">
							<li><a href="home_page_1.html">Home</a><span class="go-page"></span></li>
							<li><a href="group_product.html">Group Product</a><span class="go-page"></span></li>
							<li class="active"><span>Turkey Qui</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container">
	<div class="row">
		<div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
			<div id="container">
				<div id="content" role="main">
					<div class="single-product clearfix">
						<div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
							<div class="product_detail row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
									<div class="slider_img_productd">
										<!-- woocommerce_show_product_images -->
										<div id="product_img_01" class="product-images loading" data-rtl="false">
											<div class="product-images-container clearfix thumbnail-bottom">
												<!-- Image Slider -->
												<div class="slider product-responsive">
													<div class="item-img-slider">
														<div class="images">
															<a href="img/{{$product->Hinh}} " data-rel="prettyPhoto[product-gallery]" class="zoom">
																<img width="600" height="500" src="img/{{$product->Hinh}}" class="attachment-shop_single size-shop_single" alt="" sizes="(max-width: 400) 100vw, 600px">
															</a>
														</div>
													</div>


												</div>


											</div>
										</div>
									</div>
								</div>
								<form action="{{Route('cart')}}" method="post" enctype="multipart/form-data">
									@csrf
									<input hidden type="text" name="_token" value="{{csrf_token()}}">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
										<div class="content_product_detail">

											<h1 class="product_title entry-title"><input style="width:80%;border:none" class="form-group" disabled name="name" type="text" value="{{$product->TenSP}}">
												<input hidden name="id" type="text" value="{{$product->MaSP}}">
											</h1>

											<div class="reviews-content">
												<!-- <div class="star"></div> -->
												<!-- <a href="#reviews" class="woocommerce-review-link" rel="nofollow"></a> -->
												<span name="review" class="count">{{$product->DanhGia}}</span> Review(s)
											</div>

											<div>
												<p class="price"><span name="price" class="woocommerce-Price-amount amount">{{number_format(($product->Gia)-($product->Gia/100*($product->KhuyenMai)))}}Đ</span></p>
											</div>

											<div class="product-info clearfix">
												<div class="product-stock pull-left out-stock">
													<!-- <span>@if(($product->quantity)==0)
														{{"Hết hàng"}}
														@else
														{{"Còn hàng"}}
													@endif
													</span> -->
													<h4>Thông tin sản phẩm:</h4>
												</div>
											</div>

											<div class="description" itemprop="description">
												<p>{{$product->Mota}}</p>
											</div>
											<h4>Thương hiệu:</h4>
											<?php

											use App\brand;

											$brand = brand::find($product->FK_MaTH);

											?>
											<span>
												<div class="description" itemprop="description">
													<b>{{$brand->TenTH}}</b>
												</div>
											</span>
											<p class="stock out-of-stock">@if(($product->SoLuong)==0)
												{{"Hết hàng"}}
												@else
												{{"Còn hàng"}}
												@endif</p>
											<input name="quantity" class="quantity" type="number" min="1" value="1" max="{{$product->SoLuong}}">
											<!-- <div class="social-share">
												<div class="title-share">Share</div>
												<div class="wrap-content">
													<a href="http://www.facebook.com" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
													<a href="http://twitter.com" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
													<a href="https://plus.google.com" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-dribbble"></i></a>
													<a href="#"><i class="fa fa-instagram"></i></a>
												</div>
											</div> -->
											<input class="submit" type="submit" value="Giỏ hàng"><span><i id="cart" class="fa fa-shopping-cart" aria-hidden="true"></i></span>

										</div>
									</div>
								</form>

							</div>
						</div>

						<div class="tabs clearfix">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<!-- <li class="description_tab active">
										<a href="#tab-description" data-toggle="tab">Mô tả</a>
									</li> -->

									<li class="reviews_tab ">
										<a href="#tab-reviews" data-toggle="tab">Nhận xét cá nhân</a>
									</li>
									<?php

									use App\User;
									use App\comment;

									$cmt = comment::where([['FK_MaSP', $product->MaSP], ['Trangthai', 'Duyệt']])->get();
									$count = count($cmt);
									?>
									<li class="reviews_tab ">
										<a href="#tab-reviews2" data-toggle="tab">Khách hàng nhật xét ({{$count}})</a>
									</li>
								</ul>

								<div class="clear"></div>

								<div class=" tab-content">
									<!-- <div class="tab-pane active" id="tab-description" style="width:80%; font-size:20px">
										{{$product->Mota}}
									</div> -->
									<!-- Nhận xét cá nhân -->
									<div class="tab-pane " id="tab-reviews">
										<div id="reviews">
											<!-- <div id="comments">
												<h2>Nhận xét</h2>
												<p class="woocommerce-noreviews">There are no reviews yet.</p>
											</div> -->
											<!-- div comment -->
											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														@if(session('nhanxet'))
														<div class="alert alert-success">
															{{session('nhanxet')}}
														</div>
														@endif
														<form action="{{route('comments',['id'=>$product->MaSP])}}" method="post" id="commentform" class="comment-form" style="font-size:18px; font-family:RobotoBold">
															{{csrf_field()}}
															<p class="comment-form-comment">
																<label for="comment">Nhận xét</label>
																<textarea id="comment" name="comment" cols="55" rows="4" aria-required="true" style="font-family: Arial, Helvetica, sans-serif;"></textarea>
															</p>

															<p class="form-submit">
																<input name="submit" type="submit" id="submit" class="submit" value="nhận xét">
															</p>
														</form>
													</div>
												</div>
											</div>

											<div class="clear"></div>
										</div>
									</div>
									<!-- Khách hàng nhận xét -->
									<div class="tab-pane " id="tab-reviews2">
										<div id="reviews">
											<!-- <div id="comments"> -->
											<!-- <h2>Nhận xét</h2> -->
											<!-- <p class="woocommerce-noreviews">There are no reviews yet.</p> -->
											<!-- </div> -->

											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														<table id="commentform" class="comment-form" style="font-size:18px; font-family:RobotoBold; border: none;width: 100%;">

															<div>
																@foreach($cmt as $cm)
																<?php
																$user = User::find($cm->Fk_MaKh)->Hoten;
																?>
																<tr style="border-bottom: none;background-color: #f2f2f2;">
																	<td style="width: 15%;border-right: 0;">{{$user }}:</td>
																	<td style="border-right: 0;">{{$cm->Noidung}}</td>
																</tr>
																@endforeach
															</div>

														</table>
													</div>
												</div>
											</div>

											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="bottom-single-product theme-clearfix">
							<div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
								<div class="widget-inner">
									<div id="slider_sw_related_upsell_widget-2" class="sw-woo-container-slider related-products responsive-slider clearfix loading" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
										<div class="resp-slider-container">
											<div class="box-slider-title">
												<h2><span>Sản phẩm khác</span></h2>
											</div>
											<div class="slider responsive">
												@if(count($lists)>1)
												@foreach($lists as $item)
												@continue($item->MaSP ==$product->MaSP)
												<div class="item ">
													<div class="item-wrap">
														<div class="item-detail">
															<div class="item-img products-thumb">
																<span class="onsale">Sale!</span>
																<a href="simple_product/{{$item->MaSP}}">
																	<div class="product-thumb-hover">
																		<img width="300" height="300" src="img/{{$item->Hinh}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" title="{{$item->TenSP}}" sizes=" (max-width: 300px) 100vw, 300px">
																	</div>
																</a>

																<!-- add to cart, wishlist, compare -->
																<div class="item-bottom clearfix">
																	<a id="{{$item->MaSP}}" rel="nofollow" href="javascript:" class="button click" title="Giỏ hàng">Add to cart</a>



																	<!-- <div class="yith-wcwl-add-to-wishlist ">
																		<div class="yith-wcwl-add-button show" style="display:block">
																			<a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
																			<img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																		</div>

																		<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																			<span class="feedback">Product added!</span>
																			<a href="#" rel="nofollow">Browse Wishlist</a>
																		</div>

																		<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
																			<span class="feedback">The product is already in the wishlist!</span>
																			<a href="#" rel="nofollow">Browse Wishlist</a>
																		</div>

																		<div style="clear:both"></div>
																		<div class="yith-wcwl-wishlistaddresponse"></div>
																	</div> -->

																	<div class="clear"></div>
																	<a href="simple_product/{{$item->MaSP}}" data-fancybox-type="" class="sm_quickview_handler-list fancybox" title="Xem chi tiết"></a>
																</div>
															</div>

															<div class="item-content">
																<!-- rating  -->
																<div class="reviews-content">
																	<div class="star"></div>
																	<div class="item-number-rating">
																		{{$item->DanhGia}} Review(s)
																	</div>
																</div>
																<!-- end rating  -->

																<h5><a href="simple_product.html" title="iPad Mini 2 Retina">{{$item->TenSP}}</a></h5>

																<!-- price -->
																<div class="item-price">
																	@if(($item->KhuyenMai)>0)
																	<del>
																		{{number_format($item->Gia).'Đ'}}
																	</del>
																	<ins>
																		{{ number_format(($item->Gia)-($item->Gia)*($item->KhuyenMai)/100 ).'Đ'}}
																	</ins>
																	@else
																	<ins>
																		{{number_format($item->Gia).'Đ'}}
																	</ins>
																	@endif
																</div>
																@if(($item->KhuyenMai)>0)
																<div class="sale-off">
																	-{{$item->KhuyenMai}}%
																</div>
																@endif
															</div>
														</div>
													</div>
												</div>
												@endforeach
												@else
												<h4>Chưa có sản phẩm tương tự</h4>
												@endif

											</div>

										</div>
									</div>
								</div>
							</div>

							<div class="widget-2 widget-last widget sw_related_upsell_widget-3 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
								<div class="widget-inner"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
	$(document).ready(function() {
		$(".click").click(function() {
			var id = $(this).attr("id");
			var token = $("input[name='_token']").val();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': token
				},
				url: 'addlive',
				type: 'post',
				cache: false,
				data: {
					"id": id
				},
				success: function(dt) {
					if (dt == "false") {
						window.location = 'login'
					} else {
						$(".minicart-number").text(dt)
						console.log(dt)
					}
				},

			});
		});
	});
</script>

@endsection