@extends('admin.layout.index')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm {{$product->name}} </h6>
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
                <form action="admin/products/edit/{{$product->MaSP}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td><input class="form-control " type="text" name="name" value="{{$product->TenSP}}"></td>
                        </tr>
                        <tr>
                            <td>Giá</td>
                            <td><input class="form-control" type="number" name="price" value="{{$product->Gia}}">

                            </td>
                        </tr>
                        <tr>
                            <td>Hình</td>
                            <td>
                                <input class="form-control" type="file" name="img">
                                <img class="img-responsive" src="img/{{$product->Hinh}}" alt="hình" height="30">
                            </td>

                        </tr>
                        <tr>
                            <td>Khuyến mãi</td>
                            <td><input class="form-control " type="number" name="discount" value="{{$product->KhuyenMai}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Nổi bật</td>
                            <td>
                                <select class="form-control " name="changeHighlight" id="">
                                    <option value="{{$product->Noibat}}">
                                        @if(($product->Noibat)==0)
                                        {{"Không"}}
                                        @else
                                        {{"Có"}}
                                        @endif
                                    </option>
                                    @if(($product->Noibat)==0)
                                    <option value="1">{{"Có"}}</option>
                                    @else
                                    <option value="0">{{"Không"}}</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Thương hiệu</td>
                            <td><select class="form-control" name="selectBrand" id="">
                                    @foreach ($brand as $value)
                                    @if($product->FK_MaTH==$value->MaTH)
                                    <option value="{{$value->MaTH}}">{{$value->TenTH}}</option>
                                    @endif
                                    @endforeach
                                    @foreach ($brand as $value)
                                    @continue($product->FK_MaTH==$value->MaTH)
                                    <option value="{{$value->MaTH}}">{{$value->TenTH}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Danh mục</td>
                            <td>
                                <select class="form-control" name="selectType" id="">
                                    @foreach ($typeProduct as $value)
                                    @if($product->FK_MaLoai==$value->MaLoai)
                                    <option value="{{$value->MaLoai}}">{{$value->TenLoai}}</option>
                                    @endif
                                    @endforeach
                                    @foreach ($typeProduct as $value)
                                    @continue($product->FK_MaLoai==$value->MaLoai)
                                    <option value="{{$value->MaLoai}}">{{$value->TenLoai}}</option>
                                    @endforeach
                                </select>
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