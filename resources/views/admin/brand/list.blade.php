@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách thương hiệu</h6>
        </div>
        <div class="card-body">
            <a href="{{route('formAddBrand')}}"><button>Thêm</button></a>
            <div class="table-responsive">
                <!-- <div class="alert alert-success">
        </div>      -->
                <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Mã TH</th>
                            <th>Tên thương hiệu</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{"TH".$item->MaTH}}</td>
                            <td>{{$item->TenTH}}</td>
                            <td><a href="{{route('editBrand',['id'=>$item->MaTH])}}"><i class="fa fa-save">Sửa</i></a>
                                <span><a id="{{$item->MaTH}}" class="remove" href="javascript:"><i class="fa fa-trash">Xóa</i></a></span>
                            </td>
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
@section('script')
<script>
    $(document).ready(function() {
        $(".remove").click(function() {
            var id = $(this).attr('id');
            var _token = $("input[name='_token']").val();
            $(this).parent().parent().parent().remove();
            // alert(id + "" + _token)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: 'admin/brands/removebrand',
                type: 'post',
                cache: false,
                data: {
                    "id": id
                },
                success: function(alert) {
                    console.log(alert)

                }
            });
        });
    });
</script>
@endsection