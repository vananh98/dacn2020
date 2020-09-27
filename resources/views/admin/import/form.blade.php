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
            <h6 class="m-0 font-weight-bold text-primary">Phiếu nhập hàng</h6>
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

                <form action="{{route('importPostForm')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="left" style="font-size: 13px;">
                                <th>Mã phiếu nhập</th>
                                <th>Ngày nhập</th>
                                <th>Danh sách sản phẩm</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            <tr class="odd gradeX" align="left" style="font-size: 13px;">
                                <td><input type="text" name="ID"></td>
                                <td><input type="date" name="date"></td>
                                <td><select name="selected" id="selected">
                                        @foreach($list as $item)
                                        <option value="{{$item->MaSP}}">{{$item->TenSP}}</option>
                                        @endforeach
                                    </select>
                                    <span>
                                        <input type="button" value="Thêm" class="click">
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: larger;color:blue ">Mã sản phẩm</td>
                                <td style="font-size: larger;color:blue ">Tên sản phẩm</td>
                                <td style="font-size: larger;color:blue ">Số lượng</td>
                                <td></td>

                            </tr>

                        </tbody>

                    </table>
                    <input type="submit" value="Nhập">
                </form>
                <nav class="page-navigation">
                </nav>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
<!-- Nhập hàng đã có trong kho..append -->
@section('script')
<script>
    $(document).ready(function() {
        $(".click").click(function() {
            var idproduct = $(this).parent().parent().find(":selected").val();
            var nameProduct = $(this).parent().parent().find(":selected").text();
            // alert(idproduct)
            $(".tbody").append('<tr><td><input type="text" name="idproduct[]" readonly value="' + idproduct + '"/></td><td><input class="addInput" type="text" name="nameProduct[]" readonly value="' + nameProduct + '"/></td><td><input type="text" name="quantity[]" value=""/></td><td></td></tr>');
        })
    })
</script>
@endsection