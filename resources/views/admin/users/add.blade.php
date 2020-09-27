@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản</h6>
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
                <form action="{{Route('addUser')}}" method="post">
                    @csrf
                    <input type="hidden" name="__csrf" value="{{csrf_token()}}">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <div class="form-group">
                            <label><b>Tên tài khoản:</b></label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label><b>Họ tên</b></label>
                            <input class="form-control" type="text" name="fullname" placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label><b>Email:</b></label>
                            <input class="form-control" type="email" name="email" placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label><b>Phone:</b></label>
                            <input class="form-control" type="tel" pattern="[0-9]{10}" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label><b>Địa chỉ:</b></label>
                            <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label><b>Mật khẩu:</b></label>
                            <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label><b>Nhập lại mật khẩu:</b></label>
                            <input class="form-control" type="password" name="password2" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group">
                            <label><b>Quyền người dùng:</label></b><br>
                            <input type="radio" name="level" value="0" checked><span><b>Admin</b></span>
                            <input type="radio" name="level" value="1"><span><b>Khách hàng</b></span>
                            <input type="radio" name="level" value="2"><span><b>NV bán hàng</b></span>
                            <input type="radio" name="level" value="3"><span><b>NV Giao hàng</b></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Thêm">
                        </div>



                    </table>
                    <nav class="page-navigation">

                    </nav>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection