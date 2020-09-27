@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
               
                <form action="{{route('addType')}}" style="width:20%" method="POST">
                    @csrf
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <input type="text" value="{{csrf_token()}}" name="token" hidden>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>Tên danh mục</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td><input type="text" name="name"> </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="Thêm">
                </form>
                <nav class="page-navigation">
                </nav>
            </div>
        </div>
    </div>

</div>
@endsection