@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
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
                <form action="{{Route('addProdcut')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="__csrf" value="{{csrf_token()}}">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <div class="form-group">
                            <label><b>Tên sản phẩm:</b></label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label><b>Giá tiền:</b></label>
                            <input class="form-control" type="number" name="price" placeholder="Nhập giá tiền">
                        </div>
                        <div class="form-group">
                            <label><b>Khuyễn mãi</b></label>
                            <input class="form-control" type="number" name="discount" placeholder="Nhập khuyến mãi">
                        </div>
                        <div class="form-group">
                            <label><b>Nổi bật</b></label>
                            <select class="form-control" name="selectHighlight" id="">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>Mô tả</b></label>
                            <textarea name="des" class="form-control" cols="30" rows="5" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Hình:</b></label>
                            <input class="form-control" type="file" name="img">
                        </div>
                        <div class="form-group">
                            <label><b>Thương hiệu:</b></label><br>
                            <select class="form-control" name="selectBrand" id="">
                                @foreach($brand as $br)
                                <option value="{{$br->MaTH}}">{{$br->TenTH}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label><b>Loại sản phẩm:</label></b><br>
                            <select class="form-control" name="selectType" id="">
                                @foreach($product as $type)
                                <option value="{{$type->MaLoai}}">{{$type->TenLoai}}</option>
                                @endforeach
                            </select>

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