@extends('page.information')
@section('content2')
<div class="woocommerce-MyAccount-content" style="overflow: hidden;">
    <!-- <p>
        Order #<mark class="order-number">1402</mark>
        was placed on <mark class="order-date">January 10, 2017</mark>
        and is currently <mark class="order-status">Processing</mark>.
    </p> -->

    <h2>Chi tiết hóa đơn
        @if($gift1 == 1)
            {{"(Gữi tặng)"}}
        @endif
    </h2>

    <table class="shop_table order_details">
        <thead>
            <tr>
                <th class="product-name" style="border-right:none">Sản phẩm</th>
                <th class="product-total" style="border-right:none">Tổng</th>
            </tr>
        </thead>
        <?php

        use App\product;
        ?>
        <tbody>
            @foreach($details as $item)
            <?php
            $pr = product::find($item->Fk_MaSP);
            // dd($details)
            ?>
            <tr class="order_item">
                <td class="product-name" style="border-right:none">
                    <a href="simple_product/{{$pr->MaSP}}">{{$pr->TenSP}}</a>
                    <strong class="product-quantity">× {{$item->Soluong}}</strong>
                </td>

                <td class="product-total" style="border-right:none">
                    <span class="amount">
                        {{number_format($item->Tong)}} Đ
                    </span>
                </td>
            </tr>
            @endforeach
            <!-- <tr class="order_item">
                <td class="product-name">
                    <a href="shop_product_style2.html">Sint drumstick</a>
                    <strong class="product-quantity">× 2</strong>
                </td>

                <td class="product-total">
                    <span class="amount">
                        $110.00
                    </span>
                </td>
            </tr> -->
        </tbody>

        <tfoot>

            <tr>
                <th scope="row">Hình thức thanh toán:</th>

                <td>Thanh toán khi nhận</td>
            </tr>

            <tr>
                <th scope="row">Tổng:</th>

                <td>
                    {{number_format($sum)}} Đ
                </td>
            </tr>



        </tfoot>
    </table>

    <header>
        <h2>Khách hàng</h2>
    </header>

    <table class="shop_table customer_details">
        <tbody>
            <tr>
                <th class="title">Tên khách hàng:</th>
                <td>
                    {{$customer}}
                </td>
            </tr>

            <tr>
                <th class="title">Điện thoại:</th>
                <td>
                    {{$phone}}
                </td>
            </tr>
        </tbody>
    </table>

    <header class="title">
        <h3>Địa chỉ giao hàng</h3>
    </header>

    <address style="font-size: 14px;">
        {{$address}}
        <br />
        <!-- Thomas Nolan Kaszas II<br />
        5322 Otter Lane<br />
        Middleberge FL 32068<br /> -->
    </address>
</div>
@endsection