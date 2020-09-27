@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách các danh mục</h6>

        </div>
        <div class="card-body">
            <a href="{{route('getType')}}"><button style="width:8%;">Thêm</button></a>
            <div class="table-responsive">
                <!-- <div class="alert alert-success">
                </div> -->
                <input type="text" name="_token" value={{csrf_token()}} hidden>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Mã</th>
                            <th>Tên</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($type as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{"DM".$item->MaLoai}}</td>
                            <td>{{$item->TenLoai}}</td>
                            <td>
                                <a href="admin/type/edit/{{$item->MaLoai}}"><i class="fa fa-edit">Sửa</i></a>
                            </td>
                            <td>
                                <a class="remove" id="{{$item->MaLoai}}" href="javascript:"><i class="fa fa-trash-alt">Xóa</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav class="page-navigation" style="float:right">
                    {!!$type->links()!!}
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
            $(this).parent().parent().remove();
            // alert(id + "" + _token)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: 'admin/type/removetype',
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