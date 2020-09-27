@extends('page.information')
@section('content2')
<div class="woocommerce-MyAccount-content" style="overflow: hidden;">
    <!-- <p>
        Order #<mark class="order-number">1402</mark>
        was placed on <mark class="order-date">January 10, 2017</mark>
        and is currently <mark class="order-status">Processing</mark>.
    </p> -->

    <h2>Chi tiết hóa đơn {{"ĐH".$order->MaDH}} 
        @if($order->GuiTang == 1)
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
            <!-- <tr>
                <th scope="row">Phí vấn chuyển:</th>

                <td>@if($order->PhiGH > 0)
                    {{number_format($order->PhiGH)." Đ"}}
                    @else
                    {{"Đang cập nhật"}}
                    @endif
                </td>
            </tr> -->

            <tr>
                <th scope="row">Hình thức thanh toán:</th>

                <td>Thanh toán khi nhận</td>
            </tr>

            <tr>
                <th scope="row">Tổng:</th>

                <td>
                    {{number_format($order->Tong)." Đ"}}
                </td>
            </tr>


        </tfoot>
    </table>

    <header>
        <h2>Khách hàng</h2>
    </header>

    <table class="shop_table customer_details">
        <tbody>
            <?php

            use App\Gift;

            $gift = Gift::where('FK_MaDH', $order->MaDH)->first();
            ?>
            <tr>
                <th class="title">Tên khách hàng:</th>
                <td>
                    @if($gift)
                    {{$gift->TenNguoiNhan}}
                    @else
                    {{$user->Hoten}}
                    @endif

                </td>
            </tr>

            <tr>
                <th class="title">Điện thoại:</th>
                <td>
                    @if($gift)
                    {{$gift->SDT}}
                    @else
                    {{$user->SDT}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <header class="title">
        <h3>Địa chỉ giao hàng</h3>
    </header>

    <address style="font-size: 18px;">
        @if($gift)
        {{$gift->DiaChi}}
        @else
        {{$user->Diachi}}
        @endif
        <br />
        <!-- Thomas Nolan Kaszas II<br />
        5322 Otter Lane<br />
        Middleberge FL 32068<br /> -->
    </address>
</div>
@endsection