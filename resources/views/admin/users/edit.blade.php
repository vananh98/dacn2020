@extends('admin.layout.index')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa tài khoản {{$iduser->name}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                <form action="admin/users/edit/{{$iduser->MaND}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>Tên người dùng</td>
                            <td><input class="form-control " type="text" name="name" value="{{$iduser->Hoten}}" ></td>
                        </tr>
                        
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input class="form-control" type="password" name="password" value="{{$iduser->Matkhau}}" disabled>
                                <span><input id="changePass" name="changePass" type="checkbox">Change Password</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Mật khẩu mới</td>
                            <td><input class="form-control password" type="password" name="password2" placeholder=" Nhập mật khẩu mới" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhập lại</td>
                            <td><input class="form-control password" type="password" name="password3" placeholder=" Nhập lại mật khẩu mới" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input class="form-control " type="text" name="email" value="{{$iduser->email}}" disabled></td>
                        </tr>
                        <tr>
                            <td>Quyền người dùng</td>
                            <td>
                                <input type="radio" name="quyen" value="0" @if($iduser->Quyen==0)
                                {{"checked"}}
                                @endif
                                <span>Admin</span>
                                <input type="radio" value="2" name="quyen" <?php if ($iduser->Quyen == 2) {
                                                                                echo "checked";
                                                                            } ?>><span>Nhân Viên BH</span>
                                <input type="radio" value="3" name="quyen" <?php if ($iduser->Quyen == 3) {
                                                                                echo "checked";
                                                                            } ?>><span>Nhân viên GH</span>

                                <input type="radio" value="1" name="quyen" <?php if ($iduser->Quyen == 1) {
                                                                                echo "checked";
                                                                            } ?>><span>Khách hàng</span>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Lưu"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#changePass").change(function() {
            if ($(this).is(":checked")) {
                $(".password").removeAttr('disabled');
            } else {
                $(".password").attr('disabled', '');
            }
        });
    });
</script>
@endsection