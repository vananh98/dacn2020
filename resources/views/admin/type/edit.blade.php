@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm: {{$type->TenLoai}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/type/store/{{$type->MaLoai}}" method="post" style="width:20%">
                    @csrf
                    <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>Tên Loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td><input type="text" value="{{$type->TenLoai}}" name="name"></td>

                            </tr>
                            <tr>
                                <td><input type="submit" name="submit" value="Cập nhật"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <nav class="page-navigation">

                </nav>

            </div>
        </div>
    </div>

</div>
@endsection