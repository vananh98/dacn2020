@extends('page.information')
<style>
    .checkout {
        font-family: Arial, Helvetica, sans-serif !important;
    }
    label{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
@section('content2')
<?php

use App\product;

$sum = 0;
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('giftConfirm',['id'=>$id])}}" enctype="multipart/form-data">
    @csrf
    <input hidden type="text" name="_token" value="{{csrf_token()}}">
    <div class="col2-set" id="customer_details">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3>Thông tin người nhận</h3>

                <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                    <label for="billing_first_name" class="">
                        Tên người nhận
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="text" class="input-text " name="customer" id="billing_first_name" autocomplete="given-name" value="" />
                </p>

                <div class="clear"></div>
                <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                    <label for="billing_phone" class="">
                        Điện thoại
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" autocomplete="tel" value="" />
                </p>

                <div class="clear"></div>
                <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                    <label for="billing_address_1" class="">
                        Địa chỉ
                        <abbr class="required" title="required">*</abbr>
                    </label>
                    <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="" />
                </p>

            </div>
        </div>

    </div>
    <div id="order_review" class="woocommerce-checkout-review-order">
        <table class="shop_table woocommerce-checkout-review-order-table">

        </table>
        <div id="payment" class="woocommerce-checkout-payment">


            <div class="form-row place-order">
                <!-- <noscript>
                    Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so. &lt;br/&gt;&lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&gt;
                </noscript> -->
                <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Xác nhận" data-value="Place order">

            </div>
        </div>
    </div>
</form>

@endsection