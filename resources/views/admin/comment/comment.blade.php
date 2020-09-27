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

            <div class="table-responsive">
                <!-- <div class="alert alert-success">
        </div>      -->
                <input type="text" name="_token" value="{{csrf_token()}}" hidden>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Tên khách hàng</th>
                            <th>Nội dụng</th>
                            <th>Trạng thái</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        use App\User;
                        ?>
                        @foreach($list as $item)
                        <?php
                        $user = User::find($item->Fk_MaKh)->Hoten;
                        ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$user}}</td>
                            <td align="left">{{$item->Noidung}}</td>
                            <td>
                                <select name="selected" id="selected">
                                    <option value="a">---------</option>
                                    <option value="Duyệt">Duyệt</option>
                                </select>
                            </td>
                            <td><a id="{{$item->MaCMT}}" class="save" href="javascript:">Sửa</a></td>
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
        $(".save").click(function() {
            var id = $(this).attr('id');
            var _token = $("input[name='_token']").val();
            var stt = $(this).parent().parent().find(":selected").val();
            // $(this).parent().parent().parent().remove();
            if(stt=="Duyệt"){
                $(this).parent().parent().remove();
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: 'admin/comments/storeCmt',
                type: 'post',
                cache: false,
                data: {
                    "id": id,
                    "stt": stt
                },
                success: function(alert) {
                   console.log(alert)

                }
            });
        });
    });
</script>
@endsection