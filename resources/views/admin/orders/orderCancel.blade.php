@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Đơn hàng đã hủy</h6>
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
                                <th style="width:8%">Mã đơn hàng</th>
                                <th style="width:10%">Khách hàng</th>
                                <th style="width:10%">Tổng</th>
                                <th style="width:15%">Ngày đặt</th>
                                <th style="width:10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            use App\User;

                            $arr = ['Đang xử lí', 'Đã duyệt', 'Đang giao hàng', 'Hủy'];
                            ?>
                            @foreach($lists as $item)
                            <?php $user = User::find($item->FK_MaKH);  ?>
                            <tr class="odd gradeX" align="left" style="font-size: 13px;">
                                <td id="idorder">{{"ĐH".$item->MaDH}}</td>
                                <td>{{$user->Hoten}}</td>
                                <td>{{number_format($item->Tong)}} Đ</td>
                                <td>{{$item->created_at}} </td>
                                
                                
                                <td>
                                    <!-- <a id="{{$item->MaDH}}" class="click" href="javacsript:"><i class="fa fa-save">Cập nhật</i></a> -->
                                    <span><a href="admin/orders/detailsorder/{{$item->MaDH}}"><i class="fa fa-eye">Xem</i></a></span>
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
