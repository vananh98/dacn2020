@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"></h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng
        <a href="{{Route('getAdd')}}"><button class="float-sm-right">Thêm tài khoản</button></a>
      </h6>
    </div>
    <form action="{{route('Listfind')}}" method="post">
      @csrf
      <input type="text" name="_token" value="{{csrf_token()}}" hidden>
      <div class="col-sm-6 col-md-4" style="display: inline-flex;">
        <tr>
          <td>
            <input type="text" class="form-control" name="name" placeholder="Tìm kiếm">
            
            <span ><input class="form-control" type="submit" value="tìm"></span>
          </td>
        </tr>
      </div>
    </form>
    <div class="card-body">
      <div class="table-responsive">
        @if(session('thongbao'))
        <div class="alert alert-success">
          {{session('thongbao')}}
        </div>
        @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr role="row" align="center">
              <th>MaND</th>
              <th>Tên TK</th>
              <th>Email</th>
              <th>Họ tên</th>
              <th>Quyền</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          @foreach($list as $value)
          <tr class="odd gradeX" align="center">
            <td>{{$value->MaND}}</td>
            <td>{{$value->TenTK}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->Hoten}}</td>
            <td>@if($value->Quyen==0)
              {{"Admin"}}
              @elseif($value->Quyen==1)
              {{"Khách hàng"}}
              @elseif($value->Quyen==2)
              {{"Nhân viên BH"}}
              @elseif($value->Quyen==3)
              {{"Nhân viên GH"}}
              @endif
            </td>
            <td class="center"><a href="admin/users/edit/{{$value->MaND}}"><i class="fa fa-eye"></i> edit</a></td>
            <td class="center"> <a href="admin/users/delete/{{$value->MaND}}"><i class="fas fa-trash-alt"></i>delete</a></td>
          </tr>
          @endforeach

          </tbody>
        </table>
        <div class="float-sm-right">
          <nav class="page-navigation">
            {!!$list ->links()!!}
          </nav>
        </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection