@extends('layout.index')
@section('css')
<style>
	.product-thumb-hover {
		height: 246px !important;
	}

	.attachment-shop_catalog {
		height: 246px !important;
	}
	
</style>
@endsection
@section('content')
<?php
$brand = App\brand::all()->take(5);
?>
<div class="vc_row vc_row-fluid margin-bottom-60">
	@foreach($brand as $br)
	<div class="vc_column_container vc_col-sm-12">

		<div class="vc_column-inner ">
			<div class="wpb_wrapper">
				<div id="slider_sw_woo_slider_widget_1" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="3" data-interval="5000" data-autoplay="false">
					<div class="child-top clearfix" data-color="#ff9901">
						<div class="box-title pull-left">
							<a href="home/brand{{$br->MaTH}}">
								<h3>{{$br->TenTH}}</h3>
							</a>
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_1" aria-expanded="false">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<?php
						$tp = App\brand::find($br->MaTH)->typeProduct->unique();

						?>
						<div class="box-title-right clearfix">
							<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_1">
								<ul>
									@foreach($tp as $type2)
									<li><a href="brand{{$br->MaTH}}/type{{$type2->MaLoai}}">{{$type2->TenLoai}}</a></li>
									<!-- <li><a href="shop_right_sidebar.html">Air Conditional</a></li>
																	<li><a href="shop_right_sidebar.html">Laptops & Accessories</a></li>
																	<li><a href="shop_right_sidebar.html">Accessories for Tablet</a></li>
																	<li><a href="shop_right_sidebar.html">Headphone</a></li> -->
									@endforeach
								</ul>
							</div>

							<!-- <div class="view-all">
								<a href="shop_right_sidebar.html">See All<i class="fa  fa-caret-right"></i></a>
							</div> -->
						</div>
					</div>

					<div class="content-slider">
						<div class="childcat-slider-content clearfix">
							<!-- Brand -->
							<!-- <div class="child-cat-brand pull-left">
																<div class="item-brand">
																	<a href="#">
																		<img width="170" height="87" src="images/1903/Brand_1.jpg" class="attachment-170x90 size-170x90" alt="" />
																	</a>
																</div>
																
																<div class="item-brand">
																	<a href="#">
																		<img width="170" height="90" src="images/1903/br5.jpg" class="attachment-170x90 size-170x90" alt="" />
																	</a>
																</div>
																
																<div class="item-brand">
																	<a href="#">
																		<img width="170" height="90" src="images/1903/br2.jpg" class="attachment-170x90 size-170x90" alt="" />
																	</a>
																</div>
																
																<div class="item-brand">
																	<a href="#">
																		<img width="170" height="90" src="images/1903/br3.jpg" class="attachment-170x90 size-170x90" alt="" />
																	</a>
																</div>
															</div> -->

							<!-- slider content -->
							<?php
							$product = App\brand::find($br->MaTH)->product;
							?>
							<div class="resp-slider-container">
								<div class="slider responsive">
									@foreach($product as $pr)
									<div class="item product">

										<div class="item-wrap">
											<div class="item-detail">
												<div class="item-content">
													<!-- rating  -->
													<div class="reviews-content">
														<!-- <div class="star"></div> -->
														<div class="item-number-rating"><a href=""> 0 Review(s)</a></div>
													</div>
													<!-- end rating  -->

													<h4>
														{{$pr->TenSP}}
													</h4>

													<!-- Price -->
													<div class="item-price">
														<span>
															@if(($pr->KhuyenMai)>0)
															<del>
																{{number_format($pr->Gia).'Đ'}}
															</del>
															<ins>
																{{ number_format(($pr->Gia)-($pr->Gia)*($pr->KhuyenMai)/100 ).'Đ'}}
															</ins>
															@else
															<ins>
																{{number_format($pr->Gia).'Đ'}}
															</ins>
															@endif
														</span>
													</div>
													@if(($pr->KhuyenMai)>0)
													<div class="sale-off">
														-{{$pr->KhuyenMai}}%
													</div>
													@endif
												</div>

												<div class="item-img products-thumb">
													<a href="simple_product/{{$pr->MaSP}}">
														<div class="product-thumb-hover">
															<img width="300" height="300" src="img/{{$pr->Hinh}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" sizes="(max-width: 300px) 100vw, 300px" />
														</div>
													</a>

													<!-- add to cart, wishlist, compare -->
													<div class="item-bottom clearfix">

														<input hidden type="text" name="token" value={{csrf_token()}}>
														<a id="{{$pr->MaSP}}" href="javascript:" class="button addcart" title="Giỏ hàng"></a>

														<!-- <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a> -->
														<!-- incon add to wish -->
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
																						</div>  -->

														<div class="clear"></div>
														<a href="simple_product/{{$pr->MaSP}}" class="sm_quickview_handler-list fancybox ">Quick View </a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<!-- Sản phẩm nổi bật -->
						<?php
						$prSale = App\product::where([['KhuyenMai', '>', '0'], ['FK_MaTH', $br->MaTH]]);
						$prSale = $prSale->orderBy('KhuyenMai', 'desc')->limit(3)->get();
						?>
						<div class="best-seller-product">
							<div class="box-slider-title">
								<h2 class="page-title-slider">Khuyến mãi</h2>
							</div>

							<div class="wrap-content">
								@foreach($prSale as $sale)
								<div class="item">
									<div class="item-inner">
										<div class="item-img">
											<a href="simple_product/{{$sale->MaSP}}" title="{{$sale->TenSP}}">
												<img width="180" height="180" src="img/{{$sale->Hinh}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px" />
											</a>
										</div>

										<!-- <div class="item-sl pull-left">1</div> -->
										<!-- Sản phẩm nổi bật -->
										<div class="item-content">
											<!-- rating  -->
											<div class="reviews-content">
												<!-- <div class="star"></div> -->
												<div class="item-number-rating">
													<a href="{{$sale->MaSP}}"> {{$sale->DanhGia}} Review(s)</a>
													<span>
														<del style="font-size:12px">{{number_format($sale->Gia)."Đ"}}</del>
													</span>
												</div>
												<span>
													<div class="sale-off">
														-{{$sale->KhuyenMai.'%'}}
													</div>
												</span>
											</div>
											<!-- end rating  -->
											<h4>
												<a href="simple_product/{{$sale->MaSP}}" title="{{$sale->TenSP}}">{{$sale->TenSP}}</a>
											</h4>
											<div class="item-price">
												<span>
													<ins>{{number_format(($sale->Gia)-($sale->Gia)*($sale->KhuyenMai)/100).'Đ'}}</ins>
												</span>
											</div>
										</div>
									</div>
								</div>

								@endforeach
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$(".addcart").click(function() {
			var id = $(this).attr("id");
			var token = $("input[name='token']").val();
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