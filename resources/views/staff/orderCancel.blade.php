@extends('staff.layout2.index2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Đơn hàng hoàn trả</h6>
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
                                <th style="width:10%">Tổng</th>
                                <th style="width:15%">Ngày đặt</th>
                                <th style="width:10%">Trạng thái</th>
                                <th style="width:10%">Phí</th>
                                <th style="width:10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            use App\User;

                            $shipper = User::where('Quyen', 3)->get();
                            $arr = ['Đang giao hàng', 'Đã giao', 'Hoàn trả'];
                            $count = count($arr);
                            ?>
                            @foreach($lists as $item)
                            <?php $user = User::find($item->FK_MaKH);  ?>

                            <tr class="odd gradeX" align="left" style="font-size: 13px;">
                                <td id="idorder">{{"ĐH".$item->MaDH}}</td>
                                <td>{{$user->Hoten}}</td>
                                <td>{{number_format($item->Tong)}} Đ</td>
                                <td>{{$item->created_at}} </td>
                                <td id="stt">{{$item->Trangthai}} </td>
                                <td id="charge">{{number_format($item->PhiGH)." Đ"}} </td>
                                <td>
                                    <!-- <a id="{{$item->MaDH}}" class="click" href="javacsript:"><i class="fa fa-save">Lưu</i></a> -->
                                    <span><a href="staffshipper/orderDetails/{{$item->MaDH}}"><i class="fa fa-eye">Xem</i></a></span>
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
            var charge = $(this).parent().parent().find("input[name='charge']").val();
            var i = $(this).parent().parent().find("input[name='charge']");
            if (stt == 2) {
                $(this).parent().parent().remove();
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: 'staffshipper/orders/update',
                cache: false,
                type: 'post',
                data: {
                    "id": id,
                    "stt": stt,
                    "token": _token,
                },
                success: function(data) {
                    console.log(data);

                }
            })
        });
    })
</script>
@endsection