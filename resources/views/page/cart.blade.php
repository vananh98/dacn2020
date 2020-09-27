@extends('page.information')

@section('content2')
<div class="container">
	<div class="row">
		<div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="page type-page status-publish hentry">
				<div class="entry-content">
					<div class="entry-summary">
						<div class="woocommerce">
								<h2>Giỏ hàng</h2>
							@if($cart)
							@if(count($cart)>0)
							<form id="form" action="{{route('checkOut')}}" method="post" name="cart" enctype="multipart/form-data">
								@if(session('alert'))
								<div class="alert alert-danger">
									{{session('alert')}}
								</div>
								@endif
								@csrf
								<input hidden type="text" name="_token" value="{{csrf_token()}}">
								<table class="shop_table shop_table_responsive cart" cellspacing="0">
									<thead>
										<tr>
											<th class="product-name">Tên</th>
											<th class="product-remove">Hình</th>
											<th class="product-quantity">Số lượng</th>
											<th class="product-price">Giá</th>
											<th class="product-subtotal">Thành tiền</th>
											<th class="product-thumbnail">Tác vụ</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sum = 0;
										?>
										@foreach($cart as $value)
										<?php
										$product = App\product::where('MaSP', $value->Fk_MaSP)->first();

										?>
										<!-- <form class="form" action="" method="post"> -->
										<tr class="cart_item">
											<!-- <input hidden type="text" name="token2" value="{{csrf_token()}}"> -->
											<td class="product-name" data-title="Product">
												<a href="simple_product/{{$value->Fk_MaSP}}">{{$product->TenSP}}</a>
											</td>
											<td class=" product-thumbnail">
												<a href="simple_product/{{$value->Fk_MaSP}}">
													<img width="180" height="180" src="img/{{$product->Hinh}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{$product->name}}" title="click xem chi tiết" sizes="(max-width: 180px) 100vw, 180px">
												</a>
											</td>
											<td class="product-quantity" data-title="Quantity">
												<!-- <div class="quantity">
																<input  type="number" step="1" min="1"  value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
															</div> -->
												<div class="quantity1">
													<input class="quantity" type="number" name="quantity" id="quantity" value="{{$value->Soluong}}" min="1" max="{{$product->SoLuong}}" required>
												</div>
											</td>
											<td class="product-price" data-title="Price">
												<span id="price" class="woocommerce-Price-amount amount">{{number_format(($product->Gia)-($product->Gia/100*($product->KhuyenMai)))}}Đ</span>
											</td>
											<td class="product-subtotal" data-title="Total">
												<span id="total" class="woocommerce-Price-amount amount">{{number_format($value->Soluong*($product->Gia-($product->Gia/100*($product->KhuyenMai))))}}Đ</span>
											</td>
											<td class="product-remove">
												<a id="{{$value->STT}}" href="javacsript:" class="delete" title="Remove this item"><i class="fa fa-times" aria-hidden="true"></i></a>
												<a id="{{$value->STT}}" href="javacsript:" class="save" title="Save this item"><i class="fa fa-check" aria-hidden="true"></i></a>
												<!-- <input class="save" type="submit" value="Lưu"> -->
											</td>
										</tr>
										<!-- </form> -->
										<?php
										$sum += ($value->Soluong) * ($product->Gia - ($product->Gia / 100 * ($product->KhuyenMai)));
										?>
										@endforeach
										<!-- checkout & shopping continue -->
										<tr>
											<td colspan="2" class="actions">
												<div class="coupon">
													<!-- <label for="coupon_code">Coupon:</label>  -->
													<!-- <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">  -->
													<!-- <input type="submit" class="button" name="apply_coupon" value="Apply Coupon"> -->
													<a href="{{route('trangchu')}}"><input type="button" class="button" name="update_cart" value="Mua tiếp"></a>

												</div>
											</td>
											<td class="actions"></td>
											<td class="actions"><input type="submit" class="button" name="apply_coupon" value="Đặt hàng"></td>
											<td id="sum" class="actions">{{number_format($sum)}}Đ</td>
											<td class="actions"></td>

										</tr>
									</tbody>
								</table>
							</form>
							@endif
							@else
							{{"Chưa có sản phẩm"}}
							<a href="{{route('trangchu')}}"><button style="font-size: 20px;">Mua hàng</button></a>
							@endif
							<!-- <div class="cart-collaterals">
										<div class="products-wrapper">
											<div class="cart_totals ">
												<h2>Cart Totals</h2>
												
												<table cellspacing="0" class="shop_table shop_table_responsive">
													<tbody>
														<tr class="cart-subtotal">
															<th>Subtotal</th>
															<td data-title="Subtotal">
																<span class="woocommerce-Price-amount amount">$300.00</span>
															</td>
														</tr>
														<tr class="order-total">
															<th>Total</th>
															<td data-title="Total">
																<strong><span class="woocommerce-Price-amount amount">$300.00</span></strong> 
															</td>
														</tr>
													</tbody>
												</table>
												
												<div class="wc-proceed-to-checkout">
													<a href="checkout.html" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
												</div>
											</div>
										</div>
									</div> -->
						</div>
					</div>
				</div>

				<!-- <div class="clearfix"></div> -->
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$(".save").click(function() {
			var idprc = $(this).attr('id');
			var qty = $(this).parent().parent().find("#quantity").val();
			var token = $("input[name='_token']").val();
			var total = $(this).parent().parent().find("#total");
			var sum = $("#sum");
			var tr = $(this).parent().parent().find("tr");
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': token
				},
				url: 'store',
				type: 'POST',
				cache: false,
				data: {
					"_token": token,
					"id": idprc,
					"qty": qty,
				},
				success: function(dt) {

					total.text(dt.price + "Đ");
					sum.text(dt.total + "Đ");
					$(".minicart-number").text(dt.count);
					console.log(dt)
				}
			});
		});
	});
	$(document).ready(function() {
		$(".delete").click(function() {
			var token = $("input[name='_token']").val();
			var idprc = $(this).attr('id');
			var sum = $("#sum");
			$(this).parent().parent().remove();
			//  $(this).parent().parent().remove();
			//gởi ajax thì setup headers trước: csrf_token()
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': token
				},
				url: 'remove2',
				type: 'POST',
				cache: false,
				data: {
					// "token": token,
					"id": idprc
				},
				success: function(data) {
					$(document).ready(function() {
						$(this).parent().parent().remove();
						sum.text(data.total + "Đ");
						$(".minicart-number").text(data.count)
					});
					console.log(data)
				}
			})
		});
	});
</script>
@endsection