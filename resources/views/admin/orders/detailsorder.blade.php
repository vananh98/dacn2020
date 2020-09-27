@extends('admin.layout.index')
@section('css')
<style>
    .shop_table {
        border: 1px solid !important;
        width: 100%;
        margin: auto;
    }

    .thead {
        color: black;
        font-size: 20px;
    }

    .th1 {
        width: 50%;
    }

    .th2 {
        width: 30%;
    }
</style>
@endsection
@section('content')
<div class="woocommerce-MyAccount-content">


    <h2>Chi tiết đơn hàng {{"ĐH".$dh->MaDH}}
        @if($dh->GuiTang == 1)
        {{"(Gữi tặng)"}}
        @endif
    </h2>

    <table class="shop_table order_details">
        <thead class="thead">
            <tr>
                <th class="th1">Sản phẩm</th>
                <th class="th2">Giá</th>
                <th class="th">Tổng</th>
            </tr>
        </thead>

        <tbody>
            <?php

            use App\product;
            ?>
            @foreach($order as $item)
            <?php
            $product = product::find($item->Fk_MaSP);
            // dd($product)
            ?>
            <tr class="order_item">
                <td class="product-name">
                    {{$product->TenSP}}
                    <strong class="product-quantity">x {{$item->Soluong}} <strong>
                </td>
                <td>{{number_format($item->Gia)." Đ"}}</td>
                <td class="product-total">
                    <span class="amount">
                        {{number_format($item->Soluong*$item->Gia)." Đ"}}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>


            <tr>
                <th scope="row">Hình thức thanh toán:</th>
                <td></td>
                <td>Thanh toán khi nhận</td>
            </tr>

            <tr>
                <th scope="row">Tổng:</th>

                <td> </td>
                <td>{{number_format($dh->Tong)." Đ"}}</td>
            </tr>

            <tr>
                <th scope="row">Ghi chú:</th>
                <td></td>
                <td>{{$dh->Ghichu}}</td>
            </tr>

        </tfoot>
    </table>

    <header>
        <h2>Khách hàng</h2>
    </header>

    <table class="shop_table customer_details">
        <?php

        use App\Gift;

        $gift = Gift::where('FK_MaDH', $dh->MaDH)->first();
        ?>
        <tbody>
            <tr>
                <th class="title">Tên khách hàng: @if($gift)
                    {{$gift->TenNguoiNhan}}
                    @else
                    {{$user->Hoten}}
                    @endif</th>
                <td></td>
            </tr>

            <tr>
                <th class="title">Điện thoại:@if($gift)
                    {{$gift->SDT}}
                    @else
                    {{$user->SDT}}
                    @endif</th>
                <td></td>
            </tr>
        </tbody>
    </table>

    <header class="title">
        <h3>Địa chỉ giao hàng :
            @if($gift)
            {{$gift->DiaChi}}
            @else
            {{$user->Diachi}}
            @endif</h3>


    </header>

    <address style="font-size: 14px;">
        <br />
        <!-- Thomas Nolan Kaszas II<br />
        5322 Otter Lane<br />
        Middleberge FL 32068<br /> -->
    </address>
</div>
@endsection