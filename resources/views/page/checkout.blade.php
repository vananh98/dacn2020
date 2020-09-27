@extends('page.information')
@section('content2')
<?php

use App\product;

$sum = 0;
?>
@if($carts->isNotEmpty())
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('confirm')}}" enctype="multipart/form-data">
    @csrf
    <input hidden type="text" name="_token" value="{{csrf_token()}}">
    <div class="col2-set" id="customer_details">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3>Thông tin đơn hàng</h3>

                <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                    <label for="billing_first_name" class="">
                        Tên khách hàng
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" autocomplete="given-name" value="{{$user->Hoten}}" />
                </p>

                <div class="clear"></div>



                <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                    <label for="billing_email" class="">
                        Email
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input disabled type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" autocomplete="email" value="{{$user->email}}" />
                </p>

                <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                    <label for="billing_phone" class="">
                        Điện thoại
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" autocomplete="tel" value="{{$user->SDT}}" />
                </p>

                <div class="clear"></div>
                <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                    <label for="billing_address_1" class="">
                        Địa chỉ
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="{{$user->Diachi}}" />
                </p>




                <!-- <p class="form-row form-row address-field validate-state form-row-first" id="billing_state_field" style="display: none" data-o_class="form-row form-row form-row-first address-field validate-state">
                    <label for="billing_state" class="">State / County</label>
                    <input type="hidden" class="hidden" name="billing_state" id="billing_state" value="" placeholder="" />
                </p>

                <div class="clear"></div> -->



                <!-- <div class="create-account" style="display: none;">
                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>

                    <p class="form-row form-row validate-required" id="account_password_field">
                        <label for="account_password" class="">
                            Account password
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <input type="password" class="input-text " name="account_password" id="account_password" placeholder="Password" value="" />
                    </p>

                    <div class="clear"></div>
                </div> -->
            </div>
        </div>

        <!-- <div class="col-2">
            <div class="woocommerce-shipping-fields">
                <h3>Thêm thông tin</h3>

                <p class="form-row form-row notes" id="order_comments_field">
                    <label for="order_comments" class="">Ghi chú</label>
                    <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                </p>

            </div>
        </div> -->
    </div>
    <div id="order_review" class="woocommerce-checkout-review-order">
        <table class="shop_table woocommerce-checkout-review-order-table">
            <thead>
                <tr>
                    <th style="text-align:right"></th>
                    <th style="font-size: 20px;">Đơn hàng</th>
                    <th></th>
                </tr>
                <tr>
                    <th class="product-name">Sản phẩm</th>
                    <th class="product-name">Giá</th>
                    <th class="product-total">Tổng</th>
                </tr>
            </thead>

            <tbody>
                @foreach($carts as $item)
                <?php
                $product = product::where('MaSP', $item->Fk_MaSP)->first();
                // dd($product);

                ?>

                <tr class="cart_item">
                    <td class="product-name">
                        <a href="simple_product/{{$product->MaSP}}"> {{$product->TenSP}}&nbsp;</a><strong class="product-quantity">&#215; {{$item->Soluong}}</strong>
                    </td>

                    <td class="product-total">
                        <span class="woocommerce-Price-amount amount">{{number_format($product->Gia-($product->Gia/100*$product->KhuyenMai))}} Đ</span>
                    </td>
                    <td>
                        {{number_format(($product->Gia-($product->Gia/100*$product->KhuyenMai))*$item->Soluong)}} Đ
                    </td>
                </tr>
                @php
                $sum+=($product->Gia-($product->Gia/100*$product->KhuyenMai))*$item->Soluong;
                @endphp
                @endforeach

                <!-- <tr class="cart_item">
                    <td class="product-name">
                        Pisan maze ikan kazen&nbsp;<strong class="product-quantity">&#215; 1</strong>
                    </td>

                    <td class="product-total">
                        $5.00
                    </td>
                    <td></td>
                </tr> -->
            </tbody>

            <tfoot>
                <tr class="order-total">
                    <th>Tổng </th>

                    <td> </td>
                    <td>
                        <strong>
                            {{number_format($sum)}} Đ
                        </strong>
                    </td>
                </tr>
                <!-- <tr class="cart-subtotal">
                    <th style="text-align:right">Phí vận chuyển</th>
                </tr> -->
            </tfoot>
        </table>
        <div id="payment" class="woocommerce-checkout-payment">
            <!-- <ul class="wc_payment_methods payment_methods methods">
                <li class="wc_payment_method payment_method_cheque">
                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="">
                    <label for="payment_method_cheque">Check Payments</label>
                    <div class="payment_box payment_method_cheque">
                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                    </div>
                </li>

                <li class="wc_payment_method payment_method_cod">
                    <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">
                    <label for="payment_method_cod">Cash on Delivery</label>
                    <div class="payment_box payment_method_cod" style="display:none;">
                        <p>Pay with cash upon delivery.</p>
                    </div>
                </li>

                <li class="wc_payment_method payment_method_paypal">
                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">

                    <label for="payment_method_paypal">
                        PayPal <img src="images/2003/AM_mc_vs_dc_ae.jpg" alt="PayPal Acceptance Mark">
                        <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="about_paypal" onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" title="What is PayPal?">What is PayPal?</a>
                    </label>

                    <div class="payment_box payment_method_paypal" style="display:none;">
                        <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                    </div>
                </li>
            </ul> -->

            <div class="form-row place-order">
                <!-- <noscript>
                    Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so. &lt;br/&gt;&lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&gt;
                </noscript> -->
                <input hidden type="text" value="{{$sum}}" name="sum">
                <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Xác nhận" data-value="Place order">
                <a href="{{route('formGift',['id'=>$idorder])}}"> <input type="button" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Gữi tặng" data-value="Place order"></a>
            </div>
        </div>
    </div>
</form>
@else
<p><b>Không có sản phẩm</b></p>
@endif
@endsection