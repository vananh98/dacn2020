@extends('page.information')

@section('content2')
<style>
    .entry-content .entry-summary table tbody tr td {
        border-right: none;
    }

    .entry-content .entry-summary table thead tr th {
        border-right: none;
    }
    .pagination{
        margin-bottom: 5px;
    }
</style>
<div>
    <h4>
        Danh sách đơn hàng
    </h4>
</div>
@csrf
<input type="text" name="_token" value="{{csrf_token()}}" hidden>
@if($list->isNotEmpty())
<table class="shop_table shop_table_responsive my_account_orders account-orders-table" style="width:80%; border-radius:0">
    <thead>
        <tr>
            <th class="order-number"><span class="nobr">Đơn hàng</span></th>
            <th class="order-date"><span class="nobr">Ngày đặt</span></th>
            <th class="order-status"><span class="nobr">Trạng thái</span></th>
            <th class="order-total"><span class="nobr">Tổng</span></th>
            <th class="order-total"><span class="nobr">Phí ship</span></th>
            <th class="order-actions"><span class="nobr">&nbsp;</span></th>
        </tr>
    </thead>

    <tbody>

        @foreach($list as $item)
        <tr class="order" style="border-right:1px soild !important">
            <td class="order-number" data-title="Order">
                <b>{{"ĐH".$item->MaDH}}</b>
            </td>
            <td class="order-date" data-title="Date">
                <time datetime="2017-01-10" title="1484074846">{{$item->created_at}}</time>
            </td>
            <td class="order-status" data-title="Status">
                {{$item->Trangthai}}
            </td>
            <td class="order-total" data-title="Total">
                {{number_format($item->Tong)."Đ" }}
            </td>
            <td class="order-total2" data-title="Total">
                @if($item->PhiGH!="")
                {{number_format($item->PhiGH)."Đ"}}
                @else
                {{"Đang xử lí"}}
                @endif
            </td>

            <td class="order-actions" data-title="&nbsp;">
                <a href="myaccount/details_order/{{$item->MaDH}}" class="button view">Xem</a>
                @if(($item->Trangthai == "Đang xử lí") or ($item->Trangthai =="Duyệt"))
                <span><a id="{{$item->MaDH}}" href="javascript:" class="button view2">Hủy</a></span>
                @endif
            </td>
        </tr>
        @endforeach
        @else
        {{"Chưa có đơn hàng"}}
        @endif
    </tbody>
    <tfoot>
        <nav class="page-navigation">
            {!!$list->links()!!}
        </nav>
    </tfoot>
</table>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".view2").click(function() {
            var token = $("input[name='_token']").val();
            var iddh = $(this).attr('id');
            var i = $(this);
            var b = $(this).parent().parent().parent().find(".order-total2");
            var c = $(this).parent().parent().parent().find(".order-status")

            //gởi ajax thì setup headers trước: csrf_token()
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: 'cancel_order',
                type: 'POST',
                cache: false,
                data: {
                    // "token": token,
                    "id": iddh
                },
                success: function(data) {
                    b.text(data);
                    c.text(data)
                    i.remove();
                    console.log(data)
                }
            })
        });
    });
</script>
@endsection