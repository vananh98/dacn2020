@extends('admin.layout.index')
@section('css')
<style>
    .table-bordered td,
    .table-bordered th {
        border: none;
    }

    table {
        border-collapse: unset;
    }

    .addInput {
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo tháng @if($month) {{$month}} @endif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                
                <form action="{{route('reportMonth')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                    <tr class="odd gradeX" align="left" style="font-size: 13px;">
                        <td style="width:20%"><label for="date">Chọn tháng</label><input type="month" value="@if($month){{$month}}@endif" name="month"></td>
                        <td><input type="submit" value="Tìm"></td>
                    </tr>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        </thead>
                        <tbody class="tbody">
                            @if(count($report)>0)
                            <tr>
                                <td>Tổng tiền: {{number_format($report2->sum('Tong'))." Đ"}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%"><b>Ngày</b></td>
                                <td><b>Tổng tiền</b></td>
                                <td><b>Chi tiết</b></td>
                            </tr>
                            @foreach($report as $item)
                            <tr>
                                <td>{{$item->day}}</td>
                                <!-- format('d/m/Y') định dạng ngày -->
                                <td>{{number_format($item->total)." Đ"}}</td>
                                <td><a href="{{Route('detailsDay',['year'=>$year,'month'=>$month1,'day'=>$item->day])}}">Xem</a></td>
                            </tr>
                            @endforeach

                            @endif

                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection