@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách phiếu nhập</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- <div class="alert alert-success">
        </div>      -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Mã PN</th>
                            <th>Ngày nhập</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->MaPN}}</td>
                            <td>{{$item->created_at}}</td>
                            <td><a href="admin/import/detailsImport/{{$item->id}}">Xem</a></td>
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