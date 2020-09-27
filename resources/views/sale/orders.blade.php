@extends('sale.layout2.index2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <div class="alert alert-success">
        </div>     -->

                <form action="">
                    @csrf
                    <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr align="left" style="font-size: 13px;">
                                <th style="width:8%">Mã ĐH</th>
                                <th style="width:10%">Khách hàng</th>
                                <th style="width:10%">NVGH</th>
                                <th style="width:10%">Tổng</th>
                                <th style="width:15%">Ngày đặt</th>
                                <th style="width:10%">Trạng thái</th>
                                <th style="width:10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            use App\User;

                            $shipper = User::where('Quyen', 3)->get();
                            $arr = ['Đã đóng gói', 'Đang giao hàng', 'Giao thành công', 'Thất bại',];
                            $count = count($arr);
                            ?>
                            @foreach($lists as $item)
                            <?php $user = User::find($item->FK_MaKH);
                            $shipper = User::find($item->FK_MaShipper);
                            ?>

                            <tr class="odd gradeX" align="left" style="font-size: 13px;">
                                <td id="idorder">{{"ĐH".$item->MaDH}}</td>
                                <td>{{$user->Hoten}}</td>
                                <td>{{$shipper->Hoten}}</td>
                                <td>{{number_format($item->Tong)}} Đ</td>
                                <td>{{$item->created_at}} </td>
                                <td id="stt">
                                    <select name="selected" id="selected">
                                        @if($item->Trangthai=="Duyệt")
                                        <option value="">------------------</option>
                                        <option value="0">Đã đóng gói</option>
                                        @endif
                                        @if($item->Trangthai=="Đã đóng gói")
                                        <option value="">{{$item->Trangthai}}</option>
                                        <option value="1">Đang giao hàng</option>
                                        @endif
                                        @if($item->Trangthai=="Đã giao")
                                        <option value="">{{$item->Trangthai}}</option>
                                        <option value="2">Giao thành công</option>
                                        @endif
                                        @if($item->Trangthai=="Trả hàng")
                                        <option value="">{{$item->Trangthai}}</option>
                                        <option value="3">Thất bại</option>
                                        @endif
                                        @if($item->Trangthai=="Trả hàng")
                                        <option value="">{{$item->Trangthai}}</option>
                                        <option value="3">Thất bại</option>
                                        @endif
                                        @if($item->Trangthai=="Đang giao hàng")
                                        <option value="1">Đang giao hàng</option>
                                        @endif
                                        <!-- <option value="">
                                            @if($item->Trangthai=="Duyệt")
                                            {{"--------------"}}
                                            @else
                                            {{$item->Trangthai}}
                                            @endif
                                        </option>
                                        @for ($i=0;$i < $count; $i++) @continue($arr[$i]==$item->Trangthai)
                                            <option value="{{$i}}">{{$arr[$i]}}</option>
                                            @endfor -->
                                    </select>
                                </td>

                                <td>
                                    <a id="{{$item->MaDH}}" class="click" href="javacsript:"><i class="fa fa-save">Lưu</i></a>
                                    <span><a href="sale/orderDetails/{{$item->MaDH}}"><i class="fa fa-eye">Xem</i></a></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                <nav class="page-navigation">
                    {!!$lists->links()!!}
                </nav>
                </form>
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
            var _token = $("input[name='_token']").val();
            var stt = $(this).parent().parent().children().children().find(":selected").val();
            if (stt == 3 || stt == 2) {
                $(this).parent().parent().remove();
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: 'sale/orders/update',
                cache: false,
                type: 'post',
                data: {
                    "id": id,
                    "stt": stt,
                    "token": _token,
                },
                success: function(data) {
                    console.log(data);
                    if (data == "Đã đóng gói") {
                        location.reload();
                    }
                }
            })
        });
    })
</script>
@endsection