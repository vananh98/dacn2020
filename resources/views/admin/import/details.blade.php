@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết phiếu nhập {{$id}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <div class="alert alert-success">
        </div>      -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Mã SP</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <?php

                    use App\product;

                    $i = 1 ?>
                    <tbody>
                        @foreach($lists as $item)
                        <?php
                        $product = product::find($item->FK_MaSP);
                        ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$i++}}</td>
                            <td>{{"SP".$item->FK_MaSP}}</td>
                            <td>{{$product->TenSP}}</td>
                            <td>{{$item->SoLuong}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="page-navigation">

                </nav>

            </div>
        </div>
    </div>

</div>
@endsection