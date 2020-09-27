@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1> -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
    </div>
    <div class="card-body">
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <a href="{{route('getTypeProduct')}}"><button>Thêm</button></a>
      <div class="table-responsive">
        <!-- <div class="alert alert-success">
        </div>      -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center" style="font-size: 12px;">
              <th>Mã</th>
              <th>Tên</th>
              <th>Hình</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Nổi bật</th>
              <th>Khuyến mãi</th>
              <th>Loại sản phẩm</th>
              <th>Thương hiệu</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody style="font-size:14px;">
            @foreach ($lists as $key)
            <tr class="odd gradeX" align="center">
              <td>{{"SP".$key->MaSP}}</td>
              <td>{{$key->TenSP}}</td>
              <td><img class="img-responsive" src="img/{{$key->Hinh}}" alt="" title="sản phẩm" height="30"></td>
              <td>{{number_format($key->Gia) ."Đ"}} </td>
              <td>{{$key->SoLuong}} </td>
              <td>
                @if(($key->Noibat)==0)
                {{"Không"}}
                @else
                {{"Có"}}
                @endif
              </td>
              <td>{{$key->KhuyenMai}} </td>
              <td>
                @foreach($typeProduct as $value)
                @if($key->FK_MaLoai==$value->MaLoai)
                {{$value->TenLoai}}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($brand as $value)
                @if($key->FK_MaTH == $value->MaTH)
                {{$value->TenTH}}
                @endif
                @endforeach
              </td>
              <td class="center"><a href="admin/products/edit/{{$key->MaSP}}"><i class="fa fa-edit"></i> Sửa</a></td>
              <td class="center"> <a href="admin/products/delete/{{$key->MaSP}}"><i class="fas fa-trash-alt"></i>Xóa</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="float-sm-right">
          <nav class="page-navigation">
            {!!$lists->links()!!}
          </nav>
        </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection