@extends('sale.layout2.index2')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cập nhật thông tin cá nhân  </h6>
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
                <form action="sale/editAccount/{{$iduser->MaND}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>Tên người dùng</td>
                            <td><input class="form-control " type="text" name="name" value="{{$iduser->Hoten}}"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input class="form-control " type="tel" name="sdt" value="{{$iduser->SDT}}"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input class="form-control " type="tel" name="diachi" value="{{$iduser->Diachi}}"></td>
                        </tr>

                        <tr>
                            <td>Mật khẩu</td>
                            <td><input class="form-control" type="password" name="password" value="{{$iduser->Matkhau}}" disabled>
                                <span><input id="changePass" name="changePass" type="checkbox">Đổi mật khẩu</span>
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